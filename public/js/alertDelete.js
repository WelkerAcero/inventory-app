$(document).ready(function () {
    $("form #btn-AlertDelete").click(function (e) {
        let $form = $(this).closest("form");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "¿Desea eliminar el registro?",
                type: "warning",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Eliminar ",
                cancelButtonText: "Cancelar ",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 1700,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    let identificadorTiempoDeEspera;

                    (function () {
                        identificadorTiempoDeEspera = setTimeout(funcionConRetraso, 1700);
                    })();
            
                    async function funcionConRetraso() {
                        $form.submit();
                        
                        await Toast.fire({
                            icon: 'success',
                            title: 'Registro eliminado'
                        });
                    }

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        icon: "info",
                        title: "Cerrando operación!",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const b =
                                Swal.getHtmlContainer().querySelector("b");
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    });
                }
            });
    });
});
