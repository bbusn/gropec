window.addEventListener('load', function() {
    const deleteAccount = document.querySelector('#delete-account');
    const confirmElement = document.querySelector('.confirm'); 
    const confirmContainer = document.querySelector('.confirm-container');
    deleteAccount.addEventListener('click', (event)=> {
        confirmElement.classList.add('appear02');
        confirmElement.classList.remove('disappear02');
        confirmContainer.classList.add('pop');
        confirmContainer.classList.remove('unpop');
    });
    confirmElement.addEventListener('click', (event)=> {
        if (event.target === confirmElement) {
            confirmContainer.classList.add('unpop');
            confirmContainer.classList.remove('pop');
            confirmElement.classList.add('disappear02');
            confirmElement.classList.remove('appear02');
        }
    });
    document.getElementById('confirm').addEventListener('click', ()=> {
        document.querySelector('.delete-account').submit();
    })
    document.querySelector('#cancel').addEventListener('click', ()=> {
        confirmContainer.classList.add('unpop');
        confirmContainer.classList.remove('pop');
        confirmElement.classList.add('disappear02');
        confirmElement.classList.remove('appear02');
    })
});