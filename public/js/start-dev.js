let installPrompt;
const element = document.documentElement;
const startButton = document.getElementById('start');
const startForm = document.getElementById('start-form');

window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    installPrompt = event;
});

startButton.addEventListener('click', () => {
    if (typeof installPrompt == 'undefined')  {
        startForm.submit();
    }
    installPrompt.prompt();
    installPrompt.userChoice.then(() => {
        startForm.submit();
    });
});