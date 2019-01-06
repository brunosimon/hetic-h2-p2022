import './css/style.styl'
import image from './images/image.jpg'
import Toto from './js/Toto.js'

console.log('Kikooo')
console.log(image)

const toto1 = new Toto()
const toto2 = new Toto()
const toto3 = new Toto()

if(module.hot)
{
    module.hot.accept()

    module.hot.dispose(() =>
    {
        console.log('dispose')
    })
}