class HeticCarousel
{
    /**
     * Constructor
     */
    constructor(_options)
    {
        this.$container = _options.$container

        this.setAuto()
        this.setKeyboard()
        this.setSiblings()
        this.setSlides()
        this.setPagination()
        this.setLoading()

        this.goTo(0)
    }

    /**
     * Set auto
     */
    setAuto()
    {
        this.auto = {}
        this.auto.active = !!this.$container.dataset.hasAuto

        // No auto
        if(!this.auto.active)
        {
            return
        }

        this.auto.interval = null
        
        // Start
        this.auto.start = () =>
        {
            this.auto.interval = window.setInterval(() =>
            {
                this.next()
            }, 2000)
        }

        // Stop
        this.auto.stop = () =>
        {
            window.clearInterval(this.auto.interval)
        }
        
        // Toggle start and stop when mouse enter or leave
        this.$container.addEventListener('mouseenter', () => {
            this.auto.stop()
        })
        
        this.$container.addEventListener('mouseleave', () => {
            this.auto.start()
        })

        // Initial start
        this.auto.start()
    }

    /**
     * Set keyboard
     */
    setKeyboard()
    {
        this.keyboard = {}
        this.keyboard.active = !!this.$container.dataset.hasKeyboard

        // No keyboard
        if(!this.keyboard.active)
        {
            return
        }

        window.addEventListener('keydown', (_event) =>
        {
            const bounding = this.$container.getBoundingClientRect()
            const middle = bounding.top + bounding.height * 0.5

            // Out
            if(middle < 0 || middle > window.innerHeight)
            {
                return
            }

            if(_event.keyCode === 39)
            {
                this.next()
            }
            else if(_event.keyCode === 37)
            {
                this.previous()
            }
        })
    }

    /**
     * Set siblings
     */
    setSiblings()
    {
        // Set up
        this.siblings = {}
        this.siblings.active = !!this.$container.dataset.hasSiblings
        
        // No sibling
        if(!this.siblings.active)
        {
            return
        }

        // Create DOM
        this.siblings.$next = document.createElement('button')
        this.siblings.$next.classList.add('next')
        this.siblings.$next.classList.add('sibling')
        this.$container.appendChild(this.siblings.$next)

        this.siblings.$next.addEventListener('click', () => this.next())

        this.siblings.$previous = document.createElement('button')
        this.siblings.$previous.classList.add('previous')
        this.siblings.$previous.classList.add('sibling')
        this.$container.appendChild(this.siblings.$previous)

        this.siblings.$previous.addEventListener('click', () => this.previous())
    }

    /**
     * Set slides
     */
    setSlides()
    {
        this.slides = {}
        this.slides.index = 0
        this.slides.$items = this.$container.querySelectorAll('.slide')
    }

    /**
     * Set pagination
     */
    setPagination()
    {
        // Set up
        this.pagination = {}
        this.pagination.active = !!this.$container.dataset.hasPagination
        
        // No sibling
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
            const $item = document.createElement('button')
            $item.classList.add('item')

            this.pagination.$container.appendChild($item)
            this.pagination.$items.push($item)
        }
    }

    /**
     * Set loading
     */
    setLoading()
    {
        // Handle each slide separatly
        for(const $item of this.slides.$items)
        {
            // Set up
            const $imgs = $item.querySelectorAll('img')
            const toLoad = $imgs.length
            let loaded = 0

            // Test if all images loaded in the slide and update class
            const loadedOne = () =>
            {
                loaded++

                if(loaded >= toLoad)
                {
                    $item.classList.add('is-loaded')
                }
            }

            // If no image to load, update class directly
            if($imgs.length === 0)
            {
                $item.classList.add('is-loaded')
            }

            // Handle each image of the slide
            for(const $img of $imgs)
            {
                // Image already loaded
                if($img.complete)
                {
                    loadedOne()
                }

                // Image not loaded
                else
                {
                    // Listen to load event
                    $img.addEventListener('load', () =>
                    {
                        loadedOne()
                    })
                }
            }
        }
    }

    /**
     * Navigation
     */
    next()
    {
        let index = this.slides.index + 1

        // Loop
        if(index >= this.slides.$items.length)
        {
            index = 0
        }
        
        // Go to
        this.goTo(index)
    }

    previous()
    {
        let index = this.slides.index - 1

        // Loop
        if(index < 0)
        {
            index = this.slides.$items.length - 1
        }

        // Go to
        this.goTo(index)
    }

    goTo(_index)
    {
        // Update slides classes
        for(let i = 0; i < this.slides.$items.length; i++)
        {
            const $item = this.slides.$items[i]
            
            if(i < _index)
            {
                $item.classList.add('is-before')
                $item.classList.remove('is-active')
                $item.classList.remove('is-after')
            }
            else if(i === _index)
            {
                $item.classList.remove('is-before')
                $item.classList.add('is-active')
                $item.classList.remove('is-after')
            }
            else if(i > _index)
            {
                $item.classList.remove('is-before')
                $item.classList.remove('is-active')
                $item.classList.add('is-after')
            }
        }

        // Update pagination classes
        if(this.pagination.active)
        {
            for(let i = 0; i < this.pagination.$items.length; i++)
            {
                const $item = this.pagination.$items[i]

                if(i === _index)
                {
                    $item.classList.add('is-active')
                }
                else
                {
                    $item.classList.remove('is-active')
                }
            }
        }

        // Save index
        this.slides.index = _index
    }
}