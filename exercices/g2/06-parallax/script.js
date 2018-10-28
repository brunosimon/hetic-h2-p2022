/**
 * Lazy
 */
const lazyElements = document.querySelectorAll('.lazy')

for(const lazyElement of lazyElements)
{
    const image = document.createElement('img')
    image.addEventListener('load', () =>
    {
        lazyElement.style.backgroundImage = `url(${lazyElement.dataset.src})`
        lazyElement.classList.add('loaded')
    })
    image.setAttribute('src', lazyElement.dataset.src)
}

/**
 * Scroll parallax
 */
const scrollParallaxes = document.querySelectorAll('.scroll-parallax')

window.addEventListener('scroll', () =>
{
    const scrollY = window.scrollY

    for(const scrollParallax of scrollParallaxes)
    {
        const depth = parseFloat(scrollParallax.dataset.scrollDepth);
        const translateY = scrollY * depth

        scrollParallax.style.transform = `translateY(${translateY}px)`
    }
})

/**
 * Sizes
 */
let windowWidth = window.innerWidth
let windowHeight = window.innerHeight

window.addEventListener('resize', () =>
{
    windowWidth = window.innerWidth
    windowHeight = window.innerHeight
})

/**
 * Cursor parallax
 */
const cursorParallaxes = document.querySelectorAll('.cursor-parallax')

window.addEventListener('mousemove', (_event) =>
{
    const ratioX = _event.clientX / windowWidth - 0.5
    const ratioY = _event.clientY / windowHeight - 0.5
    
    for(const cursorParallax of cursorParallaxes)
    {
        const depth = parseFloat(cursorParallax.dataset.cursorDepth)
        const translateX = - ratioX * depth * 100
        const translateY = - ratioY * depth * 100

        cursorParallax.style.transform = `translate(${translateX}%, ${translateY}%)`
    }
})
