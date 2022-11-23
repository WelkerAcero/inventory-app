@extends('layouts.dashboardLayouts.menu')

@section('title', 'Users')

@section('content')
{{-- @dump($instance) --}}
    <div class="user-content d-inline-flex flex-wrap">
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
                        <label for="lastname" class="p-2">
                            {{ $data->lastname }}
                        </label>

                        <label for="lastname" class="p-2"><b>Lastname:</b>
                            {{ $data->lastname }}
                        </label>

                        <label for="lastname" class="p-2">
                            <b>Cellphone:</b>
                            {{ $data->cellphone }}
                        </label>

                        <label for="lastname" class="p-2"><b>Document number:</b>
                            {{ $data->document_number }}
                        </label>
                    </p>
                    <hr />
                    <div class="d-md-flex justify-content-md-between p-2">
                        <div class="">
                            <a href="" class="btn btn-success">
                                <i class="far fa-address-card"></i> Detalles
                            </a>
                        </div>
                        <div class="buttons-edit-delete">
                            <a href="" type="button" class="btn btn-info">
                                Edit
                            </a>
                            <a href="" type="button" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script-users-event')
    <script src="{{asset('js/user-event.js')}}"></script>
@endpush