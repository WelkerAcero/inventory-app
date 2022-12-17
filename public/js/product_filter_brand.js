$('document').ready(function () {

    const getData = async (brand) => {
        if (country_id) {
            const response = await fetch(`/product/brand/${brand}`);
            const data = await response.json();
            console.log(data);
            /* return displaySection(data); */
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

    const brand = $('#brand_filter');
    if (brand != undefined) {
        brand.addEventListener('input', async (e) => {
            const BRAND_VAL = await $('#brand_filter').val();
            console.log(BRAND_VAL);
            return getData(COUNTRY_VAL);
        })
    }
});