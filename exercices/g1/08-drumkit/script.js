const initSounds = (_sounds) =>
{
    // Create container
    const $container = document.createElement('div')
    $container.classList.add('drumkit')
    document.body.appendChild($container)

    const sounds = []

    // Each sound
    for(const _sound of _sounds)
    {
        // Create button
        const $button = document.createElement('button')
        $button.classList.add('button')
        $container.appendChild($button)

        // Create title
        const $title = document.createElement('div')
        $title.classList.add('title')
        $title.textContent = _sound.title
        $button.appendChild($title)

        // Create audio
        const $audio = document.createElement('audio')
        $audio.setAttribute('src', _sound.src)

        // Listen to clicks
        const buttonDownCallback = (_event) =>
        {
            _event.preventDefault()
            
            $audio.currentTime = 0
            $audio.play()
        }
        $button.addEventListener('mousedown', buttonDownCallback)
        $button.addEventListener('touchstart', buttonDownCallback)

        // Save sound
        sounds.push({ $audio, keyMap: _sound.keyMap })
    }

    window.addEventListener('keydown', (_event) =>
    {
        const sound = sounds.find((_item) => _item.keyMap.indexOf(_event.keyCode) !== -1)
        
        if(sound)
        {
            sound.$audio.currentTime = 0
            sound.$audio.play()
        }
    })
}

window
    .fetch('https://bruno-simon.com/hetic/p2022/resources/drumkit/sounds.json')
    .then(_response => _response.json())
    .then(initSounds)

