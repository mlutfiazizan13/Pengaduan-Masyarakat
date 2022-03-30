@extends('layouts.app')
@section('title', 'Update Masyarakat')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Masyarakat</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form action="{{ route('masyarakat.update', $data->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-header">
                <h4>Default Validation</h4>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ $data->nik }}" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telp" class="form-control" value="{{ $data->telp }}" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $data->username }}" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="{{ $data['password'] }}" required>
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
