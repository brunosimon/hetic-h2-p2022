const drumkit = {}
drumkit.$container = document.querySelector('.drumkit')
drumkit.$buttons = [...drumkit.$container.querySelectorAll('.button')]
drumkit.$sounds = [...drumkit.$container.querySelectorAll('.sound')]

for(const $button of drumkit.$buttons)
{
    $button.addEventListener('mousedown', (_event) =>
    {
        _event.preventDefault()

        playSound($button.dataset.sound)
    })
}

document.addEventListener('keydown', (_event) =>
{
    const keyCode = _event.keyCode
    const className = `key-${keyCode}`
    const $button = drumkit.$buttons.find((_item) => _item.classList.contains(className))

    if($button)
    {
        playSound($button.dataset.sound)
    }
})

const playSound = (_name) =>
{
    const $sound = drumkit.$sounds.find((_item) => _item.classList.contains(_name))
    $sound.currentTime = 0
    $sound.play()
}