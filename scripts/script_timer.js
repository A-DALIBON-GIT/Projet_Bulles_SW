const timerBar = document.querySelector('.barre');
const duration = 20;
const totalWidth = 100;
const interval = 1000;
let currentTime = duration;
const thresholdPercentage = 0.25;
const thresholdTime = duration * thresholdPercentage;
let timerInterval;

const communiquerEntreScripts = new BroadcastChannel('messageScripts');

function updateTimer() {
    currentTime--;

    const newWidth = Math.max(0, (currentTime / duration) * totalWidth);
    timerBar.style.width = `${newWidth}%`;

    if (currentTime <= thresholdTime) {
        timerBar.style.backgroundColor = '#FF6161';
    }

    if (currentTime < 0) {
        clearInterval(timerInterval);
        communiquerEntreScripts.postMessage({type: 'fin_du_timer'});
        console.log('Fin du timer, message envoyé via BroadcastChannel.')
    }
}

updateTimer();
timerInterval = setInterval(updateTimer, interval);