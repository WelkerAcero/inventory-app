$(document).ready(function () {
    $("form #btn-Alert").click(function (e) {
        const ATTR_NAMES = [];

        //for each .values as className Get 
        $('.values').each(function () {
            ATTR_NAMES.push($(this).attr("name"));
        });

        const HAS_ATTR_REQUIRED = [];
        ATTR_NAMES.forEach(element => {

            if ($(`#${element}`).attr("required") !== undefined) 
            {
                HAS_ATTR_REQUIRED.push($(`#${element}`).attr("required"));
            }
        });

        const VAL_ATTR_NAMES = [];
        ATTR_NAMES.forEach(element => {
            //Get the element name tag from the array 'nameValue' of the name tag
            const INPUT_VALUE = $(`input[name=${element}`).val(); 

            if (INPUT_VALUE !== '' && INPUT_VALUE !== undefined) 
            {
                VAL_ATTR_NAMES.push(INPUT_VALUE);
            }
        });

        // alert('Revisa el console');
        console.log(ATTR_NAMES);
        console.log(HAS_ATTR_REQUIRED);
        console.log(VAL_ATTR_NAMES);

        let $form = $(this).closest("form");

        if (HAS_ATTR_REQUIRED.length === VAL_ATTR_NAMES.length) {
            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-primary",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "¿Está seguro de guardar el registro?",
                    type: "question",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: "Guardar ",
                    cancelButtonText: "Cancelar ",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) 
                    {
                        swalWithBootstrapButtons.fire(
                            "Registro guardado",
                            "Successful",
                            "success"
                        );
                        $form.submit();

                    } 
                    if (result.dismiss === Swal.DismissReason.cancel) 
                    {
                        swalWithBootstrapButtons.fire(
                            {
                                icon: 'info',
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
