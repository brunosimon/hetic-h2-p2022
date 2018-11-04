const shooter = {}

/**
 * Set up
 */
shooter.$container = document.querySelector('.shooter')
shooter.$targets = shooter.$container.querySelector('.targets')
shooter.$score = shooter.$container.querySelector('.score .value')
shooter.$start = shooter.$container.querySelector('.start')
shooter.$time = shooter.$container.querySelector('.time')
shooter.score = 0
shooter.secondsLeft = null
shooter.sounds = {}

shooter.sounds.$ding = document.createElement('audio')
shooter.sounds.$ding.setAttribute('src', 'ding.mp3')

shooter.sounds.$finish = document.createElement('audio')
shooter.sounds.$finish.setAttribute('src', 'finish.mp3')

shooter.$start.addEventListener('click', () =>
{
    shooter.start()
})

/**
 * Methods
 */
shooter.addTarget = () =>
{
    const $target = document.createElement('div')
    $target.classList.add('target')
    $target.style.top = `${Math.random() * 100}%`
    $target.style.left = `${Math.random() * 100}%`

    $target.addEventListener('mouseenter', () =>
    {
        shooter.shoot($target)
    })

    shooter.$targets.appendChild($target)
}

shooter.shoot = (_$target) =>
{
    // Remove target
    shooter.$targets.removeChild(_$target)

    // Update score
    shooter.score++
    shooter.$score.textContent = shooter.score

    // Play sound
    shooter.playSound('ding')

    // Add new target
    shooter.addTarget()
}

shooter.playSound = (_soundName) =>
{
    // Play sound from start
    const $sound = shooter.sounds[`$${_soundName}`]
    $sound.currentTime = 0
    $sound.play()
}

shooter.tick = () =>
{
    shooter.secondsLeft--

    shooter.$time.textContent = shooter.secondsLeft < 10 ? `00:0${shooter.secondsLeft}` : `00:${shooter.secondsLeft}`

    if(shooter.secondsLeft > 0)
    {
        window.setTimeout(shooter.tick, 1000)
    }
    else
    {
        shooter.end()
    }
}

shooter.start = () =>
{
    // Set classes
    shooter.$container.classList.add('started')
    shooter.$container.classList.remove('ended')
    
    // Score
    shooter.score = 0
    shooter.$score.textContent = shooter.score

    // Set timer
    shooter.secondsLeft = 10

    shooter.tick()

    // Add first target
    shooter.addTarget()
}

shooter.end = () =>
{
    shooter.$container.classList.remove('started')
    shooter.$container.classList.add('ended')
    shooter.$start.textContent = 'Restart'

    // Play sound
    shooter.playSound('finish')

    shooter.$targets.removeChild(shooter.$targets.children[0])
}