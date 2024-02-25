const passwordInput = document.querySelector('#password');
const passwordIcon = document.querySelector('#iconsPassword');

passwordIcon.addEventListener('click', () => {
    if(passwordInput.type == "password"){
        passwordIcon.classList.add('fa-eye-slash');
        passwordIcon.classList.remove('fa-eye');
        passwordInput.type = "text";
    }else{
        passwordInput.type = "password";
        passwordIcon.classList.add('fa-eye');
        passwordIcon.classList.remove('fa-eye-slash');

    }
});