@extends('layouts.menu')

@section('title', 'Providers')

@section('content')

    <x-button>
        <x-slot name="type">supplier</x-slot>
        <x-slot name="add">Agregar Proveedor</x-slot>
        <x-slot name="list">Listar Proveedores</x-slot>
    </x-button>

    <div class="contenedor-provider-create">

        <div class="create-header">
            <img src="{{ asset('img/icons/datos.png') }}" width="43px" class="providers-create-space">
            <h1>Datos del proveedor</h1>
        </div>

        <form method="post" action="{{ route('supplier.store') }}">
            @csrf

            <div class="contenedor-create-form">
                <div class="create-form-bloque">
                    <label for="sup_code"><b>Código del proveedor</b></label>
                    <input type="text" id="sup_code" name="sup_code" class="form-control mb-3 values" required="true"
                        value="{{ old('sup_code') }}" placeholder="Escriba el código identificador del proveedor" />
                    @error('sup_code')
                        <p>*{{ $message }}</p>
                    @enderror

                    <label for="document_type_id"><b>Tipo de documento</b></label>
                    <select id="document_type_id" name="document_type_id" class="form-control mb-3 values"
                        value="{{ old('document_type_id') }}">
                        <option value="">Seleccione el tipo de documento</option>
                        @foreach ($documentType as $item)
                            <option value="{{ $item->id }}">{{ $item->doc_name }}</option>
                        @endforeach
                    </select>

                    <label for="document_number"><b>Número de documento</b> </label>
                    <input type="number" id="document_number" name="document_number" class="form-control mb-3 values"
                        value="{{ old('document_number') }}"
                        placeholder="Indique el número de cédula del proveedor" />

                    <label for="sup_email"><b>E-mail </b></label>
                    <input type="email" id="sup_email" name="sup_email" class="form-control mb-3 values"
                        placeholder="Escriba el correo del proveedor" value="{{ old('sup_email') }}" />

                    <label for="sup_cellphone"><b>Teléfono</b> </label>
                    <input type="number" id="sup_cellphone" name="sup_cellphone" class="form-control mb-3 values"
                        value="{{ old('sup_cellphone') }}" placeholder="Escriba el teléfono del proveedor"
                        maxlength="10" />
                </div>

                <div class="create-form-bloque">
                    <label for="sup_name"><b>Nombre</b> </label>
                    <input type="text" id="sup_name" name="sup_name" class="form-control mb-3 values"
                        value="{{ old('sup_name') }}" placeholder="Escriba el nombre del proveedor" required="true" />
                    @error('sup_name')
                        <p>* {{ $message }}</p>
                    @enderror

                    <label for="sup_lastname"><b>Apellido</b> </label>
                    <input type="text" id="sup_lastname" name="sup_lastname" class="form-control mb-3 values"
                        value="{{ old('sup_lastname') }}" placeholder="Escriba el apellido del proveedor" />

                    <div id="country-section" class="w-100">
                        <label for="country_id"><b>Seleccione el pais del proveedor</b> </label>
                        <select id="country_id" class="form-control mb-3 w-50 values" required="true">
                            <option value="">Click para seleccionar el pais</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->cou_name }}</option>
                            @endforeach
                        </select>

                        <div id="department-section" class="department-section w-100">
                            <div class="w-50  m-2">
                                <label for="department_id"><b>Seleccione el departamento</b> </label>
                                <select id="department_id" name="department_id" class="form-control mb-3 values" required="true">
                                    {{-- Se llena desde JS con JQuery --}}
                                </select>
                                @error('department_id')
                                    <p>* {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-50 m-2">
                                <label for="sup_city"><b>Ciudad del proveedor</b> </label>
                                <input type="text" id="sup_city" name="sup_city" class="form-control mb-3 values"
                                    value="{{ old('sup_city') }}" placeholder="Escriba la ciudad del proveedor"
                                    required="true" />
                                @error('sup_city')
                                    <p>* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <label for="sup_street"><b>Dirección</b> </label>
                    <input type="text" id="sup_street" name="sup_street" class="form-control mb-3 values"
                        value="{{ old('sup_street') }}"
                        placeholder="Escriba la dirección, calle o el nro del local del proveedor" required="true" />
                    @error('sup_street')
                        <p>* {{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div style="text-align: center; padding-bottom:20px;">
                <input class="btn btn-primary boton-create" type="reset" value="Limpiar" />
                <input class="btn btn-success boton-create" id="btn-Alert" type="submit" value="Guardar" />
            </div>

        </form>
    </div>
@endsection

@push('script-event-supplier')
    <script type="text/javascript" src="{{ asset('js/form-event-supplier.js') }}"></script>
@endpush
