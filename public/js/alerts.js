$(document).ready(function () {
    $("form #btn-Alert").click(function (e) {
        let dataName = [];

        $('.values').each(function () {
            dataName.push($(this).attr("name"));
        });

        hasRequired = [];
        dataName.forEach(element => {
            if ($(`#${element}`).attr("required") !== undefined) {
                hasRequired.push($(`#${element}`).attr("required"));
            }
        });

        nameValues = [];
        dataName.forEach(element => {
            if ($(`input[name=${element}`).val() !== '' && $(`input[name=${element}`).val() !== undefined) {
                nameValues.push($(`input[name=${element}`).val());
            }
        });

        alert('Revisa el console');
        console.log(dataName);
        console.log(hasRequired);
        console.log(nameValues);

        let $form = $(this).closest("form");

        if (hasRequired.length === nameValues.length) {
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
                position: "center",
                icon: "warning",
                title: "Por favor llenar las casillas",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
});
