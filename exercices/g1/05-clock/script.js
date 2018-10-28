// // Version 1
// const hoursElement = document.querySelector('.clock .hours')
// const minutesElement = document.querySelector('.clock .minutes')
// const secondsElement = document.querySelector('.clock .seconds')

// Version 2
const clockElement = document.querySelector('.clock')
const hoursElement = clockElement.querySelector('.hours')
const minutesElement = clockElement.querySelector('.minutes')
const secondsElement = clockElement.querySelector('.seconds')

// // Version 3
// const needlesElements = [...document.querySelectorAll('.clock .needle')]
// const hoursElement = needlesElements.find(item => item.classList.contains('hours'))
// const minutesElement = needlesElements.find(item => item.classList.contains('minutes'))
// const secondsElement = needlesElements.find(item => item.classList.contains('seconds'))

const tickCallback = () =>
{
    const date = new Date()

    const hours = date.getHours()
    const minutes = date.getMinutes()
    const seconds = date.getSeconds()

    const hoursAngle = 360 / 12 * hours
    const minutesAngle = hours * 360 + 360 / 60 * minutes
    const secondsAngle = hours * 360 + minutes * 360 + 360 / 60 * seconds

    hoursElement.style.transform = `rotate(${hoursAngle}deg)`
    minutesElement.style.transform = `rotate(${minutesAngle}deg)`
    secondsElement.style.transform = `rotate(${secondsAngle}deg)`
}

window.setInterval(tickCallback, 1000)
tickCallback()

