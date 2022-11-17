@extends('layouts.menu')

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
            <h1>Información de la categoría</h1>
        </div>

        <form method="post" action="{{ route('category.store') }}">
            @csrf
            <div class="contenedor-create-form">
                <div class="create-form-bloque">
                    <label for="nombre"><b>Nombre de la categoría</b> </label>
                    <input type="text" id="nombre" name="name" class="form-control"
                        placeholder="Escriba el nombre de la categoría" required="true" /><br>
                    @error('name')
                        <p>*El campo nombre de la categoría es requerido</p>
                    @enderror

                    <div class="container--category--botones">
                        <input class="btn btn-primary boton-create boton-create-category" type="reset"
                            value="Limpiar" /><br>
                        <input class="btn btn-success boton-create boton-create-category" type="submit" value="Guardar" />
                    </div>
                </div>



            </div>

        </form>
    </div>
@endsection
