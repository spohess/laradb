@extends('layouts.app')

@section('page-name', 'Login')

@section('content')
  <div class="row justify-content-md-center mt-5">
    <div class="col col-md-4">
      <div class="card">
        <div class="card-header bg-black">
          <h5 class="text-white">Login</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="email"
                   class="form-label">{{ Str::title(__('blade.auth.email')) }}</label>
            <input type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   placeholder="{{ Str::title(__('blade.auth.email')) }}">
          </div>
          <div class="mb-3">
            <label for="password"
                   class="form-label">{{ Str::title(__('blade.auth.password')) }}</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   placeholder="********">
          </div>
          <button class="btn btn-primary">{{ Str::title(__('blade.form.send')) }}</button>
        </div>
      </div>
    </div>
  </div>
@endsection