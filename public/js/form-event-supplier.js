$('document').ready(function () {
    $('#department-section').hide();

    $('#country_id').on('change', async function () {
        let country_id = await $(this).val();
        console.log(country_id);
        if (country_id) {
            $('#department-section').show();

            $.get(`/country/${country_id}/departments`,
                async function (data) {
                    if (data.length > 0) {
                        html_select = "<option value=''>Seleccione el departamento</option>";
                        for (let i = 0; i < data.length; i++) {
                            html_select += `<option value="${data[i].id}">${data[i].dep_name}</option>`;
                            $('#department_id').html(html_select);
                        }
                    }else{
                        html_select = "";
                        $('#department_id').html(html_select);
                    }
                },
            );
        } else {
            $('#department-section').hide();
        }

    })
})