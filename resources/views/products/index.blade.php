@extends('layouts.dashboardLayouts.menu')

@section('title', 'Products')

@section('content')

    <div class="btn-rs">
        <div>
            <x-button>
                <x-slot name="type">product</x-slot>
                <x-slot name="add">Agregar producto</x-slot>
                <x-slot name="list">Listar todos los productos</x-slot>
            </x-button>
        </div>

        <div class="contenedor--products">
            <div class="button-sections p-2 ms-2">
                <div>
                    <label for="brand_filter">Brand filter
                        <input type="text" class="m-2" id="brand_filter" placeholder="Buscar por marca" value="">
                    </label>
                </div>

                <div class="">
                    <label for="color_filter">Color filter
                        <input type="text" class="m-2" id="color_filter" placeholder="Buscar por color"
                            value="">
                    </label>
                </div>

                <div class="">
                    <label for="price_filter">Price filter
                        <input type="text" class="m-2" id="price_filter" placeholder="Buscar por precio"
                            value="">
                    </label>
                </div>
            </div>
            <div class="section--products">
                {{-- Sección categorías desplegadas --}}
                <div style="width: 25%;">
                    <h2><img src="{{ asset('img/icons/category.png') }}" width="35px">Categorías</h2>
                    <div>
                        @if (!empty($categories))
                            @forelse ($categories as $item)
                                <ul style="list-style: none">
                                    <li>
                                        <a href="{{ route('product.showByCategory', $item->id) }}"
                                            style="text-decoration: none;color:black;">
                                            {{ ucfirst($item->cat_name) }}
                                        </a>
                                    </li>
                                </ul>
                            @empty
                            @endforelse ($categories as $item)
                        @else
                            <p>No hay categorías creadas</p>
                        @endif
                    </div>
                </div>
                {{-- Fin sección categorías desplegadas --}}

                <hr style="border: 2px solid black;margin:15px;">

                <div style="width: 100%;">
                    <h2 style="text-align:center;">PRODUCTOS EN CATEGORÍA
                        @if (isset($onCategoryName))
                            <p class="text-success">"{{ strtoupper($onCategoryName[0]->cat_name) }}"</p>
                        @else
                            <p class="text-success">"TODOS"</p>
                        @endif
                    </h2>

                    @if (!isset($error))
                        @foreach ($products as $item)
                            <div class="container-product">
                                <div
                                    style="display: flex;flex-direction:row;background-color: #D9D9D9; border:1px solid black;">
                                    <div style="background-color: #D9D9D9; margin:auto; padding:10px;">
                                        <img src="{{ $item->pro_img }}" width="200px" height="200px">
                                    </div>

                                    <div style="width: 100%;border-left:1px solid black;">
                                        <h2
                                            style="text-align: center;background-color: white;border-bottom:1px solid black;">
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
                                            <a href="#"><img src="{{ asset('img/icons/detalles.png') }}"
                                                    width="40px"></a>
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
                    @else
                        <h1 class="bg-warning d-flex justify-content-center">{{ $error }}</h1>
                    @endif

                </div>

            </div>

        </div>
    </div>
@endsection
