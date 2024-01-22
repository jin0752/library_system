document.querySelector('.button').addEventListener('click', function() {
    document.querySelector('.modal-cont').style.display = 'flex';
});
document.querySelector('.close').addEventListener('click', function() {
    document.querySelector('.modal-cont').style.display ='none';
});