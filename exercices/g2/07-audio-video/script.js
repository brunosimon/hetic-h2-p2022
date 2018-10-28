const player = {}

player.$container = document.querySelector('.player')
player.$video = player.$container.querySelector('video')
player.$play = player.$container.querySelector('.play')
player.$pause = player.$container.querySelector('.pause')
player.$volumeUp = player.$container.querySelector('.volume-up')
player.$volumeDown = player.$container.querySelector('.volume-down')
player.$seek = player.$container.querySelector('.seek')
player.$fill = player.$seek.querySelector('.fill')

player.$play.addEventListener('click', () =>
{
    player.$video.play()
})

player.$pause.addEventListener('click', () =>
{
    player.$video.pause()
})

player.$volumeDown.addEventListener('click', () =>
{
    player.$video.volume = player.$video.volume - 0.1 < 0 ? 0 : player.$video.volume - 0.1
})

player.$volumeUp.addEventListener('click', () =>
{
    player.$video.volume = player.$video.volume + 0.1 > 1 ? 1 : player.$video.volume + 0.1
})

player.$seek.addEventListener('click', (_event) =>
{
    const mouseX = _event.clientX
    const bounding = player.$seek.getBoundingClientRect()
    const ratio = (mouseX - bounding.left) / bounding.width
    const time = ratio * player.$video.duration

    player.$video.currentTime = time
    player.$video.play()
})

const loop = () =>
{
    window.requestAnimationFrame(loop)
    
    if(!player.$video.paused)
    {
        const scale = player.$video.currentTime / player.$video.duration
        player.$fill.style.transform = `scaleX(${scale})`
    }
}

loop()
