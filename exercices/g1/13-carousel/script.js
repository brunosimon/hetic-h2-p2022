const $carousels = document.querySelectorAll('.js-carousel')

for(const $carousel of $carousels)
{
    const carousel = new HeticCarousel($carousel)
}
