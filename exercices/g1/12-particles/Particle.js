class Particle
{
    constructor(_options)
    {
        this.x = _options.x
        this.y = _options.y
        this.context = _options.context
        this.sizes = _options.sizes

        this.angle = Math.random() * Math.PI * 2
        this.speed = {}
        this.speed.x = Math.cos(this.angle)
        this.speed.y = Math.sin(this.angle)

        this.radius = Math.random() * 20
        this.color = `hsl(${Math.random() * 360}, 100%, 50%)`

        this.isOut = false
    }

    draw()
    {
        this.x += this.speed.x
        this.y += this.speed.y

        if(
            this.x < - this.radius ||
            this.x > this.sizes.width + this.radius ||
            this.y < - this.radius ||
            this.y > this.sizes.height + this.radius
        )
        {
            this.isOut = true
        }

        this.context.save()
        this.context.beginPath()
        this.context.arc(this.x, this.y, this.radius, 0, Math.PI * 2)
        this.context.fillStyle = this.color
        this.context.globalCompositeOperation = 'lighter'
        this.context.fill()
        this.context.restore()
    }
}
