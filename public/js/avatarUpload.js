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