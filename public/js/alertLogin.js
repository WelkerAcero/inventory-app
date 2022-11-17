$(document).ready(function () {
    $("form #alert-Login").click(function (e) {
        let $form = $(this).closest("form");
        // let variableArray = [
        //     sup_code.value,
        //     document_number.value,
        //     sup_name.value,
        //     sup_street.value,
        // ];
        // e.preventDefault();
        if (
            email.value !== "" && email.value.includes("@") === true &&
            password.value !== ""           
        )         
        {                      
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              window.open           
              Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
              })    
                     
        } 
    });
});
