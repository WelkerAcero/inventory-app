>@extends('layouts.dashboardLayouts.menu')

@section('title', 'Products')

@section('content')
    <div class="btn-rs">
        <x-button>
            <x-slot name="type">product</x-slot>
            <x-slot name="add">Agregar Producto</x-slot>
            <x-slot name="list">Listar todos los productos</x-slot>
        </x-button>

        <div class="contenedor-provider-create">

            <div class="create-header">
                <img src="{{ asset('img/icons/datos.png') }}" width="38px">
                <h1>Información del producto a editar</h1>
            </div>
            <br>
            <form method="post" action="{{ route('product.update', $data) }}">
                @csrf
                @method('put')
                @include('products.form-fields')
            </form>
        </div>
    </div>
@endsection
