@extends('layouts.dashboardLayouts.menu')

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
            <h1>Editat datos del proveedor</h1>
        </div>

        <form action="{{ route('supplier.update', $data) }}" method="post">
            @csrf
            @method('put')
            @include('suppliers.form-fields')
        </form>
    </div>

@endsection

@push('script-suppliers-event')
    <script type="text/javascript" src="{{ asset('js/form-event-supplier.js') }}"></script>
@endpush
