class Particle
{
    constructor(_options)
    {
        this.x = _options.x
        this.y = _options.y
        this.sizes = _options.sizes
        this.context = _options.context

        this.direction = Math.PI * 2 * Math.random()
        this.speed = {}
        this.speed.base = 1 + Math.random() * 1
        this.speed.x = Math.cos(this.direction) * this.speed.base
        this.speed.y = Math.sin(this.direction) * this.speed.base
        this.out = false
        this.radius = Math.random() * 10
        this.fillStyle = `hsl(${Math.random() * 360}, 100%, 50%)`
    }

    draw()
    {
        this.x += this.speed.x
        this.y += this.speed.y

        this.context.save()
        this.context.beginPath()
        this.context.arc(this.x, this.y, this.radius, 0, Math.PI * 2)
        this.context.globalCompositeOperation = 'lighten'
        this.context.fillStyle = this.fillStyle
        this.context.fill()
        this.context.restore()

        if(this.x < - this.radius || this.x > this.sizes.width + this.radius || this.y < - this.radius || this.y > this.sizes.height + this.radius)
        {
            this.out = true
        }
    }
}