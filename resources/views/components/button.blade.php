<div class="contenedor--providers ">

    <div style="margin: 20px 0px">
        <a href='{{ route("$type.create") }}' id="button-add-off" class="boton-clear button-add-off">
            <img src="{{ asset('img/icons/add.png') }}" width="35px">
            {{ $add }}
        </a>
    </div>

    <div style="margin: 20px 1%">
        <a href='{{ route("$type.index") }}' id="button-list-off" class="boton-clear button-list-off">
            <img src="{{ asset('img/icons/lista.png') }}" width="35px">
            {{ $list }}
        </a>
    </div>

</div>
