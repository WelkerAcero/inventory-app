$(document).ready(function () {
    $("form #btn-Alert").click(function (e) {

        let $form = $(this).closest("form"); // para transformar el button a submit


        //for each .values as className Get 
        const ATTR_NAMES = [];
        $('.values').each(function () {
            ATTR_NAMES.push($(this).attr("name"));
        });

        const TOTAL_ATTR_REQUIRED = [];
        const FIELDS_REQUIRED = [];

        ATTR_NAMES.forEach(element => {

            if ($(`[name=${element}]`).attr("required") !== undefined ) {
                TOTAL_ATTR_REQUIRED.push($(`[name=${element}]`).attr("required"));
                
                let elementVal = $(`[name=${element}]`).val()
                if (elementVal !== "" && elementVal !== undefined) {
                    FIELDS_REQUIRED.push(elementVal);
                }
            }
        });

        console.log(FIELDS_REQUIRED);
        console.log(TOTAL_ATTR_REQUIRED);
        console.log(TOTAL_ATTR_REQUIRED.length, FIELDS_REQUIRED.length);

        if (TOTAL_ATTR_REQUIRED.length === FIELDS_REQUIRED.length) {
            console.log('son equivalentes');
            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success m-2",
                    cancelButton: "btn btn-primary m-2",
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

                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            "Registro guardado",
                            "Successful",
                            "success"
                        );
                        $form.submit();
                    }

                    if (result.dismiss === Swal.DismissReason.cancel) {
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
            console.log('no son equivalentes');
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
