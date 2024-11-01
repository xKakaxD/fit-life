
var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");
var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js";
   console.log("Sign-in class applied");
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
    console.log("Sign-up class applied");
})

document.addEventListener('DOMContentLoaded', function () {
    const registerButton = document.getElementById('register-button');
    
    if (registerButton) {
        registerButton.addEventListener('click', function () {
            window.location.href = 'cadastrar-usuario.php'; // Redireciona para a página de cadastro
        });
    }
});
