// const promise1 = fetch('https://bruno-simon.com/hetic/p2022/resources/drumkit/sounds.json')

// promise1.then((_response) =>
// {
//     const promise2 = _response.json()

//     promise2.then((_data) =>
//     {
//         console.log(_data)
//     })
//     promise2.catch((_error) =>
//     {
//         console.log(_error)
//     })
// })

// promise1.catch((_error) =>
// {
//     console.log(_error)
// })

const initDrumkit = (_sounds) =>
{
    console.log(_sounds)
    // Container
    const $container = document.createElement('div')
    $container.classList.add('drumkit')
    document.body.appendChild($container)

    // Sounds array
    const sounds = []

    for(const _sound of _sounds)
    {
        // Button
        const $button = document.createElement('button')
        $button.classList.add('button')
        $container.appendChild($button)

        // Title
        const $title = document.createElement('div')
        $title.classList.add('title')
        $title.innerText = _sound.title
        $button.appendChild($title)

        // Audio
        const $audio = document.createElement('audio')
        $audio.setAttribute('src', _sound.src)

        // Button click play audio
        $button.addEventListener('mousedown', () =>
        {
            // Play from begining
            $audio.currentTime = 0
            $audio.play()
        })

        // Save in sounds array
        sounds.push({ keyMap: _sound.keyMap, $button, $title, $audio })
    }

    window.addEventListener('keydown', (_event) =>
    {
        // Find the sound by its keyMap
        const sound = sounds.find((_item) => _item.keyMap.indexOf(_event.keyCode) !== -1)

        // Sound found
        if(sound)
        {
            // Play from begining
            sound.$audio.currentTime = 0
            sound.$audio.play()
        }
    })
}

fetch('https://bruno-simon.com/hetic/p2022/resources/drumkit/sounds.json')
    .then(_response => _response.json())
    .then(initDrumkit)
