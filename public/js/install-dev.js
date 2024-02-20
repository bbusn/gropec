let installPrompt;
window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    installPrompt = event;
});
const fullScreenBtn = document.getElementById('fullscreen-btn');
const element = document.documentElement;

const installButton = document.getElementById('install');
installButton.addEventListener('click', () => {
    if (typeof installPrompt == 'undefined')  {
        let webForm = document.getElementById("web-form");
        webForm.submit();
    }
    installPrompt.prompt();
    installPrompt.userChoice.then((choiceResult) => {
        if (choiceResult.outcome === 'accepted') {
            let installedForm = document.getElementById("installed-form");
            installedForm.submit();
        } else {
            let refusedForm = document.getElementById("refused-form");
            refusedForm.submit();
        }
        installButton.classList.add('disappear');
        installPrompt = null;
    });
});

const webButton = document.getElementById('web');
webButton.addEventListener('click', () => {
    let webForm = document.getElementById("web-form");
    webForm.submit();
});
