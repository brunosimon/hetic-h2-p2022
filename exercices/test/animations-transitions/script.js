const menuTrigger = document.querySelector('.menu-trigger')
const menu = document.querySelector('.menu')

menuTrigger.addEventListener('click', () =>
{
    menu.classList.toggle('active')
})