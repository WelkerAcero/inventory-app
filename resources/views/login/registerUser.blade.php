<form method="post" class="row g-3 needs-validation">
    <div>
        <label for="name"><b>Nombre</b> </label>
        <input type="text" id="name" name="name" class="form-control mb-3 values" value="{{ old('name') }}"
            placeholder="Escriba el nombre" required="true" />
        @error('name')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="lastname"><b>Apellido</b> </label>
        <input type="text" id="lastname" name="lastname" class="form-control mb-3 values"
            value="{{ old('lastname') }}" placeholder="Escriba el apellido" required="true" />
        @error('lastname')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="cellphone"><b>Teléfono</b> </label>
        <input type="number" id="cellphone" name="cellphone" class="form-control mb-3 values"
            value="{{ old('cellphone') }}" placeholder="Escriba el teléfono" maxlength="10" />
    </div>

    <div>
        <label for="document_type_id"><b>Tipo de documento</b></label>
        <select id="document_type_id" name="document_type_id" class="form-control mb-3 values"
            value="{{ old('document_type_id') }}">
            <option value="">Seleccione el tipo de documento</option>
            @foreach ($documentType as $item)
                <option value="{{ $item->id }}">{{ $item->doc_name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="documentNumber"><b>Número de documento</b> </label>
        <input type="number" id="documentNumber" name="documentNumber" class="form-control mb-3 values"
            value="{{ old('documentNumber') }}" placeholder="Indique el número de cédula" required="true" />
        @error('documentNumber')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div id="country-section" class="w-100">
        <label for="country_id"><b>Seleccione el pais</b> </label>
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
                <select id="department_id" name="department_id" class="form-control mb-3 values">
                    {{-- Se llena desde JS con JQuery --}}
                </select>

            </div>

            <div class="w-50 m-2">
                <label for="sup_city"><b>Ciudad</b> </label>
                <input type="text" id="sup_city" name="sup_city" class="form-control mb-3 values"
                    value="{{ old('sup_city') }}" placeholder="Escriba la ciudad del proveedor" />
            </div>
        </div>
    </div>

    <div>
        <label for="street"><b>Dirección</b> </label>
        <input type="text" id="street" name="street" class="form-control mb-3 values"
            value="{{ old('street') }}" placeholder="Escriba la dirección" />
    </div>

    <div>
        <label for="email"><b>E-mail </b></label>
        <input type="email" id="email" name="email" class="form-control mb-3 values"
            placeholder="Escriba el correo" value="{{ old('sup_email') }}" required="true" />
        @error('email')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password"><b>Contraseña</b> </label>
        <input type="password" id="password" name="password" class="form-control mb-3 values"
            value="{{ old('password') }}" placeholder="Escriba la contraseña" required="true" />
        @error('password')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div hidden>
        <label for="role_id"><b>Tipo de rol</b></label>
        <select id="role_id" name="role_id" class="form-control mb-3 values" required="true"
            value="{{ old('role_id') }}">
            <option value="">Seleccione el tipo de rol</option>
            @foreach ($roles as $item)
                @if ($item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->rol_name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->rol_name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</form>
