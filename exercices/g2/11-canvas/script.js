const $canvas = document.querySelector('.js-canvas')
const context = $canvas.getContext('2d')

context.beginPath()
context.moveTo(50, 50)
context.lineTo(200, 200)
context.lineTo(50, 200)
// context.closePath()
context.lineWidth = 20
context.lineCap = 'square'
context.lineJoin = 'round'
context.strokeStyle = 'orange'
context.stroke()

// context.beginPath()
// context.moveTo(250, 50)
// context.lineTo(400, 200)
// context.lineTo(250, 200)
// // context.closePath()
// context.fillStyle = 'red'
// context.shadowOffsetX = 0
// context.shadowOffsetY = 0
// context.shadowBlur = 10
// context.shadowColor = 'rgba(0, 0, 0, 0.5)'
// context.fill()

// context.beginPath()
// context.rect(50, 250, 150, 100)
// context.fill()

// context.beginPath()
// context.rect(250, 250, 150, 100)
// context.stroke()

// context.beginPath()
// context.arc(100, 500, 70, 0, Math.PI * 1.5)
// context.stroke()

// context.beginPath()
// context.moveTo(300, 500)
// context.arc(300, 500, 70, 0, Math.PI * 1.5)
// context.fill()

// context.fillStyle = 'blue'
// context.fillRect(450, 50, 150, 100)

// context.clearRect(150, 150, 200, 200)

// const text = 'Coucou le groupe 2'
// context.font = '30px Helvetica'
// context.textAlign = 'left'
// context.textBaseline = 'middle'
// context.fillText(text, 450, 200)
// context.lineWidth = 1
// context.strokeText(text, 450, 250)

// const image = new Image()

// image.addEventListener('load', () =>
// {
//     context.drawImage(image, 450, 300, image.width * 0.5, image.height * 0.5)
// })

// image.src = 'https://picsum.photos/400/300/?random'


// // const gradient = context.createLinearGradient(100, 100, 700, 500)

// // gradient.addColorStop(0, 'red')
// // gradient.addColorStop(0.5, 'orange')
// // gradient.addColorStop(1, 'white')

// // context.fillStyle = gradient

// // context.fillRect(0, 0, 800, 600)

// const gradient = context.createRadialGradient(
//     300, 100, 50,
//     300, 250, 250
// )

// gradient.addColorStop(0, 'red')
// gradient.addColorStop(0.5, 'orange')
// gradient.addColorStop(1, 'blue')

// context.fillStyle = gradient

// context.fillRect(0, 0, 800, 600)

// context.save()

// context.fillStyle = 'red'
// context.shadowBlur = 20
// context.shadowColor = 'blue'
// context.fillRect(100, 100, 200, 100)

// context.restore()

// context.fillRect(100, 300, 200, 100)


// context.beginPath()
// context.moveTo(50, 50)
// context.bezierCurveTo(
//     250, 50,
//     50, 250,
//     250, 250
// )
// context.stroke()

// context.beginPath()
// context.moveTo(300, 50)
// context.quadraticCurveTo(
//     500, 50,
//     500, 250
// )
// context.stroke()

// context.globalAlpha = 0.5
// context.globalCompositeOperation = 'lighten'

// context.fillStyle = '#ff0000'
// context.fillRect(50, 50, 200, 200)

// context.fillStyle = '#00ff00'
// context.fillRect(100, 100, 200, 200)

// context.fillStyle = '#0000ff'
// context.fillRect(150, 150, 200, 200)

// context.fillStyle = 'red'
// context.fillRect(200, 200, 200, 200)

// context.globalCompositeOperation = 'xor'
// /* source-over | source-in | source-out | source-atop | destination-over | destination-in | destination-out | desination-atop | lighter | copy | xor */

// context.beginPath()
// context.fillStyle = 'blue'
// context.arc(200, 250, 100, 0, Math.PI, false)
// context.fill()


// const image = new Image()
// image.crossOrigin = 'anonymous'

// image.addEventListener('load', () =>
// {
//     context.drawImage(image, 0, 0)
//     const imageData = context.getImageData(
//         0, 0, image.width * 0.5, image.height
//     )
    
//     for(let i = 0; i < imageData.data.length; i += 4)
//     {
//         const r = imageData.data[i]
//         const g = imageData.data[i + 1]
//         const b = imageData.data[i + 2]
//         const gray = (r + g + b) / 3

//         imageData.data[i]     = gray
//         imageData.data[i + 1] = gray
//         imageData.data[i + 2] = gray
//     }

//     context.putImageData(imageData, 0, 0)
// })

// image.src = 'https://picsum.photos/600/400/?random'


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
ball.speed.x = 10
ball.speed.y = 0
ball.gravity = 0.5
ball.airFriction = 0.99

/**
 * Click
 */
$canvas.addEventListener('click', (_event) =>
{
    const distance = Math.hypot(
        ball.x - _event.clientX,
        ball.y - _event.clientY
    )

    if(distance < ball.radius)
    {
        ball.speed.x = Math.random() * 20 - 10
        ball.speed.y = - 15
    }
})

/**
 * Animation
 */
const loop = () =>
{
    window.requestAnimationFrame(loop)

    // Update
    ball.speed.x *= ball.airFriction
    ball.speed.y *= ball.airFriction

    ball.speed.y += ball.gravity

    ball.x += ball.speed.x
    ball.y += ball.speed.y

    if(ball.y > windowHeight - ball.radius)
    {
        ball.speed.y *= - 1
        ball.y = windowHeight - ball.radius
    }
    if(ball.x > windowWidth - ball.radius)
    {
        ball.speed.x *= - 1
        ball.x = windowWidth - ball.radius
    }
    if(ball.x < ball.radius)
    {
        ball.speed.x *= - 1
        ball.x = ball.radius
    }

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