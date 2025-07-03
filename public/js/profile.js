const avatarWrapper = document.getElementById('avatarWrapper');
const avatarInput = document.getElementById('avatarInput');
const avatarPreview = document.getElementById('avatarPreview');

if (avatarWrapper && avatarInput && avatarPreview) {
    avatarWrapper.addEventListener('click', () => {
        avatarInput.click();
    });

    avatarInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                avatarPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
const tabButtons = document.querySelectorAll(".tab-button");

tabButtons.forEach((button) => {
    button.addEventListener("click", function () {
    // Remove 'active' from all buttons
    tabButtons.forEach((btn) => btn.classList.remove("active"));

    this.classList.add("active");
    });
});
});