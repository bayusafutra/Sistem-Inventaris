var togglePassword = document.getElementById("toggle-password");
var togglePasswordConfirm = document.getElementById("toggle-password-confirm");
var formContent = document.getElementsByClassName("form-content")[0];
var getFormContentHeight = formContent.clientHeight;

var formImage = document.getElementsByClassName("form-image")[0];
if (formImage) {
    var setFormImageHeight = (formImage.style.height =
        getFormContentHeight + "px");
}
if (togglePassword) {
    togglePassword.addEventListener("click", function () {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
}
if (togglePasswordConfirm) {
    togglePasswordConfirm.addEventListener("click", function () {
        const passwordConfirmInput =
            document.getElementById("password-confirm");
        if (passwordConfirmInput.type === "password") {
            passwordConfirmInput.type = "text";
        } else {
            passwordConfirmInput.type = "password";
        }
    });
}
