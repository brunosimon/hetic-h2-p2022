class Particle
{
    constructor(_x, _y, _context, _sizes)
    {
        this.x = _x
        this.y = _y
        this.context = _context
        this.sizes = _sizes

        this.radius = Math.random() * 5
        this.color = `hsl(${Math.random() * 360}, 100%, 50%)`

        const angle = Math.random() * Math.PI * 2
        this.speed = {}
        this.speed.base = 1 + Math.random()
        this.speed.x = Math.cos(angle) * this.speed.base
        this.speed.y = Math.sin(angle) * this.speed.base

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
        this.context.globalCompositeOperation = 'lighter'
        this.context.fillStyle = this.color
        this.context.fill()
        this.context.restore()
    }
}