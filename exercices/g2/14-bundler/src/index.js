import './css/style.styl'
import imageSource from './images/image.jpg'
import Carousel from './js/Carousel.js'

console.log('Hello Hetic')

const $image = new Image()
$image.src = imageSource
document.body.appendChild($image)

const carousel = new Carousel()

// Hot reload
if(module.hot)
{
    module.hot.accept()

    module.hot.dispose(() =>
    {
        document.body.removeChild($image)
    })
}
