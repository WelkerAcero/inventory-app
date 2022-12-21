$('document').ready(function () {
    $('#department-section').hide();

    let countryValue = $('#country_id').val();

    const getData = async (country_id) => {
        if (country_id) {
            const response = await fetch(`/country/${country_id}/departments`);
            const data = await response.json();
            console.log(data);
            return displaySection(data);
        }
    }

    const displaySection = async (data) => {
        const getData = await data;
        if (getData.length > 0) {
            $('#department-section').show();

            if ($('#opt').val()) {
                html_select = '';
                for (let i = 0; i < data.length; i++) {
                    if (data[i].id === $('#opt').val()) {
                        console.log('iguales');
                        html_select = `<option value="${data[i].id}" selected>${data[i].dep_name}</option>`;
                    } else {
                        html_select += `<option value="${data[i].id}">${data[i].dep_name}</option>`;
                    }
                    await $('#department_id').html(html_select);
                }

            } else {
                html_select = "<option value=''>Seleccione el departamento</option>";
                for (let i = 0; i < data.length; i++) {
                    html_select += `<option value="${data[i].id}">${data[i].dep_name}</option>`;
                    await $('#department_id').html(html_select);
                }
            }

        }
    }

    const idTag = document.getElementById('country_id');
    if (idTag != undefined) {
        idTag.addEventListener('change', async () => {
            const COUNTRY_VAL = await $('#country_id').val();
            return getData(COUNTRY_VAL);
        })
    }

    getData(countryValue);
});
