const $canvas = document.querySelector('.js-canvas')
const context = $canvas.getContext('2d')

// context.beginPath()
// context.moveTo(50, 50)
// context.lineTo(200, 200)
// context.lineTo(50, 200)
// // context.closePath()
// context.lineWidth = 20
// context.strokeStyle = '#ff0000'
// context.lineCap = 'square'
// context.lineJoin = 'round'
// context.stroke()

// context.beginPath()
// context.moveTo(300, 50)
// context.lineTo(450, 200)
// context.lineTo(300, 200)
// context.fillStyle = 'orange'
// context.shadowOffsetX = 10
// context.shadowOffsetY = 10
// context.shadowBlur = 50
// context.shadowColor = 'rgba(0, 0, 0, 0.4)'
// context.fill()

// context.beginPath()
// context.rect(50, 250, 200, 100)
// context.fill()

// context.beginPath()
// context.rect(300, 250, 200, 100)
// context.stroke()

// context.beginPath()
// context.arc(100, 450, 50, 0, Math.PI * 1.5, true)
// context.stroke()

// context.beginPath()
// context.moveTo(300, 450)
// context.arc(300, 450, 50, 0, Math.PI * 1.5, false)
// context.fill()

// context.fillStyle = 'blue'
// context.fillRect(550, 50, 200, 100)

// context.clearRect(200, 200, 200, 200)

// const text = 'Coucou la P2022'

// context.font = '40px Helvetica'
// context.textAlign = 'center'
// context.textBaseline = 'middle'

// context.fillText(text, 300, 300)

// context.lineWidth = 2
// context.strokeText(text, 300, 300)


// const image = new Image()

// image.addEventListener('load', () =>
// {
//     context.drawImage(image, 0, 0, image.width * 0.5, image.height * 0.5)
// })

// image.src = 'https://picsum.photos/400/300/?random'


// const gradient = context.createLinearGradient(100, 100, 700, 500)

// gradient.addColorStop(0, 'red')
// gradient.addColorStop(0.5, 'orange')
// gradient.addColorStop(1, 'white')

// context.fillStyle = gradient
// context.fillRect(0, 0, 800, 600)


// const gradient = context.createRadialGradient(
//     300, 100, 50,
//     300, 250, 250
// )

// gradient.addColorStop(0, 'red')
// gradient.addColorStop(0.2, 'blue')
// gradient.addColorStop(0.4, 'yellow')
// gradient.addColorStop(0.6, 'cyan')
// gradient.addColorStop(0.8, 'white')
// gradient.addColorStop(1, 'green')

// context.fillStyle = gradient
// context.fillRect(0, 0, 800, 600)

// context.fillRect(200, 100, 200, 100)

// context.save()
// context.fillStyle = 'red'

// context.fillRect(200, 250, 200, 100)

// context.restore()
// context.fillRect(200, 400, 200, 100)

// context.beginPath()
// context.moveTo(50, 50)
// context.bezierCurveTo(
//     300, 50,
//     50, 300,
//     300, 300
// )
// context.stroke()

// context.beginPath()
// context.moveTo(350, 50)
// context.quadraticCurveTo(
//     600, 50,
//     600, 300
// )
// context.strokeStyle = 'red'
// context.stroke()

// context.globalAlpha = 0.5
// context.globalCompositeOperation = 'lighter'

// context.fillStyle = '#ff0000'
// context.fillRect(50, 50, 200, 200)

// context.fillStyle = '#00ff00'
// context.fillRect(100, 100, 200, 200)

// context.fillStyle = '#0000ff'
// context.fillRect(150, 150, 200, 200)

// context.fillStyle = 'red'
// context.fillRect(200, 200, 200, 200)

// context.globalCompositeOperation = 'destination-out' /* source-over | source-in | source-out | source-atop | destination-over | destination-in | destination-out | desination-atop | lighter | copy | xor */

// context.beginPath()
// context.fillStyle = 'blue'
// context.arc(200, 250, 100, 0, Math.PI, false)
// context.fill()

// const image = new Image()
// image.crossOrigin = 'anonymous'

// image.addEventListener('load', () =>
// {
//     context.drawImage(image, 0, 0)
//     const imageData = context.getImageData(0, 0, 200, 400)
    
//     for(let i = 0; i < imageData.data.length; i += 4)
//     {
//         const r = imageData.data[i]
//         const g = imageData.data[i + 1]
//         const b = imageData.data[i + 2]

//         const gray = (r + g + b) / 3

//         imageData.data[i] = gray * 1.5
//         imageData.data[i + 1] = gray
//         imageData.data[i + 2] = gray * 2
//     }

//     context.putImageData(imageData, 0, 0)
// })

// image.src = 'https://picsum.photos/400/400/?random'

/**
 * Resize
 */
let windowWidth = $canvas.width
let windowHeight = $canvas.height

const resize = () =>
{
    windowWidth = window.innerWidth
    windowHeight = window.innerHeight

    $canvas.width = windowWidth
    $canvas.height = windowHeight
}

window.addEventListener('resize', resize)
resize()

/**
 * Ball
 */
const ball = {}
ball.x = 100
ball.y = 100
ball.radius = 50
ball.speed = {}
ball.speed.x = 0
ball.speed.y = 0

/**
 * Cursor
 */
const cursor = {}
cursor.x = 0
cursor.y = 0

$canvas.addEventListener('mousemove', (_event) =>
{
    cursor.x = _event.clientX
    cursor.y = _event.clientY
})

/**
 * Animation
 */
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // Update ball
    const angle = Math.atan2(cursor.y - ball.y, cursor.x - ball.x)
    const x = Math.cos(angle)
    const y = Math.sin(angle)

    ball.speed.x += x * 1
    ball.speed.y += y * 1

    ball.speed.x *= 0.98
    ball.speed.y *= 0.98

    ball.x += ball.speed.x
    ball.y += ball.speed.y
    
    // Clear
    // context.clearRect(0, 0, windowWidth, windowHeight)
    context.fillStyle = 'rgba(255, 255, 255, 0.1)'
    context.fillRect(0, 0, windowWidth, windowHeight)

    // Draw
    context.beginPath()
    context.fillStyle = 'orange'
    context.arc(ball.x, ball.y, ball.radius, 0, Math.PI * 2)
    context.fill()
}


loop()