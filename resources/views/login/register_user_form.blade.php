@push('script-suppliers-event')
    <script src="{{ asset('js/form-event-supplier.js') }}"></script>
@endpush
<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar cuenta</h1>
                <button type="button" class="btn-close close-register-button" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="text-align: left;">
                <form method="post" action="{{ route('customer.register') }}" class="row g-3 needs-validation">
                    @csrf
                    @include('login.register_user_form')
                </form>
            </div>
        </div>
    </div>
</div>

<div>
    <div>
        <label for="name"><b>Nombre</b> </label>
        <input type="text" id="name" name="name" class="form-control mb-3 values" value="{{ old('name') }}"
            placeholder="Escriba el nombre" required="true" />
        @error('name')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email"><b>E-mail </b></label>
        <input type="email" id="email_login" name="email" class="form-control mb-3 values"
            placeholder="Escriba el correo" value="{{ old('sup_email') }}" required="true" />
        @error('email')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password"><b>Contraseña</b> </label>
        <input type="password" id="password_login" name="password" class="form-control mb-3 values"
            value="{{ old('password') }}" placeholder="Escriba la contraseña" required="true" />
        @error('password')
            <p style="color: red">*{{ $message }}</p>
        @enderror
    </div>

    <div hidden>
        <label for="role_id"><b>Tipo de rol</b></label>
        <input class="form-controlmb-3 values" id="role_id" name="role_id" required="true" value="2" hidden
            readonly>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-register-button" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-Alert">Registrar</button>
    </div>

</div>
