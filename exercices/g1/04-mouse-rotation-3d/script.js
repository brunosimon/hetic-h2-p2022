const $element = document.querySelector('.element')
let windowWidth = 800
let windowHeight = 600

const resizeCallback = () =>
{
    windowWidth = window.innerWidth
    windowHeight = window.innerHeight
}

window.addEventListener('resize', resizeCallback)
resizeCallback()

document.addEventListener('mousemove', (_event) =>
{
    const x = (_event.clientX / windowWidth - 0.5) * 200
    const y = - (_event.clientY / windowHeight - 0.5) * 200

    $element.style.transform = `rotateX(${y}deg) rotateY(${x}deg)`
})