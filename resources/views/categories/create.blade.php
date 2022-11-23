@extends('layouts.dashboardLayouts.menu')

@section('title', 'Categories')

@section('content')

    <x-button>
        <x-slot name="type">
            category
        </x-slot>
        <x-slot name="add">
            Agregar categoría
        </x-slot>
        <x-slot name="list">
            Listar categorias
        </x-slot>
    </x-button>

    <div class="contenedor-category-create">

        <div class="create-header">
            <img src="{{ asset('img/icons/datos.png') }}" width="38px">
            <h1 class="p-2">Añadir nueva categoría</h1>
        </div>

        <form method="post" action="{{ route('category.store') }}">
            @csrf
            <div class="contenedor-create-form">
                <div class="create-form-bloque">
                    <label for="cat_name"><b>Nombre de la categoría</b> </label>
                    <input type="text" id="cat_name" name="cat_name" class="form-control values"
                        placeholder="Escriba el nombre de la categoría" required="true" /><br>
                    @error('cat_name')
                        <p>*El campo nombre de la categoría es requerido</p>
                    @enderror

                    <div class="container--category--botones">
                        <input class="btn btn-primary boton-create boton-create-category" type="reset"
                            value="Limpiar" /><br>
                        <input class="btn btn-success boton-create boton-create-category" id="btn-Alert" type="button"
                            value="Guardar" />
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection
