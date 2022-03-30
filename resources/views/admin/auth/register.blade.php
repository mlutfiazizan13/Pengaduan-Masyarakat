@extends('layouts.login')

@section('title', 'Register | Pengaduan Masyarakat')
@section('card-title', 'Register')
@section('content')
<form method="POST" action="{{ route('store-register-petugas') }}" class="needs-validation">
    @csrf
    <div class="form-group">
      <label for="nama">Nama</label>
      <input id="name" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
      <div class="invalid-feedback">
        Please fill in your name
      </div>
    </div>

    <div class="form-group">
      <label for="telp">Telepon</label>
      <input id="telp" type="text" class="form-control" name="telp" tabindex="1" required autofocus>
      <div class="invalid-feedback">
        Please fill in your telp
      </div>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
      <div class="invalid-feedback">
        Please fill in your username
      </div>
    </div>

    <div class="form-group">
      <div class="d-block">
          <label for="password" class="control-label">Password</label>
      </div>
      <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
      <div class="invalid-feedback">
        please fill in your password
      </div>
    </div>


    {{-- <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
        <label class="custom-control-label" for="remember-me">Remember Me</label>
      </div>
    </div> --}}

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        Register
      </button>
    </div>
</form>
<div class="mt-5 text-muted text-center">
    Already have an account? <a href="{{ route('login-petugas') }}">Login</a>
</div>
@endsection