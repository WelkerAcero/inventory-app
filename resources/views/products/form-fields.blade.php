<div class="contenedor-create-form">

    <div class="create-form-bloque">
        <label for="pro_img"><b> * Ingresa la url de la imagen del item</b></label>
        <textarea class="form-control mb-3 values" name="pro_img" value="{{ old('pro_img', $data->pro_img) }}" cols="30"
            rows="10" required="true" placeholder="Copie y pegue la URL de la imagen"></textarea>
        @error('pro_img')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="pro_code"><b>* Código producto</b> </label>
        <input type="text" class="form-control mb-3 values" id="pro_code" name="pro_code"
            value="{{ old('pro_code', $data->pro_code) }}" placeholder="Establezca el código del producto"
            required="true" />
        @error('pro_code')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="pro_name"><b>* Nombre del producto</b> </label>
        <input type="text" class="form-control mb-3  values" id="pro_name" name="pro_name"
            placeholder="Escriba el nombre del producto" required="true"
            value="{{ old('pro_name', $data->pro_name) }}" />
        @error('pro_name')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="pro_description"><b>Descripción del producto</b> </label>
        <input type="text" class="form-control mb-3 values" id="pro_description" name="pro_description"
            placeholder="Escriba el nombre del producto" value="{{ old('pro_description', $data->pro_description) }}" />

        <label for="pro_presentation"><b>* Presentación del producto</b></label>
        <select class="form-control form-select mb-3 values" id="pro_presentation" name="pro_presentation"
            value="{{ old('pro_presentation', $data->pro_presentation) }}" required="true">
            <option value="">Seleccione una opción</option>
            @foreach ($presentation->name as $item)
                @if ($item == $data->pro_presentation)
                    <option value="{{ $item }}" selected>{{ $item }}</option>
                @else
                    <option value="{{ $item }}">{{ $item }}</option>
                @endif
            @endforeach
        </select>
        @error('pro_presentation')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="supplier_id"><b>* Proveedor del producto</b></label>
        <select class="form-control form-select mb-3 values" id="supplier_id" name="supplier_id"
            value="{{ old('supplier_id', $data->supplier_id) }}" required="true">
            <option value="">Seleccione el proveedor del producto</option>
            @forelse ($suppliers as $item)
                @if ($item->id === $data->supplier_id)
                    <option value="{{ $item->id }}" selected>{{ ucfirst($item->sup_name) }}</option>
                @else
                    <option value="{{ $item->id }}">{{ ucfirst($item->sup_name) }}</option>
                @endif
            @empty
            @endforelse
        </select>
        @error('supplier_id')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div class="create-form-bloque">

        <label for="pro_purchased_price"><b>Precio de compra (IVA)</b> </label>
        <input type="text" class="form-control mb-3 values" id="pro_purchased_price" name="pro_purchased_price"
            value="{{ old('pro_purchased_price', $data->pro_purchased_price) }}"
            placeholder="Indique el precio que costo el item" />

        <label for="pro_cost"><b>* Precio de venta Unidad (IVA)</b> </label>
        <input type="number" class="form-control mb-3 values" id="pro_cost" name="pro_cost"
            value="{{ old('pro_cost', $data->pro_cost) }}" placeholder="Precio de venta del producto"
            required="true" />
        @error('pro_cost')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="pro_wholesale_cost"><b>Precio de venta al mayoreo (IVA)</b> </label>
        <input type="number" class="form-control mb-3 values" id="pro_wholesale_cost" name="pro_wholesale_cost"
            value="{{ old('pro_wholesale', $data->pro_wholesale) }}" placeholder="Precio de venta al mayor" />

        <label for="pro_stock"><b>* Stock actual</b> </label>
        <input type="number" class="form-control mb-3 values" id="pro_stock" name="pro_stock"
            value="{{ old('pro_stock', $data->pro_stock) }}" placeholder="Indique la cantidad actual del item"
            required="true" />
        @error('pro_stock')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="category_id"><b>* Categoría de producto</b></label>
        <select class="form-control form-select mb-3 values" id="category_id" name="category_id"
            value="{{ old('category_id') }}" required="true">
            <option value="">Seleccione la categoría</option>
            @foreach ($categories as $item)
                @if ($item->id === $data->category_id)
                    <option value="{{ $item->id }}" selected>{{ ucfirst($item->cat_name) }}</option>
                @else
                    <option value="{{ $item->id }}">{{ ucfirst($item->cat_name) }}</option>
                @endif
            @endforeach
        </select>
        @error('category_id')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div class="create-form-bloque">
        <label for="pro_min_stock"><b>Stock mínimo</b> </label>
        <input type="number" class="form-control mb-3 values" id="pro_min_stock" name="pro_min_stock"
            value="{{ old('pro_min_stock', $data->pro_min_stock) }}"
            placeholder="Indica el stock minimo del producto" />

        <label for="pro_max_stock"><b>Stock máximo</b> </label>
        <input type="number" class="form-control mb-3 values" id="pro_max_stock" name="pro_max_stock"
            value="{{ old('pro_max_stock', $data->pro_max_stock) }}"
            placeholder="Indique el stock máximo del item" />

        <label for="pro_discount"><b>Descuento del item(%)</b> </label>
        <input type="number" class="form-control mb-3 values" id="pro_discount" name="pro_discount"
            value="{{ old('pro_discount', $data->pro_discount) }}"
            placeholder="Indica el % de descuento en número entero" />

        <label for="pro_brand"><b>Marca</b> </label>
        <input type="text" class="form-control mb-3 values" id="pro_brand" name="pro_brand"
            placeholder="Indique la marca del producto" value="{{ old('pro_brand', $data->pro_brand) }}" />

        <label for="pro_model"><b>Modelo</b> </label>
        <input type="text" class="form-control mb-3 values" id="pro_model" name="pro_model"
            placeholder="Escriba el modelo del item" value="{{ old('pro_model', $data->pro_model) }}" />

        <label for="pro_state"><b>* Estado del producto para públicar</b></label>
        <select class="form-control form-select mb-3 values" id="pro_state" name="pro_state"
            value="{{ old('pro_state', $data->pro_state) }}" required="true">
            @if ($data->pro_state)
                <option value="1" selected>Habilitado para publicar</option>
                <option value="0">Deshabilitado para publicar</option>
            @else
                <option value="0" selected>Deshabilitado para publicar</option>
                <option value="1">Habilitado para publicar</option>
            @endif
        </select>
        @error('pro_state')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>
</div>

<div style="text-align: center; padding-bottom:20px;">
    <input class="btn btn-primary boton-create" type="reset" value="Limpiar" />
    <input class="btn btn-success boton-create" id="btn-Alert" type="button" value="Guardar" />
</div>
