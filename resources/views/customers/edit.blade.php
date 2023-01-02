@extends('layouts.dashboardLayouts.menu')

@section('title', 'Customers')

@section('content')

    <div class="btn-rs">
        <x-button>

            <x-slot name="type">customer</x-slot>

            <x-slot name="add">Agregar cliente</x-slot>

            <x-slot name="list">Listar clientes</x-slot>

        </x-button>


        <div class="contenedor-provider-create">
            <div class="create-header">
                <img src="{{ asset('img/icons/datos.png') }}" width="43px" class="providers-create-space">
                <h1>Datos del cliente</h1>
            </div>

            <form action="{{ route('provider.update', $id) }}" method="post">
                @csrf
                @method('put')

                <input type="number" name="id" value="{{ $id }}" readonly hidden>

                <div class="contenedor-create-form">

                    <div class="create-form-bloque">
                        <label for="docType"><b>Tipo de documento</b></label>
                        <select id="docType" name="docType" class="form-control">
                            <option value="{{ $obj->docType }}" selected></option>
                            <option value="Nacional" name="docType">Cédula de ciudadanía</option>
                            <option value="Extranjero" name="docType">Cédula extranjería</option>
                            <option value="Pasaporte" name="docType">Pasaporte</option>
                        </select><br>

                        <label for="documentId"><b>Número de documento</b> </label>
                        <input type="text" class="form-control" name="documentId" value="{{ $obj->documentId }}" /><br>

                        <label for="email"><b>E-mail </b></label>
                        <input type="email" id="email" name="email" value="{{ $obj->email }}" class="form-control"
                            placeholder="Escriba su correo" />
                    </div>

                    <div class="create-form-bloque">
                        <label for="name"><b>Nombre</b> </label>
                        <input type="text" id="name" name="name" value="{{ $obj->name }}" class="form-control"
                            placeholder="Escriba su nombre" required="true" /><br>
                        <label for="address"><b>Dirección</b> </label>
                        <input type="text" id="address" name="address" value="{{ $obj->address }}" class="form-control"
                            placeholder="Escriba su dirección" required="true" /><br>
                        <label for="cellphone"><b>Teléfono</b> </label>
                        <input type="text" id="cellphone" name="cellphone" value="{{ $obj->cellphone }}"
                            class="form-control" placeholder="Escriba su teléfono" required="true" /><br>
                    </div>

                    <input type="text" id="dateEdited" name="dateEdited" readonly hidden
                        value="<?= date('Y-m-d H:i:s') ?>" />

                </div>

                <div style="text-align: center; padding-bottom:20px;">
                    <input class="btn btn-success boton-create" type="submit" value="Editar" />
                </div>

            </form>

        </div>
    </div>
@endsection
