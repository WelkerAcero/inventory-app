@extends('layouts.dashboardLayouts.menu')

@section('title', 'Providers')

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

            <form method="post" action="{{ route('provider.store') }}">
                @csrf

                <div class="contenedor-create-form">
                    <div class="create-form-bloque">
                        <label for="docType"><b>Tipo de documento</b></label>
                        <select id="docType" name="docType" class="form-control" value="{{ old('docType') }}"
                            required="true">
                            <option value="">Seleccione una opción</option>
                            <option value="idNacional">Cédula de ciudadanía</option>
                            <option value="idExtranjero">Cédula extranjería</option>
                            <option value="idPasaporte">Pasaporte</option>
                        </select><br>
                        @error('docType')
                            <p>* El tipo de documento es requerido</p>
                        @enderror

                        <label for="documentId"><b>Número de documento</b> </label>
                        <input type="number" id="documentId" name="documentId" class="form-control" required="true"
                            value="{{ old('documentId') }}" /><br>

                        @error('documentId')
                            <p>* Número de documento es requerido</p>
                        @enderror

                        <label for="email"><b>E-mail </b></label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Escriba su correo" value="{{ old('email') }}" />
                    </div>

                    <div class="create-form-bloque">
                        <label for="name"><b>Nombre</b> </label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Escriba su nombre" required="true" />
                        @error('name')
                            <p>* Nombre es requerido</p>
                        @enderror

                        <br>

                        <label for="address"><b>Dirección</b> </label>
                        <input type="text" id="address" name="address" class="form-control"
                            value="{{ old('address') }}" placeholder="Escriba su dirección" required="true" />
                        <br>

                        <label for="cellphone"><b>Teléfono</b> </label>
                        <input type="number" id="cellphone" name="cellphone" class="form-control"
                            value="{{ old('cellphone') }}" placeholder="Escriba su teléfono" required="true"
                            maxlength="10" />
                        @error('cellphone')
                            <p>* Campo Teléfono es requerido</p>
                        @enderror

                        <input type="text" id="date" name="date" readonly hidden
                            value="<?= date('Y-m-d H:i:s') ?>" />

                        <br>
                    </div>
                </div>

                <div style="text-align: center; padding-bottom:20px;">
                    <input class="btn btn-primary boton-create" type="reset" value="Limpiar" />
                    <input class="btn btn-success boton-create" type="submit" value="Guardar" />
                </div>

            </form>
        </div>
    </div>
@endsection
