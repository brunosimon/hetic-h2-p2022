window.setInterval(() =>
{
    const date = new Date()

    const hours = date.getHours()
    const hoursAngle = hours / 60 * 360 + 180
    const hoursElement = document.querySelector('.clock .hours')
    hoursElement.style.transform = `rotate(${hoursAngle}deg)`

    const minutes = date.getMinutes()
    const minutesAngle = minutes / 60 * 360 + 180 + 360 * hours
    const minutesElement = document.querySelector('.clock .minutes')
    minutesElement.style.transform = `rotate(${minutesAngle}deg)`

    const seconds = date.getSeconds()
    const secondsAngle = seconds / 60 * 360 + 180 + 360 * hours + 360 * minutes
    const secondsElement = document.querySelector('.clock .seconds')
    secondsElement.style.transform = `rotate(${secondsAngle}deg)`
}, 1000)