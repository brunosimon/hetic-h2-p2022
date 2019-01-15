import './css/style.styl'
import image from './images/image.jpg'
import font from './fonts/heboo-bold.woff2'
import Carousel from './js/Carousel.js'
import Application from './js/Application'

console.log(font)

console.log('Hello HETIC')

const $image = new Image()
$image.src = image
document.body.appendChild($image)

const carousel = new Carousel()

const application = new Application()

// Hot
if(module.hot)
{
    module.hot.accept()

    module.hot.dispose(() =>
    {
        console.log('dispose')

        application.destructor()

        document.body.removeChild($image)
    })
}