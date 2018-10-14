const menuToggle = document.querySelector('.menu-toggle')
const menu = document.querySelector('.menu')

// let menuOpened = false

menuToggle.addEventListener('click', () =>
{
    // // Method 1
    // if(menu.classList.contains('open'))
    // {
    //     menu.classList.remove('open')
    // }
    // else
    // {
    //     menu.classList.add('open')
    // }

    // // Method 2
    // if(menuOpened)
    // {
    //     menu.classList.remove('open')
    //     menuOpened = false
    // }
    // else
    // {
    //     menu.classList.add('open')
    //     menuOpened = true
    // }

    // Method 3
    menu.classList.toggle('open')
})
