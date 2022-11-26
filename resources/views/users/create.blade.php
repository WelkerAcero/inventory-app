@extends('layouts.dashboardLayouts.menu')

@section('title', 'Crear usuario')

@section('content')

    <x-button>
        <x-slot name="type">user</x-slot>
        <x-slot name="add">Agregar Usuario</x-slot>
        <x-slot name="list">Listar Usuarios</x-slot>
    </x-button>

    <div class="contenedor-provider-create">

        <div class="create-header">
            <img src="{{ asset('img/icons/datos.png') }}" width="38px">
            <h1>Datos del usuario</h1>
        </div>
        <br>
        <form method="post" action="{{ route('user.store') }}">
            @csrf
            @include('users.form-fields')
        </form>
    </div>

@endsection

@push('script-suppliers-event')
    <script src="{{ asset('js/form-event-supplier.js') }}"></script>
@endpush
