@extends('layouts.dashboardLayouts.menu')

@section('title', 'Providers')

@section('content')

    <x-button>
        <x-slot name="type">category</x-slot>
        <x-slot name="add">Agregar categoría</x-slot>
        <x-slot name="list">Listar categorias</x-slot>
    </x-button>

    <div class="contenedor-category-create">
        <div class="create-header">
            <img src="{{ asset('img/icons/datos.png') }}" width="38px" class="providers-create-space">
            <h1 class="p-2">Editar datos de categoría</h1>
        </div>
        {{ $data }}
        <form action="{{ route('category.update', $data) }}" method="post">
            @csrf
            @method('put')

            <div class="contenedor-create-form">

                <div class="create-form-bloque">
                    <label for="name"><b>Nombre categoría</b> </label>
                    <input type="text" id="name" name="name" value="" class="form-control"
                        placeholder="Escriba su nombre" required="true" /><br>
                </div>

            </div>

            <div style="text-align: center; padding-bottom:20px;">
                <input class="btn btn-success boton-create" type="submit" value="Editar" />
            </div>

        </form>

    </div>
@endsection
