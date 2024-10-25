// Toggle between login and register forms
document.addEventListener('DOMContentLoaded', () => {
    const loginSec = document.querySelector('.login-section');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');

    if (registerLink) {
        registerLink.addEventListener('click', (event) => {
            event.preventDefault();
            loginSec.classList.add('active');
        });
    }

    if (loginLink) {
        loginLink.addEventListener('click', (event) => {
            event.preventDefault();
            loginSec.classList.remove('active');
        });
    }});