@extends('layout.noauth')

@section('page.name', 'Login')

@section('style')
  <style>
      .login {
          margin-top: 200px;
      }
  </style>
@endsection

@section('content')
  <div class="container login">
    <div class="row justify-content-md-center">
      <div class="col col-md-4">
        <form method="post" action="{{ route('auth.attempt') }}" id="loginForm">
          @csrf
          <div class="mb-3">
            <label for="email"
                   class="form-label">Email</label>
            <input type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   maxlength="64"
                   placeholder="conta@dominio">
          </div>
          <div class="mb-3">
            <label for="password"
                   class="form-label">Senha</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   placeholder="************">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox"
                   name="remember_token"
                   id="remember_token"
                   class="form-check-input">
            <label for="remember_token"
                   class="form-check-label">Lembrar de mim</label>
          </div>
          <button class="g-recaptcha btn btn-primary"
                  data-sitekey="{{ config('recaptcha.keys.public') }}"
                  data-callback='onSubmit'
                  data-action='submit'>Entrar
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    function onSubmit() {
      document.getElementById('loginForm').submit();
    }
  </script>
@endsection