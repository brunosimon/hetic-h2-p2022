const $player = document.querySelector('.player')
const $video = $player.querySelector('video')
const $play = $player.querySelector('.button.play')
const $pause = $player.querySelector('.button.pause')
const $volumeUp = $player.querySelector('.button.volume-up')
const $volumeDown = $player.querySelector('.button.volume-down')
const $seekBarFill = $player.querySelector('.seek-bar .fill')

$play.addEventListener('click', () => $video.play())
$pause.addEventListener('click', () => $video.pause())
$volumeUp.addEventListener('click', () => $video.volume = $video.volume + 0.1 > 1 ? 1 : $video.volume + 0.1)
$volumeDown.addEventListener('click', () => $video.volume = $video.volume - 0.1 < 0 ? 0 : $video.volume - 0.1)

const loop = () =>
{
    window.requestAnimationFrame(loop)

    if(!$video.paused)
    {
        const scale = $video.currentTime / $video.duration
        $seekBarFill.style.transform = `scaleX(${scale})`
    }
}
loop()