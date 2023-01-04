@extends('layouts.dashboardLayouts.menu')

@section('title', 'Products')

@section('content')

    <div class="content-responsive">
        <x-button>
            <x-slot name="type">product</x-slot>
            <x-slot name="add">Agregar Producto</x-slot>
            <x-slot name="list">Listar todos los productos</x-slot>
        </x-button>

        <div class="contenedor-provider-create">

            <div class="create-header">
                <img src="{{ asset('img/icons/datos.png') }}" width="38px">
                <h1 class="m-2">Información del producto</h1>
            </div>

            <form method="post" action="{{ route('product.store') }}"{{--  enctype="multipart/formdata" --}}>
                @csrf
                @include('products.form-fields')
            </form>
        </div>
    </div>
@endsection
