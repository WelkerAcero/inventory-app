@extends('layouts.template')

@section('title', 'Home')

@section('content')

    <header style="background-color: bisque;">
        <ul style="display:flex; flex-direction:row; justify-content:center;">
            <li class="nav-item dropdown">
                <form action="{{ route('customer.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="nav-link" role="button" aria-expanded="false" type="submit">
                        Cerrar sesión
                    </button>
                </form>
            </li>
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
