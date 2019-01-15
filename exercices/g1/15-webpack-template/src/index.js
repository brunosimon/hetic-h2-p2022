import './css/style.styl'

console.log('Hello webpack')

// Hot
if(module.hot)
{
    module.hot.accept()

    module.hot.dispose(() =>
    {
        console.log('dispose')
    })
}