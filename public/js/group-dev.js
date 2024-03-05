window.addEventListener('load', function() {
    const trainings = document.querySelectorAll('.group-today-training');
    if (trainings.length > 0) {
        trainings.forEach(training => {
            training.addEventListener('click', function() {
                const href = training.getAttribute('data-href');
                window.location.href = `${href}`;
            });
        });
    }
});