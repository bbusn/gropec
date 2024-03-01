window.addEventListener('load', function() {
    const confirmElement = document.querySelector('.confirm'); 
    const confirmContainer = document.querySelector('.confirm-container');
    document.querySelectorAll('.training').forEach((training)=> {
        training.querySelector('.delete-training').addEventListener('click', ()=> {
            confirmContainer.dataset.id = training.dataset.id;
            confirmElement.classList.add('appear02');
            confirmElement.classList.remove('disappear02');
            confirmContainer.classList.add('pop');
            confirmContainer.classList.remove('unpop');
        });
    });
    confirmElement.addEventListener('click', (event)=> {
        if (event.target === confirmElement) {
            confirmContainer.classList.add('unpop');
            confirmContainer.classList.remove('pop');
            confirmElement.classList.add('disappear02');
            confirmElement.classList.remove('appear02');
        }
    });
    document.querySelector('#confirm').addEventListener('click', ()=> {
        document.getElementById(confirmContainer.dataset.id).submit();
    })
    document.querySelector('#cancel').addEventListener('click', ()=> {
        confirmContainer.classList.add('unpop');
        confirmContainer.classList.remove('pop');
        confirmElement.classList.add('disappear02');
        confirmElement.classList.remove('appear02');
    })
});
