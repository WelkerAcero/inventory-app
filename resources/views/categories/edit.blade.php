@extends('layouts.menu')

@section('title', 'Providers')

@section('content')


    <x-button>

        <x-slot name="type">category</x-slot>

        <x-slot name="add">Agregar categoría</x-slot>

        <x-slot name="list">Listar categorias</x-slot>

    </x-button>

    <div class="contenedor-provider-create">
        <div class="create-header">
            <img src="{{ asset('img/icons/datos.png') }}" width="43px" class="providers-create-space">
            <h1>Datos de categoría</h1>
        </div>

        <form action="{{ route('category.update', $id) }}" method="post">
            @csrf
            @method('put')

            <div class="contenedor-create-form">
                <input type="text" name="id" value="{{ $id }}" readonly hidden>

                <div class="create-form-bloque">
                    <label for="name"><b>Nombre categoría</b> </label>
                    <input type="text" id="name" name="name" value="{{ $obj->name }}" class="form-control"
                        placeholder="Escriba su nombre" required="true" /><br>

                        <label for="documento"><b>Estado de la categoría</b></label>
                        <div class="arrow-down-select mb-5">
    
                            <div class="select-options w-100">
                                <select id="documento" name="state" class="form-control">
                                    <option type="text" value="true">Habilitada </option>
                                    <option type="text" value="false">Deshabilitada</option>
                                </select>
                            </div>
    
                            <div class="drop-arrow">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-arrow-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                    <input type="text" id="date" name="editDate" value="<?= date('Y-m-d H:i:s') ?>"
                        class="form-control" readonly hidden required="true" /><br>
                </div>

            </div>

            <div style="text-align: center; padding-bottom:20px;">
                <input class="btn btn-success boton-create" type="submit" value="Editar" />
            </div>

        </form>

    </div>
@endsection
