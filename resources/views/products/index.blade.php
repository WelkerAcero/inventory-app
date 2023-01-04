@extends('layouts.dashboardLayouts.menu')

@section('title', 'Products')

@section('content')

    <div>
        <x-button>
            <x-slot name="type">product</x-slot>
            <x-slot name="add">Agregar producto</x-slot>
            <x-slot name="list">Listar todos los productos</x-slot>
        </x-button>
    </div>

    <div class="contenedor--products">
        <form action="{{ route('product.filter') }}" method="POST">
            @csrf
            <div class="filter-section p-2 ms-2">

                <div>
                    <label for="category_filter"><b>Filtrar por categorías</b></label>
                    <select id="category_filter" class="form-control form-select mb-3" name="category_filter">
                        <option value="">Despliega categorías</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ ucfirst($item->cat_name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="ms-3">
                    <label for="supplier_filter"><b>Código de proveedor</b></label>
                    <select id="supplier_filter" class="form-control form-select mb-3" name="supplier_filter">
                        <option value="">Despliega proveedores</option>
                        @foreach ($supplierCodes as $item)
                            <option value="{{ $item->id }}">{{ $item->sup_name }} - {{ $item->sup_code }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="ms-3">
                    <label for="brand_filter"><b>Filtrar por marca</b></label>
                    <select id="brand_filter" class="form-control form-select mb-3" name="brand_filter">
                        <option value="">Despliega marcas</option>
                        @foreach ($brandList as $item)
                            <option value="{{ $item->pro_brand }}">{{ $item->pro_brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="ms-3">
                    <label for="color_filter"><b>Filtrar por color</b></label>
                    <select id="color_filter" class="form-control form-select mb-3" name="color_filter">
                        <option value="">Despliega colores</option>
                        {{--  @foreach ($colors as $item) --}}
                        <option value="azul">Azul</option>
                        <option value="blanco">Blanco</option>
                        {{--  @endforeach --}}
                    </select>
                </div>

                <div class="ms-3">
                    <label for="price_filter"><b>Filtrar por precios</b></label>
                    <select id="price_filter" class="form-control form-select mb-3" name="price_filter">
                        <option value="">Despliega los precios</option>
                        {{--  @foreach ($colors as $item) --}}
                        <option value="80000">De $0 a $80.000</option>
                        <option value="100000">De $0 a $100.000</option>
                        <option value="150000">De $0 a $150.000</option>
                        <option value="200000">De $0 a $200.000</option>
                        <option value="250000">De $0 a $250.000</option>
                        {{--  @endforeach --}}
                    </select>

                </div>
                <div class="ms-3 mt-4">
                    <button type="submit" class="btn btn-info me-3 mv-5 vh-5">Buscar</button>
                </div>
        </form>
    </div>

    @if (!isset($error))
        <div class="section--products">

            <div style="width: 100%;">
                <h2 style="text-align:center;">PRODUCTOS EN CATEGORÍA
                    @if (isset($cat_name))
                        <p class="text-success">"{{ strtoupper($cat_name[0]->cat_name) }}"</p>
                    @else
                        <p class="text-success">"TODOS"</p>
                    @endif
                </h2>

                @foreach ($products as $item)
                    <div class="container-product">
                        <div style="display: flex;flex-direction:row;background-color: #D9D9D9; border:1px solid black;">
                            <div style="background-color: #D9D9D9; margin:auto; padding:10px;">
                                <img src="{{ $item->pro_img }}" width="200px" height="200px">
                            </div>

                            <div style="width: 100%;border-left:1px solid black;">
                                <h2 style="text-align: center;background-color: white;border-bottom:1px solid black;">
                                    {{ $item->pro_brand }}
                                </h2>
                                <div style="display: flex;flex-direction:row; justify-content:space-evenly;">
                                    <div>
                                        <h3><b>Código: </b><span>{{ $item->pro_code }}</span></h3>
                                        <h3><b>Precio: </b><span> ${{ $item->pro_cost }},00</span></h3>
                                        <h3><b>Disponibilidad: </b><span>{{ $item->pro_stock }}</span></h3>
                                    </div>
                                    <div>
                                        <h3><b>Estado público: </b>
                                            <span>
                                                {{ $item->pro_state ? 'Habilitado' : 'Deshabilitado' }}
                                            </span>
                                        </h3>
                                        <h3><b>Vendidos: </b><span>{{ $item->pro_sold }}</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; justify-content:center;background-color: white;padding:10px">
                            <img src="{{ asset('img/icons/eleccion.png') }}" width="40px">
                            <h3 style="margin-right:15px;">Opciones: </h3>
                            <div class="product-options">

                                <div>
                                    <a href="#"><img src="{{ asset('img/icons/detalles.png') }}" width="40px"></a>
                                </div>

                                <div>
                                    <a href="{{ route('product.edit', $item->id) }}">
                                        <img src="{{ asset('img/icons/editar.png') }}" width="40px">
                                    </a>
                                </div>

                                <div>
                                    <form method="post" action="{{ route('product.destroy', $item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" id="btn-AlertDelete"><img
                                                src="{{ asset('img/icons/borrar.png') }}" width="40px">
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                @endforeach

            </div>

        </div>
    @else
        <h1 class="bg-warning d-flex justify-content-center">{{ $error }}</h1>
    @endif
    </div>

@endsection
