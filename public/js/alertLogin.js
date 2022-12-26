$(document).ready(function () {
    $("form #alert-Login").click(function (e) {
        // let variableArray = [
        //     sup_code.value,
        //     document_number.value,
        //     sup_name.value,
        //     sup_street.value,
        // ];
        // e.preventDefault();
        let $form = $(this).closest("form");
        if (
            email.value !== "" &&
            email.value.includes("@") === true &&
            password.value !== ""
        ) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,

                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });
            window.open;
            Toast.fire({
                html: `                
                <h5><img src="img/icons/reloj-de-arena.gif" width="70px"> Loading . . .                
                </h5>        
                `,
                padding: '0em',
                margin: '0em',
            });
        }
        let identificadorTiempoDeEspera;

        (function () {
            identificadorTiempoDeEspera = setTimeout(funcionConRetraso, 2000);
        })();

        function funcionConRetraso() {
            $form.submit();
        }
    });
});
