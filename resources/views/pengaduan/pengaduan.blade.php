@extends('layouts.masyarakat')
@section('title', 'Pengaduan Masyarakat')

@section('content')
    <h2 class="section-title">Pengaduan Masyarakat</h2>
    <div class="card">
        <div class="card-header">
            <h4>Pengaduan Masyarakat</h4>
        </div>
        @include('layouts.alert')
        <div class="card-body">
            <form action="{{ route('pengaduan-masyarakat.store') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ auth()->guard('masyarakat')->user()->nik }}" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tgl_pengaduan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Laporan</label>
                    <textarea type="text" style="height: 200px" name="isi_laporan" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" tabindex="4">
                        Create
                    </button>
                  </div>
            </form>
        </div>
        <div class="card-footer bg-whitesmoke">
            This is card footer
        </div>
    </div>
@endsection