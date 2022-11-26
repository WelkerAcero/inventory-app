@extends('layouts.template')

@section('title', 'login')

@section('content')

    <div class="contenedor">
        <div class="section--izq">
            <h1>Bienvenido!</h1><br>
            <h2>Sistema de gestión de inventario</h2>

            <div class="text--center">
                <img class="text--center" src="img/logo.png" width="50px" style="margin: auto;">
            </div>

            <form action="{{ route('login.validate') }}" method="post">
                @csrf {{-- Cross side request forgery --}}

                <p style="color: red; text-align:center;">{{ $msgErr ?? '' }}</p>

                <div class="mb-3">
                    <img src="img/icons/user.png" alt="user" width="20px">
                    <label for="correo">Usuario: </label><br />
                    <input class="input--login form-control" type="email" id="email" name="email"
                        placeholder="Escriba su correo" />
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <img src="img/icons/pass.png" alt="user" width="20px">
                    <label for="password">Password: </label><br />
                    <input class="input--login form-control" type="password" id="password" name="password"
                        placeholder="Escriba su contraseña" />
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text--center button--login w-100">
                    <button type="button" class="btn btn-success me-3" id="alert-Login">Iniciar sesión</button>

                    {{--   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Registrarse
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="text-align: left;">

                                    @include('login.registerUser')

                                </div>

                            </div>
                        </div>
                    </div> --}}

                </div>

            </form>

            <div class="contenedor--redes">
                <div> <a href="#"><img class="redes" src="img/icons/facebook.png"></a></div>
                <div><a href="#"><img class="redes" src="img/icons/instagram.png"></a></div>
                <div><a href="#"><img class="redes" src="img/icons/linkedin.png"></a></div>
            </div>

        </div>
        <hr style="box-shadow: 1px 2px 2px 1px;">
        <div class="section--der">
            <img class="img--der" src="img/inventario.jpg">
        </div>

    </div>

@endsection

@push('script-suppliers-event')
    <script src="{{ asset('js/form-event-supplier.js') }}"></script>
@endpush
