// const promise = window.fetch('https://bruno-simon.com/hetic/p2022/resources/drumkit/sounds.json')

// promise.then((_response) =>
// {
//     const promise = _response.json()
    
//     promise.then((_data) =>
//     {
//         console.log(_data)
//     })
// })

// Init sounds
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
        // Button
        const $button = document.createElement('button')
        $button.classList.add('button')
        $container.appendChild($button)

        // Title
        const $title = document.createElement('div')
        $title.classList.add('title')
        $title.textContent = _sound.title
        $button.appendChild($title)

        // Audio
        const $audio = document.createElement('audio')
        $audio.setAttribute('src', _sound.src)

        const pointerDownCallback = (_event) =>
        {
            _event.preventDefault()

            $audio.currentTime = 0
            $audio.play()
        }

        $button.addEventListener('touchstart', pointerDownCallback)
        $button.addEventListener('mousedown', pointerDownCallback)

        sounds.push({ $audio, keyMap: _sound.keyMap })
    }

    console.log(sounds)

    window.addEventListener('keydown', (_event) =>
    {
        const sound = sounds.find(_item => _item.keyMap.includes(_event.keyCode))

        if(sound)
        {
            sound.$audio.currentTime = 0
            sound.$audio.play()
        }
    })
}

// Load sounds json
window
    .fetch('https://bruno-simon.com/hetic/p2022/resources/drumkit/sounds.json')
    .then(_response => _response.json())
    .then(_data =>
    {
        initSounds(_data)
    })
