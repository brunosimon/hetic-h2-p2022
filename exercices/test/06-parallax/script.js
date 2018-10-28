/**
 * Lazy load
 */
const $lazyLoads = document.querySelectorAll('.lazy-load')

for(const $lazyLoad of $lazyLoads)
{
    const image = document.createElement('img')

    image.addEventListener('load', () =>
    {
        $lazyLoad.style.backgroundImage = `url(${image.src})`
        $lazyLoad.classList.add('loaded')
    })

    image.src = $lazyLoad.dataset.lazySrc
}

/**
 * Resize
 */
let windowWidth = 800
let windowHeight = 600

const resizeCallback = () =>
{
    windowWidth = window.innerWidth
    windowHeight = window.innerHeight
}
window.addEventListener('resize', resizeCallback)
resizeCallback()

/**
 * Scroll parallax
 */
const $scrollParallaxes = document.querySelectorAll('.scroll-parallax')

window.addEventListener('scroll', () =>
{
    const scrollY = window.scrollY

    for(const $scrollParallax of $scrollParallaxes)
    {
        const depth = $scrollParallax.dataset.scrollParallaxDepth
        const translateY = depth * scrollY

        $scrollParallax.style.transform = `translateY(${translateY}px)`
    }
})

/**
 * Mouse parallax
 */
const $cursorParallaxes = document.querySelectorAll('.cursor-parallax')

window.addEventListener('mousemove', (_event) =>
{
    const ratioX = _event.clientX / window.innerWidth - 0.5
    const ratioY = _event.clientY / window.innerHeight - 0.5
    
    for(const $cursorParallax of $cursorParallaxes)
    {
        const depth = $cursorParallax.dataset.cursorParallaxDepth
        const translateX = - depth * ratioX * 100
        const translateY = - depth * ratioY * 100

        $cursorParallax.style.transform = `translateX(${translateX}%) translateY(${translateY}%)`
    }
})