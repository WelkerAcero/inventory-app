$('document').ready(function () {
    const inputs = $('.values');
    const registerButton = document.getElementById('register');
    const closeModalButton = document.getElementById('close-register-button');
    const modal = document.querySelector('#modalRegister');

    registerButton.addEventListener('click', function (e) {
        inputs.attr('disabled', false);

        closeModalButton.addEventListener('click', function () {
            inputs.attr('disabled', true);
        });

    });

    document.addEventListener('click', function (e) {
        if (e.target.closest("#modalRegister")) {
            inputs.attr('disabled', false);
        } else {
            inputs.attr('disabled', true);
        }
    });

    modal.addEventListener('keydown', function (e) {
        if (e.key === "Escape") {
            inputs.attr('disabled', true);
        }
    });

    modal.addEventListener('keydown', function (e) {
        if (e.key === "Escape") {
            inputs.attr('disabled', true);
        }
    });

});
