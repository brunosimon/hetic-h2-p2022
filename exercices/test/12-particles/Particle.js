class Particle
{
    constructor(_options)
    {
        this.context = _options.context
        this.x = _options.x
        this.y = _options.y

        this.speed = {}
        this.speed.x = (Math.random() - 0.5) * 4
        this.speed.y = (Math.random() - 0.5) * 4

        this.radius = Math.random() * 20

        this.color = `hsl(${Math.random() * 360}, 100%, 50%)`
    }

    update(_die)
    {
        // Update
        this.x += this.speed.x
        this.y += this.speed.y

        // Draw
        this.context.beginPath()
        this.context.arc(this.x, this.y, this.radius, 0, Math.PI * 2)
        this.context.fillStyle = this.color
        this.context.fill()

        // Die
        if(
            this.x < - this.radius ||
            this.x > $canvas.width + this.radius ||
            this.y < - this.radius ||
            this.y > $canvas.height + this.radius
        )
        {
            _die()
        }
    }
}