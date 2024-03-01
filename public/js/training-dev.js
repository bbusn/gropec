window.addEventListener('load', function() {
    const time = document.querySelector('#time');
    const timeIndicator = document.querySelector('#time-indicator');
    time.addEventListener('input', function() {
        timeIndicator.innerHTML = time.value + ' <span>min</span>';
        timeIndicator.style.left = `${Math.round(time.value/190*100)}%`;
        console.log(time.value + ' ' + timeIndicator.style.left);
    });
});