@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="contact__form-div">
                            <label for="name" class="contact__form-tag">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="contact__form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact__form-div">
                            <label for="email" class="contact__form-tag">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="contact__form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="contact__form-div">
                            <label for="cellphone" class="contact__form-tag">Celular</label>

                            <div class="col-md-6">
                                <input id="cellphone" type="text" class="contact__form-input @error('cellphone') is-invalid @enderror" name="cellphone" value="{{ old('cellphone') }}" required autocomplete="cellphone">

                                @error('cellphone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="contact__form-div">
                            <label for="ci" class="contact__form-tag">Ci</label>

                            <div class="col-md-6">
                                <input id="ci" type="text" class="contact__form-input @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci">

                                @error('ci')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact__form-div">
                            <label for="password" class="contact__form-tag">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="contact__form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="contact__form-div">
                            <label for="password-confirm" class="contact__form-tag">Confirmar Password </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="contact__form-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
