const $canvas = document.querySelector('.js-canvas')
const context = $canvas.getContext('2d')

// Resize
let canvasBoundings = null
const resize = () =>
{
    canvasBoundings = $canvas.getBoundingClientRect()
}
window.addEventListener('resize', resize)
resize()

// Mouse
const mouse = { x: 0, y: 0 }
window.addEventListener('mousemove', (_event) =>
{
    mouse.x = _event.clientX - canvasBoundings.left
    mouse.y = _event.clientY - canvasBoundings.top
})

// Ball coordinates
const ball = { x: 100, y: 100, speed: { x: 0, y: 0 } }

// Loop
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // // Ball easing
    // ball.x += (mouse.x - ball.x) * 0.1
    // ball.y += (mouse.y - ball.y) * 0.1

    // Ball speed
    const deltaX = mouse.x - ball.x
    const deltaY = mouse.y - ball.y
    const angle = Math.atan2(deltaY, deltaX)
    const accelerationX = Math.cos(angle)
    const accelerationY = Math.sin(angle)
    ball.speed.x += accelerationX * 1
    ball.speed.y += accelerationY * 1

    ball.x += ball.speed.x
    ball.y += ball.speed.y

    ball.speed.x *= 0.96
    ball.speed.y *= 0.96

    // Clear
    // context.clearRect(0, 0, $canvas.width, $canvas.height)
    
    context.fillStyle = '#ffffff'
    context.globalAlpha = 0.1
    context.fillRect(0, 0, $canvas.width, $canvas.height)
    
    // Draw ball
    context.beginPath()
    context.arc(ball.x, ball.y, 30, 0, Math.PI * 2)
    context.fillStyle = 'orange'
    context.globalAlpha = 1
    context.fill()
}

loop()