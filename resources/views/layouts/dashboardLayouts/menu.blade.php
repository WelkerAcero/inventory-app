@extends('layouts.template')

@section('dashboard-header')
    <header class="mb-5">
        @if (Auth::check())
            <nav class="navbar bg-light fixed-top">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">
                        Menú <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="draw">Welcome <strong>{{ session('authenticated') }}</strong>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="button_session me-4">
                        <div>
                            <a class="navbar-brand" href="{{ route('dashboard.index') }}">Inicio
                                <img src="{{ asset('img/icons/asistencia-social.gif') }}" width="25px">
                            </a>
                        </div>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="navbar-brand logout">
                                Cerrar Sesión
                                <img src="{{ asset('img/icons/logout.png') }}" width="25px">
                            </button>

                        </form>
                        
                    </div>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="contenedor--menu__up">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENÚ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="contenedor--menu__user">
                                <img src="{{ asset('img/user.png') }}" width="110px">
                            </div>
                        </div>

                        <div>
                            <div class="contenedor--menu">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 menu-dimension">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{ route('supplier.index') }}"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img
                                                src="{{ asset('img/icons/proveedor.png') }}" width="20px">
                                            Proveedores
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('supplier.create') }}">Agregar
                                                    proveedor</a></li>
                                            <li><a class="dropdown-item" href="{{ route('supplier.index') }}">Lista de
                                                    proveedores</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <img
                                                src="{{ asset('img/icons/category.png') }}" width="20px">
                                            Categorías
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('category.create') }}">Agregar
                                                    categoría</a></li>
                                            <li><a class="dropdown-item" href="{{ route('category.index') }}">Lista de
                                                    categorías</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <img
                                                src="{{ asset('img/icons/product.png') }}" width="20px">
                                            Productos
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('product.create') }}">Agregar
                                                    producto</a></li>
                                            <li><a class="dropdown-item" href="{{ route('product.index') }}">Productos en
                                                    almacén</a></li>

                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <img
                                                src="{{ asset('img/icons/ventas.png') }}" width="20px">
                                            Ventas
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('purchase.create') }}">Agregar
                                                    venta</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('purchase.index') }}">Ventas
                                                    realizadas</a></li>

                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{ asset('img/icons/kardex.png') }}" width="20px">
                                            Kardex
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('kardex.index') }}">Informe de
                                                    kardex</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{ asset('img/icons/customers.png') }}" width="20px">
                                            Clientes
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('customer.create') }}">Agregar
                                                    cliente</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('customer.index') }}">Listar
                                                    clientes</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{ asset('img/icons/config.png') }}" width="20px">
                                            Configuraciones
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('user.index') }}">Administrar
                                                    usuarios</a></li>
                                            <li><a class="dropdown-item" href="#">Datos de la empresa</a></li>
                                            <li><a class="dropdown-item" href="#">Actualizar cuenta</a></li>
                                            <li><a class="dropdown-item" href="#">Estilos dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a class="nav-link" role="button" aria-expanded="false">
                                                <img src="{{ asset('img/icons/cerrar-sesion.png') }}" width="20px">
                                                Cerrar sesión
                                            </a>
                                        </form>
                                    </li>
                                    <div class="menu--logo">
                                        <img src="{{ asset('img/logo.png') }}" width="45px">
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        @else
            <div class="position-relative">
                <div class="position-absolute top-0 end-0">
                    <a href="{{ route('login') }}">Sign in</a>

                    <a href="#">Register</a>
                </div>
            </div>
        @endif
    </header>
@endsection
