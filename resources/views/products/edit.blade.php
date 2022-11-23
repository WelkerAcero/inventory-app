@extends('layouts.dashboardLayouts.menu')

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
            <h1>Información del producto a editar</h1>
        </div>
        <br>
        <form method="post" action="{{ route('product.update', [$categoryId->id, $productId->id]) }}">
            @csrf
            @method('put')
            <div class="contenedor-create-form">
                <input type="text" name="cat_id" value="{{ $categoryId->id }}" hidden readonly>
                <input type="number" name="prod_id" value="{{ $productId->id }}" hidden readonly>

                <div class="create-form-bloque">

                    <label for="imgUrl"><b> Ingresa la url de la imagen</b></label><br>
                    <input class="form-control" type="text" name="imgUrl" value="{{ old('imgUrl', $obj->imgUrl) }}"
                        placeholder="" /><br>

                    <label for="code"><b>Código producto</b> </label>
                    <input type="text" id="code" name="code" class="form-control"
                        value="{{ old('code', $obj->code) }}" placeholder="Digíta el código del producto" />
                    @error('code')
                        <p style="color:red">* Campo código del producto es requerido</p>
                    @enderror
                    <br>

                    <label for="purchasedPrice"><b>Precio de compra (IVA)</b> </label>
                    <input type="text" id="purchasedPrice" name="purchasedPrice" class="form-control"
                        value="{{ old('purchasedPrice', $obj->purchasedPrice) }}"
                        placeholder="Indica el precio de compra" /><br>
                    @error('purchasedPrice')
                        <p style="color:red">* Campo Precio de compra es requerido</p>
                    @enderror

                    {{-- oculto --}}
                    <input type="text" id="sold" name="sold" class="form-control"
                        value="{{ old('sold', $obj->sold) }}" /><br>
                    {{--  --}}

                    <label for="wholesalePrice"><b>Precio de venta al mayoreo (IVA)</b> </label>
                    <input type="text" id="wholesalePrice" name="wholesalePrice" class="form-control"
                        value="{{ old('wholesalePrice', $obj->wholesalePrice) }}"
                        placeholder="Indica el precio al mayoreo" /><br>

                    <label for="presentation"><b>Selecciona la presentación del producto</b></label>
                    <select id="presentation" name="presentation" class="form-control"
                        value="{{ old('presentation', $obj->presentation) }}">
                        <option selected="true">{{ $obj->presentation }}</option>
                        <option value="Unidad">Unidad</option>
                        <option value="Libra">Libra</option>
                        <option value="Kilogramo">Kilogramo</option>
                        <option value="Caja">Caja</option>
                        <option value="Paquete">Paquete</option>
                        <option value="Lata">Lata</option>
                        <option value="Galon">Galón</option>
                        <option value="Botella">Botella</option>
                        <option value="Tira">Tira</option>
                        <option value="Sobre">Sobre</option>
                        <option value="Bolsa">Bolsa</option>
                        <option value="Saco">Saco</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Otro">Otro</option>
                    </select>

                    <br>

                    
                    <label for="documento"><b>Selecciona el proveedor del producto</b></label>
                    <select id="providerId" name="providerId" class="form-control"
                        value="{{ old('providerId', $obj->providerId) }}">
                        <option selected="true">{{ $providers[$obj->providerId]['name'] }}</option>
                        @forelse ($providers as $key => $item)
                            <?php print($key) ?>
                            @if ($item != null && $item['name'] !== $providers[$obj->providerId]['name'])
                                <option value="{{ $key }}">{{ $item['name'] }}</option>
                            @endif
                        @empty
                        @endforelse
                    </select>
                    @error('providerId')
                        <p style="color:red">* Campo proveedor del producto es requerido</p>
                    @enderror
                    <br>
                </div>

                <div class="create-form-bloque">
                    <label for="prodName"><b>Nombre del producto</b> </label>
                    <input type="text" id="prodName" name="prodName" class="form-control"
                        placeholder="Escriba el nombre del producto" required="true"
                        value="{{ old('prodName', $obj->prodName) }}" /><br>

                    <label for="minStock"><b>Stock mínimo</b> </label>
                    <input type="text" id="minStock" name="minStock" class="form-control"
                        value="{{ old('minStock', $obj->minStock) }}" placeholder="" /><br>
                    @error('minStock')
                        <p style="color:red">* Campo Stock minimo es requerido</p>
                    @enderror

                    <label for="price"><b>Precio de venta Unidad (IVA)</b> </label>
                    <input type="number" id="price" name="price" class="form-control"
                        value="{{ old('price', $obj->price) }}" placeholder="" /><br>
                    @error('price')
                        <p style="color:red">* Campo precio es requerido</p>
                    @enderror

                    <label for="brand"><b>Marca</b> </label>
                    <input type="text" id="brand" name="brand" class="form-control"
                        placeholder="Indique la marca del producto" required="true"
                        value="{{ old('brand', $obj->brand) }}" /><br>

                    <label for="category"><b>Categoría</b></label>
                    <select id="category" name="category" class="form-control">
                        <option selected="{{ $categoryId->id }}">{{ $categoryId->id }}</option>
                        @forelse ($categories as $key => $item)
                            @if ($item !== null && $item !== $categoryId->id)
                                <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                            @endif
                        @empty
                        @endforelse
                    </select>
                    @error('category')
                        <p style="color:red">* Campo categoría del producto es requerido</p>
                    @enderror
                    <br>
                </div>

                <div class="create-form-bloque">
                    <label for="stock"><b>Disponibilidad</b> </label>
                    <input type="text" id="stock" name="stock" class="form-control"
                        value="{{ old('stock', $obj->stock) }}" placeholder="Número de productos disponibles" /><br>
                    @error('stock')
                        <p style="color:red">* Campo disponibilidad es requerido</p>
                    @enderror

                    <label for="maxStock"><b>Stock máximo</b> </label>
                    <input type="number" id="maxStock" name="maxStock" class="form-control"
                        value="{{ old('maxStock', $obj->maxStock) }}" placeholder="" /><br>
                    @error('maxStock')
                        <p style="color:red">* Campo Stock máximo es requerido</p>
                    @enderror

                    <label for="discount"><b>Descuento (%)</b> </label>
                    <input type="text" id="discount" name="discount" class="form-control"
                        value="{{ old('discount', $obj->discount) }}" placeholder="" /><br>

                    <label for="model"><b>Modelo</b> </label>
                    <input type="text" id="model" name="model" class="form-control"
                        placeholder="Escriba el nombre del modelo" required="true"
                        value="{{ old('model', $obj->model) }}" /><br>

                    <label for="state"><b>Estado del producto</b></label>
                    <select id="state" name="state" class="form-control" value="{{ old('state', $obj->state) }}">
                        <option selected="true">
                            @if ($obj->state == 'true')
                                Habilitado
                                <option value="false">Deshabilitado</option>
                            @else
                                Deshabilitado
                                <option value="true">Habilitado</option>
                            @endif
                        </option>
                    </select><br>
                    @error('state')
                        <p style="color:red">* Campo estado del producto es requerido</p>
                    @enderror
                </div>
            </div>

            <div style="text-align: center; padding-bottom:20px;">
                <input class="btn btn-primary boton-create" type="reset" value="Limpiar" />
                <input class="btn btn-success boton-create" type="submit" value="Guardar" />
            </div>
        </form>
    </div>

@endsection
