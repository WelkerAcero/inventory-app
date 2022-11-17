$(document).ready(function () {
    $("form #btn-Alert").click(function (e) {
        let $form = $(this).closest("form");
        // let variableArray = [
        //     sup_code.value,
        //     document_number.value,
        //     sup_name.value,
        //     sup_street.value,
        // ];

        if (
            sup_code.value !== "" &&
            document_number.value !== "" &&
            sup_name.value !== "" &&
            sup_street.value !== ""
        )         
        {
            e.preventDefault();
            
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "¿Está seguro de guardar el proveedor?",                
                    type: "question",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: "Guardar ",
                    cancelButtonText: "Cancelar ",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            "Registro guardado",
                            "Successful",
                            "success"
                        );
                        $form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            {
                                icon: 'error',
                                title: 'Registro cancelado!',                               
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                  Swal.showLoading()
                                  const b = Swal.getHtmlContainer().querySelector('b')
                                  timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                  }, 100)
                                },
                                willClose: () => {
                                  clearInterval(timerInterval)
                                }
                            }
                        );
                    }
                });
        } else {
            Swal.fire({
                position: "top-end",
                icon: "warning",
                title: "Por favor llenar las casillas",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
});
