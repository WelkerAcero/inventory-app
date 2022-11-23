@extends('layouts.template')

@section('title', 'Home')

@section('content')

<header style="background-color: bisque;">
    <ul style="display:flex; flex-direction:row; justify-content:center;">
        <li style="margin-right: 30px"><a href="{{route('register.form')}}">Registrate</a></li>
        <li style="margin-right: 30px"><a href="{{route('login')}}">Iniciar sesión</a></li>
    </ul>
</header>
    <div class="container">
        <div class="">
            <h1>This is the home <strong class="bg bg-secondary rounded-pill p-2">COMPONENT</strong></h1>
        </div>

        <section>
            <div>
                <h1>Here will be the E-coommerce information</h1>
            </div>
        </section>
    </div>
@endsection

