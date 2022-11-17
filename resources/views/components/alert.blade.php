{{-- COMPOENNTE CON BOOTSTRAP ALERT --}}

{{-- <div class="alert alert-{{ $type }}" role="alert">
    {{ $slot }}
</div>
--}}

{{-- COMPONENTE CON alertify --}}

{{-- La variable $slot guardará la información que se le pase dentro de las etiquetas de apertura y cierre
    al llamar el botón => <x-alert>  </x-alert> => todo lo que se escriba dentro de estas etiquetas será pasado
    y guardado en la variable.
--}}
@php
    printf('<script>alertify.success("%s");</script>', $slot);
    /* printf('cadena de palabras o script a ejecutar %s => variable especial llenado con el segundo parametro', $slot => llena %s) */
@endphp
