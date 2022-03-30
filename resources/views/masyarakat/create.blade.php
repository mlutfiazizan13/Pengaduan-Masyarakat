@extends('layouts.app')
@section('title', 'Create Masyarakat')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Masyarakat</h1>
    </div>

    <div class="section-body">
        <div class="card">
            @include('layouts.alert')
            <form action="{{ route('masyarakat.store') }}" method="POST">
                @csrf
                <div class="card-header">
                <h4>Create Masyarakat</h4>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
