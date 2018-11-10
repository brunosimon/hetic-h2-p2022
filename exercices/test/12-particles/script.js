const $canvas = document.querySelector('.js-canvas')
const context = $canvas.getContext('2d')

/**
 * Mouse
 */
const mouse = { x: 0, y: 0, down: false }

window.addEventListener('mousemove', (_event) =>
{
    mouse.x = _event.clientX
    mouse.y = _event.clientY
})

window.addEventListener('mousedown', () =>
{
    mouse.down = true
})

window.addEventListener('mouseup', () =>
{
    mouse.down = false
})

/**
 * Particles
 */
const particles = []

/**
 * Loop
 */
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // Create particles
    if(mouse.down)
    {
        const particle = new Particle({
            x: mouse.x,
            y: mouse.y,
            context: context
        })
        particles.push(particle)
    }

    // Clear
    context.clearRect(0, 0, $canvas.width, $canvas.height)

    // Draw particles
    for(let i = 0; i < particles.length; i++)
    {
        const _particle = particles[i]
        _particle.update(() =>
        {
            particles.splice(i, 1)
            i--
        })
    }
}

loop()