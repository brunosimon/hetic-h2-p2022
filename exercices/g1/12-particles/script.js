/* Set up */
const $canvas = document.querySelector('.js-canvas')
const context = $canvas.getContext('2d')

/* Resize */
const sizes = { width: 800, height: 600 }

const resize = () =>
{
    sizes.width = window.innerWidth
    sizes.height = window.innerHeight

    $canvas.width = sizes.width
    $canvas.height = sizes.height
}
window.addEventListener('resize', resize)
resize()

/* Cursor */
const cursor = { x: 0, y: 0, down: false }

window.addEventListener('mousemove', (_event) =>
{
    cursor.x = _event.clientX
    cursor.y = _event.clientY
})

window.addEventListener('mousedown', () =>
{
    cursor.down = true
})

window.addEventListener('mouseup', () =>
{
    cursor.down = false
})

window.addEventListener('touchmove', (_event) =>
{
    cursor.x = _event.touches[0].clientX
    cursor.y = _event.touches[0].clientY
})

window.addEventListener('touchstart', (_event) =>
{
    cursor.x = _event.touches[0].clientX
    cursor.y = _event.touches[0].clientY

    cursor.down = true
})

window.addEventListener('touchend', () =>
{
    cursor.down = false
})

/* Particles */
let particles = []

/* Animation */
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // Particles
    if(cursor.down)
    {
        const particle = new Particle({
            x: cursor.x,
            y: cursor.y,
            context: context,
            sizes: sizes
        })
        particles.push(particle)
    }

    // Clear
    context.save()
    context.globalAlpha = 1
    context.fillStyle = '#222222'
    context.fillRect(0, 0, sizes.width, sizes.height)
    context.restore()

    // Draw
    for(const _particle of particles)
    {
        _particle.draw()
    }

    particles = particles.filter(_particle => !_particle.isOut)
}
loop()
