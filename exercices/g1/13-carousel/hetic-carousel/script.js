class HeticCarousel
{
    constructor($container)
    {
        this.$container = $container
        
        this.setSlides()
        this.setSiblings()
        this.setAuto()
        this.setPagination()

        this.goTo(0)
    }

    setSlides()
    {
        this.slides = {}
        this.slides.$items = this.$container.querySelectorAll('.slide')
        this.slides.index = 0
    }

    setSiblings()
    {
        this.siblings = {}
        this.siblings.active = !!this.$container.dataset.siblings

        // Siblings not active
        if(!this.siblings.active)
        {
            return
        }

        // Create DOM
        this.siblings.$previous = document.createElement('button')
        this.siblings.$previous.classList.add('sibling', 'previous')
        this.$container.appendChild(this.siblings.$previous)

        this.siblings.$next = document.createElement('button')
        this.siblings.$next.classList.add('sibling', 'next')
        this.$container.appendChild(this.siblings.$next)

        // Listen to click
        this.siblings.$previous.addEventListener('click', () =>
        {
            this.previous()
        })
        this.siblings.$next.addEventListener('click', () =>
        {
            this.next()
        })
    }

    setAuto()
    {
        this.auto = {}
        this.auto.active = !!this.$container.dataset.auto

        // Auto not active
        if(!this.auto.active)
        {
            return
        }

        this.auto.start = () =>
        {
            this.auto.interval = window.setInterval(() =>
            {
                this.next()
            }, 2000)
        }
        this.auto.stop = () =>
        {
            window.clearInterval(this.auto.interval)
        }

        this.$container.addEventListener('mouseenter', () =>
        {
            this.auto.stop()
        })
        this.$container.addEventListener('mouseleave', () =>
        {
            this.auto.start()
        })

        this.auto.start()
    }

    setPagination()
    {
        this.pagination = {}
        this.pagination.active = !!this.$container.dataset.pagination

        // Pagination not active
        if(!this.pagination.active)
        {
            return
        }

        // Create DOM
        this.pagination.$container = document.createElement('div')
        this.pagination.$container.classList.add('pagination')
        this.$container.appendChild(this.pagination.$container)

        this.pagination.$items = []

        for(let i = 0; i < this.slides.$items.length; i++)
        {
            const $page = document.createElement('button')
            $page.classList.add('page')
            this.pagination.$container.appendChild($page)

            $page.addEventListener('click', () =>
            {
                this.goTo(i)
            })

            this.pagination.$items.push($page)
        }
    }

    previous()
    {
        let index = this.slides.index - 1

        if(index < 0)
        {
            index = this.slides.$items.length - 1
        }

        this.goTo(index)
    }

    next()
    {
        let index = this.slides.index + 1

        if(index > this.slides.$items.length - 1)
        {
            index = 0
        }

        this.goTo(index)
    }

    goTo(_index)
    {
        // Update slide classes
        for(let i = 0; i < this.slides.$items.length; i++)
        {
            const $slide = this.slides.$items[i]
            
            if(i < _index)
            {
                $slide.classList.add('is-before')
                $slide.classList.remove('is-current', 'is-after')
            }
            else if(i === _index)
            {
                $slide.classList.add('is-current')
                $slide.classList.remove('is-before', 'is-after')
            }
            else
            {
                $slide.classList.add('is-after')
                $slide.classList.remove('is-before', 'is-current')
            }
        }

        // Update pagination classes
        for(let i = 0; i < this.pagination.$items.length; i++)
        {
            const $page = this.pagination.$items[i]

            if(i === _index)
            {
                $page.classList.add('is-active')
            }
            else
            {
                $page.classList.remove('is-active')
            }
        }

        // Save index
        this.slides.index = _index
    }
}
