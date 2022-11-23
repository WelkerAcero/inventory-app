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
            <h1>Datos del proveedor</h1>
        </div>

        {{--         @error('sup_code')
            <x-alert>
                <x-slot name="type">error</x-slot>
                ERROR: {{ $message }}
            </x-alert>
        @enderror --}}

        <form method="post" action="{{ route('supplier.store') }}">
            @csrf

            @include('suppliers.form-fields')

        </form>
    </div>
@endsection

@push('script-suppliers-event')
    <script src="{{ asset('js/form-event-supplier.js') }}"></script>
@endpush
