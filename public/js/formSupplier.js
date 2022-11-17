$('document').ready(function () {
    $('#department-section').hide();

    $('#country_id').on('change', function () {
        let country_id = $(this).val();
        if (country_id) {
            $('#department-section').show();

            $.get(`/country/${country_id}/departments`,
                function (data) {
                    html_select = "<option value=''>Seleccione el departamento</option>";
                    for (let i = 0; i < data.length; i++) {
                        html_select += `<option value="${data[i].id}">${data[i].dep_name}</option>`;
                        $('#department_id').html(html_select);
                    }
                },
            );
        } else {
            $('#department-section').hide();
        }

    })
})