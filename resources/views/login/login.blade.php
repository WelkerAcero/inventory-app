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
                        placeholder="Escriba su contraseña"/>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text--center button--login">
                    <button submit="submit" class="btn btn-success" id="alert-Login">Iniciar sesión</button>
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
