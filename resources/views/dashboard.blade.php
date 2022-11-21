@extends('layouts.menu')

@section('title', 'Dashboard')

@section('content')
    <!-- SECCIÓN DASHBOARD - CONTENT -->

    <x-alert>
        <x-slot name="type">success</x-slot>
        Bienvenido al Dashboard {{ session('authenticated') }}
    </x-alert>

    <div class="contenedor--dashboard">
        <a class="contenedor--card" href="{{ route('supplier.index') }}">
            <h1>Proveedores</h1>
            <hr>
            <img src="{{ asset('img/icons/proveedor.png') }}" width="120px">
        </a>
    
        <a class="contenedor--card" href="{{ route('category.index') }}">
            <h1>Categorías</h1>
            <hr>
            <img src="{{asset('img/icons/category.png')}}" width="120px">
        </a>
        <a class="contenedor--card" href="{{ route('product.index') }}">
            <h1>Productos</h1>
            <hr>
            <img src="{{asset('img/icons/product.png')}}" width="120px">
        </a>
        <a class="contenedor--card" href="{{ route('purchase.index') }}">
            <h1>Ventas</h1>
            <hr>
            <img src="{{asset('img/icons/ventas.png')}}" width="120px">
        </a>
        <a class="contenedor--card" href="{{ route('kardex.index') }}">
            <h1>Kardex</h1>
            <hr>
            <img src="{{asset('img/icons/kardex.png')}}" width="120px">
        </a>

        <a class="contenedor--card" href="{{ route('customer.index') }}">
            <h1>Clientes</h1>
            <hr>
            <img src="{{asset('img/icons/customers.png')}}" width="120px">
        </a>
    </div>

@endsection
