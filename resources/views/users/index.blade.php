@extends('layouts.dashboardLayouts.menu')

@section('title', 'Usuarios')

@section('content')

    <div class="content-responsive">
        <x-button>
            <x-slot name="type">user</x-slot>
            <x-slot name="add">Agregar Usuario</x-slot>
            <x-slot name="list">Listar Usuarios</x-slot>
        </x-button>

        {{-- @dump($instance) --}}


        <h1 class="bg-warning d-flex justify-content-center">{{ $message = isset($message) ? $message : '' }}</h1>

        <div class="user-content container--user">
            @foreach ($users as $data)
                <div class="col-4">
                    <div class="lista_programas pd-2">
                        <h5 class="id p-2 text-center">
                            <b>User</b>
                        </h5>
                        <a href="#" class="user-img" id="user-img">
                            <img id="programa_imagen" class="img-thumbnail"
                                src="https://png.pngtree.com/png-vector/20190710/ourlarge/pngtree-user-vector-avatar-png-image_1541962.jpg" />
                        </a>
                        <p class="empFullname p-1 me-2">
                            <label for="name" class="p-2"><b>Nombre:</b>
                                {{ $data->name }}
                            </label>

                            <label for="lastname" class="p-2"><b>Apellido:</b>
                                {{ $data->lastname }}
                            </label>

                            <label for="cellphone" class="p-2">
                                <b>Teléfono:</b>
                                {{ $data->cellphone }}
                            </label>

                            <label for="document_number" class="p-2"><b>N:</b>
                                {{ $data->document_number }}
                            </label>
                        </p>
                        <hr />
                        <div class="d-md-flex justify-content-md-between p-2">
                            <div class="">
                                <a href="" class="btn btn-success m-2">
                                    <i class="far fa-address-card"></i> Detalles
                                </a>
                            </div>
                            <div class="buttons-edit-delete">
                                <a class="me-3" href="{{ route('user.edit', $data->id) }}">
                                    <abbr title="Editar información" style="cursor: pointer">
                                        <img src="{{ asset('img/icons/editar.png') }}" width="40px">
                                    </abbr>
                                </a>
                                <form method="post" action="{{ route('user.destroy', $data->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a type="button" id="btn-AlertDelete">
                                        <abbr title="Eliminar información" style="cursor: pointer;">
                                            <img src="{{ asset('img/icons/borrar.png') }}" width="40px">
                                        </abbr>
                                    </a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('script-users-event')
    <script src="{{ asset('js/user-event.js') }}"></script>
@endpush
