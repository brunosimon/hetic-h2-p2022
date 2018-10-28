// // Version 1
// const hoursElement = document.querySelector('.clock .needle.hours')
// const minutesElement = document.querySelector('.clock .needle.minutes')
// const secondsElement = document.querySelector('.clock .needle.seconds')

// // Version 2
// const clockElement = document.querySelector('.clock')
// const hoursElement = clockElement.querySelector('.needle.hours')
// const minutesElement = clockElement.querySelector('.needle.minutes')
// const secondsElement = clockElement.querySelector('.needle.seconds')

// // Version 3
// const needlesElements = document.querySelectorAll('.clock .needle')
// const hoursElement = needlesElements[0]
// const minutesElement = needlesElements[1]
// const secondsElement = needlesElements[2]

// Version 4
const needlesElements = [...document.querySelectorAll('.clock .needle')]
const hoursElement = needlesElements.find(item =>item.classList.contains('hours'))
const minutesElement = needlesElements.find(item =>item.classList.contains('minutes'))
const secondsElement = needlesElements.find(item =>item.classList.contains('seconds'))

const tick = () =>
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
window.setInterval(tick, 1000)
tick()
