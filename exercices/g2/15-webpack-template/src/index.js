import './css/style.styl'

console.log('Hello webpack')

// Hot reload
if(module.hot)
{
    module.hot.accept()

    module.hot.dispose(() =>
    {
        document.body.removeChild($image)
    })
}
