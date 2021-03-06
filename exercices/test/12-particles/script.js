/**
 * Set up
 */
const $canvas = document.querySelector('.js-canvas')
const context = $canvas.getContext('2d')

/**
 * Resize
 */
const sizes = {
    width: 800,
    height: 800
}

const resize = () =>
{
    sizes.width = window.innerWidth
    sizes.height = window.innerHeight

    $canvas.width = sizes.width
    $canvas.height = sizes.height
}

window.addEventListener('resize', resize)
resize()

/**
 * Cursor
 */
const cursor = {
    x: 0,
    y: 0,
    down: false
}

document.addEventListener('mousemove', (_event) =>
{
    cursor.x = _event.clientX
    cursor.y = _event.clientY
})

document.addEventListener('mousedown', () =>
{
    cursor.down = true
})

document.addEventListener('mouseup', () =>
{
    cursor.down = false
})

document.addEventListener('touchmove', (_event) =>
{
    cursor.x = _event.touches[0].clientX
    cursor.y = _event.touches[0].clientY
})

document.addEventListener('touchstart', (_event) =>
{
    cursor.x = _event.touches[0].clientX
    cursor.y = _event.touches[0].clientY

    cursor.down = true
})

document.addEventListener('touchend', () =>
{
    cursor.down = false
})

/**
 * Particles
 */
let particles = []

/**
 * Loop
 */
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // Create particle
    if(cursor.down)
    {
        for(let i = 0; i < 2; i++)
        {
            const particle = new Particle({
                x: cursor.x,
                y: cursor.y,
                sizes: sizes,
                context: context
            })
            particles.push(particle)
        }
    }
    
    // Clear
    context.fillStyle = '#222222'
    context.fillRect(0, 0, sizes.width, sizes.height)

    // Draw
    for(const _particle of particles)
    {
        _particle.draw()
    }

    // Remove dead particles
    particles = particles.filter((_item) => !_item.out)
}

loop()