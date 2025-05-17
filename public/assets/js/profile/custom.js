document.querySelectorAll(".toggle-password").forEach((toggle) => {
    toggle.addEventListener("click", function () {
        const targetId = this.getAttribute("data-target");
        const input = document.getElementById(targetId);
        const icon = this.querySelector("svg");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("feather-eye");
            icon.classList.add("feather-eye-off");
        } else {
            input.type = "password";
            icon.classList.remove("feather-eye-off");
            icon.classList.add("feather-eye");
        }

        feather.replace();
    });
});
