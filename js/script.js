const box = document.querySelector('.squ');
const loglink = document.querySelector('.loglink');
const regislink = document.querySelector('.regislink');

regislink.addEventListener('click', ()=>{
    box.classList.add('active');
});

loglink.addEventListener('click', ()=>{
    box.classList.remove('active');
});

document.addEventListener("DOMContentLoaded", function () {
    // Display login error message
    var loginErrorMessage = document.getElementById("login-error-message");
    if (loginErrorMessage && loginErrorMessage.innerText.trim() !== "") {
        loginErrorMessage.style.display = "block";
    }

    // Display registration error message (if any)
    var registrationErrorMessage = document.getElementById("registration-error-message");
    if (registrationErrorMessage && registrationErrorMessage.innerText.trim() !== "") {
        registrationErrorMessage.style.display = "block";
    }
});
