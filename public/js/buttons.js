/* Jquery */
$(document).ready(function () {
    /* 3er paso */
    /* Verificar si el navegador soporta localStorage */
    if (typeof (localStorage) == 'undefined') {
        alert('Your browser does not support HTML5 localStorage. Try upgrading your browser');
    } else {

        /* Obtener los valores en local storage */
        let buttonSelected = localStorage.getItem("activeButton");
        let id = localStorage.getItem("button");

        /* Si el valor del id tiene class con su mismo nombre */
        if ($(`#${id}`).hasClass(id)) {
            /* Entonces esa reemplezala por el valor de la variable buttonSelected */
            $("." + id).toggleClass(buttonSelected);
        }
    }

    /* 1er paso */
    /* Recorrer mediante un querySelector las a dentro del div con clase .boton-clear */
    let valor = document.querySelectorAll('div > .boton-clear');
    valor.forEach(element => {
        /* Recorre cada elemento y lanza el proceso a una función buttonActive, */
        element.addEventListener('click', buttonActive, false);
    });

});

/* 2do paso */
/* Tiene como paràmetro el objeto de la etiqueta seleccionada e */
function buttonActive(e) {
    /* Establece un localStorage con key=activeButton con valor = provider-boton-active */
    /* El valor equivale al nombre de la clase que tiene los estilos del botòn activo */
    localStorage.setItem('activeButton', 'provider-boton-active');

    /* verifica desde el Id de la etiqueta seleccionada si tiene el valor indicado*/
    if (e.target.id == 'button-add-off') {
        /* Si contiene el valor entonces establece el valor de la localstorage */
        localStorage.setItem('button', e.target.id);
    }

    if (e.target.id == 'button-list-off') {
        localStorage.setItem('button', e.target.id);
    }
}



