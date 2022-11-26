<div class="contenedor-create-form">
    <div class="create-form-bloque">
        <label for="name"><b>Nombre</b> </label>
        <input type="text" id="name" name="name" class="form-control mb-3 values"
            value="{{ old('name', $data->name) }}" placeholder="Escriba el nombre del usuario" required="true" />
        @error('name')
            <p style="color: red">*{{ $message }}</p>
        @enderror

        <label for="lastname"><b>Apellido</b> </label>
        <input type="text" id="lastname" name="lastname" class="form-control mb-3 values"
            value="{{ old('lastname', $data->lastname) }}" placeholder="Escriba el apellido del usuario"
            required="true" />
        @error('lastname')
            <p style="color: red">*{{ $message }}</p>
        @enderror

        <label for="cellphone"><b>Teléfono</b> </label>
        <input type="number" id="cellphone" name="cellphone" class="form-control mb-3 values"
            value="{{ old('cellphone', $data->cellphone) }}" placeholder="Escriba el teléfono del usuario"
            maxlength="10" />

        <label for="document_type_id"><b>Tipo de documento</b></label>
        <select id="document_type_id" name="document_type_id" class="form-control mb-3 values" required="true"
            value="{{ old('document_type_id', $data->document_type_id) }}">
            <option value="">Seleccione el tipo de documento</option>
            @foreach ($documentType as $item)
                @if ($item->id === $data->document_type_id)
                    <option value="{{ $item->id }}" selected>{{ $item->doc_name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->doc_name }}</option>
                @endif
            @endforeach
        </select>

        <label for="document_number"><b>Número de documento</b> </label>
        <input type="number" id="document_number" name="document_number" class="form-control mb-3 values"
            required="true" value="{{ old('document_number', $data->document_number) }}"
            placeholder="Indique el número de cédula del proveedor" />

        <label for="role_id"><b>Tipo de rol</b></label>
        <select id="role_id" name="role_id" class="form-control mb-3 values" required="true"
            value="{{ old('role_id', $data->role_id) }}">
            <option value="">Seleccione el tipo de rol</option>
            @foreach ($roles as $item)
                @if ($item->id === $data->role_id)
                    <option value="{{ $item->id }}" selected>{{ $item->rol_name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->rol_name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="create-form-bloque">

        <div id="country-section" class="w-100">
            <label for="country_id"><b>Seleccione el pais del usuario</b> </label>
            <select id="country_id" class="form-control mb-3 w-50 values" required="true">
                <option value="">Click para seleccionar el pais</option>
                @foreach ($countries as $item)
                    @if (isset($defaultCountry[0]->id))
                        @if ($item->id === $defaultCountry[0]->id)
                            <option value="{{ $item->id }}" selected>{{ $item->cou_name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->cou_name }}</option>
                        @endif
                    @else
                        <option value="{{ $item->id }}">{{ $item->cou_name }}</option>
                    @endif
                @endforeach
            </select>

            <div id="department-section" class="department-section w-100">
                <div class="w-50  m-2">
                    <label for="department_id"><b>Seleccione el departamento</b> </label>
                    <select id="department_id" name="department_id" class="form-control mb-3 values" required="true">
                        {{-- Se llena desde JS con JQuery --}}
                    </select>
                    @error('department_id')
                        <p style="color: red">*{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-50 m-2">
                    <label for="city"><b>Ciudad del usuario</b> </label>
                    <input type="text" id="city" name="city" class="form-control mb-3 values"
                        value="{{ old('city', $data->city) }}" placeholder="Escriba la ciudad del usuario" />
                    @error('city')
                        <p style="color: red">*{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <label for="street"><b>Dirección</b> </label>
        <input type="text" id="street" name="street" class="form-control mb-3 values"
            value="{{ old('street', $data->street) }}"
            placeholder="Escriba la dirección, calle o el nro del local del usuario" />
        @error('street')
            <p style="color: red">*{{ $message }}</p>
        @enderror

        <label for="email"><b>E-mail </b></label>
        <input type="email" id="email" name="email" class="form-control mb-3 values" required="true"
            placeholder="Escriba el correo del usuario" value="{{ old('email', $data->email) }}" />
        @error('email')
            <p style="color: red">*{{ $message }}</p>
        @enderror

        <label for="password"><b>Contraseña </b></label>
        <input type="password" id="password" name="password" class="form-control mb-3 values" required="true"
            placeholder="Escriba una contraseña" value="{{ old('password', $data->password) }}" />
        @error('password')
            <p style="color: red">*{{ $message }}</p>
        @enderror

    </div>
</div>

<div style="text-align: center; padding-bottom:20px;">
    <input class="btn btn-primary boton-create" type="reset" value="Limpiar" />
    <input class="btn btn-success boton-create" id="btn-Alert" type="button" value="Guardar" />
</div>
