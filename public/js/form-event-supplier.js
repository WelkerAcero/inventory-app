$('document').ready(function () {
    $('#department-section').hide();

    let countryValue = $('#country_id').val();

    const getData = async (country_id) => {
        if (country_id) {
            return fetch(`/country/${country_id}/departments`)
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    return displaySection(data);
                });
        }
    }

    const displaySection = async (data) => {
        const getData = await data;
        if (getData.length > 0) {
            $('#department-section').show();
            html_select = "<option value=''>Seleccione el departamento</option>";
            for (let i = 0; i < data.length; i++) {
                html_select += `<option value="${data[i].id}">${data[i].dep_name}</option>`;
                await $('#department_id').html(html_select);
            }
        } else {
            html_select = '';
            html_select += `<option value="null">No hay departamento o estado</option>`;
            await $('#department_id').html(html_select);
        }
    }

    const idTag = document.getElementById('country_id');
    if (idTag != undefined) {
        idTag.addEventListener('change', () => {
            const COUNTRY_VAL = $('#country_id').val();
            getData(COUNTRY_VAL);
        })
    }
    getData(countryValue);
});
