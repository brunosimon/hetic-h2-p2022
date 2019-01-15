import './css/style.styl'
import Toto from './js/Toto.js'
import image from './images/image.jpg'

const $img = new Image()
$img.src = image
document.body.appendChild($img)

console.log('hello webpack')

const toto = new Toto()

if(module.hot)
{
    module.hot.accept()

    module.hot.dispose(() =>
    {
        console.log('dispose')

        $img.remove()
    })
}