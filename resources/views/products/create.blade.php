@extends('layouts.menu')

@section('title', 'Products')

@section('content')
    <x-button>

        <x-slot name="type">product</x-slot>

        <x-slot name="add">Agregar Producto</x-slot>

        <x-slot name="list">Listar todos los productos</x-slot>

    </x-button>

    <div class="contenedor-provider-create">

        <div class="create-header">
            <img src="{{ asset('img/icons/datos.png') }}" width="38px">
            <h1>Información del producto</h1>
        </div>
        <br>
        <form method="post" action="{{ route('product.store') }}"{{--  enctype="multipart/formdata" --}}>
            @csrf
            <div class="contenedor-create-form">

                <div class="create-form-bloque">

                    <label for="imgUrl"><b> Ingresa la url de la imagen</b></label><br>
                    <input class="form-control" type="text" name="imgUrl" value="{{ old('imgUrl') }}"
                        placeholder=""required="true" /><br>
                    @error('imgUrl')
                        <p>*El Campo imagen del producto es obligatorio*</p>
                    @enderror


                    <label for="code"><b>Código producto</b> </label>
                    <input type="text" id="code" name="code" class="form-control" value="{{ old('code') }}"
                        placeholder="" required="true" /><br>
                    @error('code')
                        <p>*El Campo Código del producto es obligatorio*</p>
                    @enderror

                    <label for="purchasedPrice"><b>Precio de compra (IVA)</b> </label>
                    <input type="text" id="purchasedPrice" name="purchasedPrice" class="form-control"
                        value="{{ old('purchasedPrice') }}" placeholder="Indique el precio de compra" required="true" /><br>
                    @error('purchasedPrice')
                        <p>*El Campo precio de compra es obligatorio*</p>
                    @enderror

                    {{-- Oculto por ahora hasta tener el módulo Ventas --}}
                    <input type="text" id="sold" name="sold" class="form-control" value="0" readonly
                        hidden /><br>
                    {{--  --}}
                    <label for="wholesalePrice"><b>Precio de venta al mayoreo (IVA)</b> </label>
                    <input type="text" id="wholesalePrice" name="wholesalePrice" class="form-control"
                        value="{{ old('wholesalePrice') }}" placeholder="" required="true" /><br>
                    @error('wholesalePrice')
                        <p>*El Campo precio de venta al mayoreo es obligatorio*</p>
                    @enderror

                    <label for="presentation"><b>Presentación del producto</b></label>
                    <select id="presentation" name="presentation" class="form-control" value="{{ old('presentation') }}"
                        required="true">
                        <option value="">Seleccione una opción</option>
                        <option value="unidad">Unidad</option>
                        <option value="libra">Libra</option>
                        <option value="kilogramo">Kilogramo</option>
                        <option value="caja">Caja</option>
                        <option value="paquete">Paquete</option>
                        <option value="lata">Lata</option>
                        <option value="galon">Galón</option>
                        <option value="botella">Botella</option>
                        <option value="tira">Tira</option>
                        <option value="sobre">Sobre</option>
                        <option value="bolsa">Bolsa</option>
                        <option value="saco">Saco</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="otro">Otro</option>
                    </select>
                    @error('presentation')
                        <p>*El Campo presentation del producto es obligatorio*</p>
                    @enderror
                    <br>

                    <label for="documento"><b>Proveedor del producto</b></label>
                    <select id="providerId" name="providerId" class="form-control" value="{{ old('providerId') }}"
                        required="true">
                        <option value="">Seleccione el proveedor del producto</option>
                        @forelse ($providers as $key => $item)
                            @if ($key !== 'error')
                                <option value="{{ $key }}">{{ $item['name'] }}</option>
                            @else
                                <option>{{ ucfirst($item) }}</option>
                            @endif
                        @empty
                        @endforelse
                    </select>
                    @error('providerId')
                        <p>*El Campo proveedor del producto es obligatorio*</p>
                    @enderror
                    <br>
                </div>

                <div class="create-form-bloque">
                    <label for="prodName"><b>Nombre del producto</b> </label>
                    <input type="text" id="prodName" name="prodName" class="form-control"
                        placeholder="Escriba el nombre del producto" required="true" value="{{ old('prodName') }}" /><br>
                    @error('prodName')
                        <p>*El campo nombre del producto es requerido*</p>
                    @enderror

                    <label for="minStock"><b>Stock mínimo</b> </label>
                    <input type="number" id="minStock" name="minStock" class="form-control"
                        value="{{ old('minStock', 0) }}" placeholder="Indica el stock minimo del producto" /><br>

                    <label for="price"><b>Precio de venta Unidad (IVA)</b> </label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}"
                        placeholder="" required="true" /><br>
                    @error('price')
                        <p>*El campo precio del producto es requerido*</p>
                    @enderror

                    <label for="brand"><b>Marca</b> </label>
                    <input type="text" id="brand" name="brand" class="form-control"
                        placeholder="Indique la marca del producto" value="{{ old('brand') }}" required="true" /><br>
                    @error('brand')
                        <p>*El campo marca del producto es requerido*</p>
                    @enderror

                    <label for="category"><b>Categoría</b></label>
                    <select id="category" name="category" class="form-control" value="{{ old('category') }}"
                        required="true">
                        <option value="">Seleccione una opción</option>
                        @foreach ($categories as $key => $item)
                            @if ($key !== 'error')
                                <option value="{{ $key }}">{{ ucfirst($item['name']) }}</option>
                            @else
                                <option>{{ ucfirst($item) }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category')
                        <p>*El campo categoría del producto es requerido*</p>
                    @enderror
                    <br>
                </div>

                <div class="create-form-bloque">
                    <label for="stock"><b>Stock actual</b> </label>
                    <input type="text" id="stock" name="stock" class="form-control"
                        value="{{ old('stock') }}" placeholder="" required="true" /><br>
                    @error('stock')
                        <p>*El campo disponibilidad del producto es requerido*</p>
                    @enderror

                    <label for="maxStock"><b>Stock máximo</b> </label>
                    <input type="number" id="maxStock" name="maxStock" class="form-control"
                        value="{{ old('maxStock', 0) }}" placeholder="" /><br>

                    <label for="discount"><b>Descuento (%)</b> </label>
                    <input type="number" id="discount" name="discount" class="form-control"
                        value="{{ old('discount', 0) }}" placeholder="" required="true" /><br>

                    <label for="model"><b>Modelo</b> </label>
                    <input type="text" id="model" name="model" class="form-control"
                        placeholder="Escriba el nombre del modelo" value="{{ old('model', 'N/A') }}" /><br>

                    <label for="state"><b>Estado del producto</b></label>
                    <select id="state" name="state" class="form-control" value="{{ old('state') }}"
                        required="true">
                        <option value="">Seleccione una opción</option>
                        <option value="True">Habilitado</option>
                        <option value="False">Deshabilitado</option>
                    </select>
                    @error('state')
                        <p>* El campo stado del producto es requerido *</p>
                    @enderror
                    <br>
                </div>
            </div>

            <div style="text-align: center; padding-bottom:20px;">
                <input class="btn btn-primary boton-create" type="reset" value="Limpiar" />
                <input class="btn btn-success boton-create" type="submit" value="Guardar" />
            </div>
        </form>
    </div>

@endsection
