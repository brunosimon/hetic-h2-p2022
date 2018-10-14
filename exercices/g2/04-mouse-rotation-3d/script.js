const element = document.querySelector('.element')
let windowWidth = window.innerWidth
let windowHeight = window.innerHeight

window.addEventListener('resize', () =>
{
    windowWidth = window.innerWidth
    windowHeight = window.innerHeight
})

window.addEventListener('mousemove', (_event) =>
{
    const x = (_event.clientX / window.innerWidth - 0.5) * 100
    const y = - (_event.clientY / window.innerHeight - 0.5) * 100

    element.style.transform = `rotateY(${x}deg) rotateX(${y}deg)`
})