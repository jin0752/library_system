const box = document.querySelector('.squ');
const loglink = document.querySelector('.loglink');
const regislink = document.querySelector('.regislink');

regislink.addEventListener('click', ()=>{
    box.classList.add('active');
});

loglink.addEventListener('click', ()=>{
    box.classList.remove('active');
});

