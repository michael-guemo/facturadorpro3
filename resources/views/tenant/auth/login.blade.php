@extends('tenant.layouts.auth')

@section('content')
<section class="auth">
    @include('tenant.auth.partials.side_left')
    <article class="auth__form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="auth__title">Bienvenido a<br>{{ $company->trade_name }}</h1>
            <p>Ingresa a tu cuenta</p>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label for="password">Contraseña</label>
                    <a href="{{ url('password/reset') }}">¿Has olvidado tu contraseña?</a>
                </div>
                <input type="password" name="password" id="password" class="form-control hide-password {{ $errors->has('password') ? 'is-invalid' : '' }}">
                @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
                <button type="button" class="btn btn-eye" id="btnEye">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
            <button type="submit" class="btn btn-signin btn-block">INICIAR SESIÓN</button>
        </form>
    </article>
</section>
    {{-- <section class="body-sign">
                                <div class="checkbox-custom checkbox-default">
                                    <input name="remember" id="RememberMe" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="RememberMe">Recordarme</label>
                                </div>
    </section> --}}
@endsection
@push('scripts')
    <script>
        var inputPassword = document.getElementById('password');
        var btnEye = document.getElementById('btnEye');
        btnEye.addEventListener('click', function () {
            if (inputPassword.classList.contains('hide-password')) {
                inputPassword.type = 'text';
                inputPassword.classList.remove('hide-password');
                btnEye.innerHTML = '<i class="fa fa-eye-slash"></i>'
            } else {
                inputPassword.type = 'password';
                inputPassword.classList.add('hide-password');
                btnEye.innerHTML = '<i class="fa fa-eye"></i>'
            }
        });
    </script>
@endpush
