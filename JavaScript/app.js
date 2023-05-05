const password = document.getElementById("password");
const showPassword = document.getElementById("showPassword");

showPassword.addEventListener("click", function() {
    if (password.type === "password") {
        password.setAttribute('type', 'text');
    } else {
        password.setAttribute('type', 'password');
    }
});