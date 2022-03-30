@extends('layouts.app')
@section('title', 'Data Pengaduan')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Data Pengaduan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
              <h4>Pengaduan</h4>
            </div> 
            
            @include('layouts.alert')
            <div class="card-body">
                <a href="{{ route('pengaduan.pdf') }}" target="_blank" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
              <div class="table-responsive">
                <table id="data" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            {{-- {{ dd($d->Nik) }} --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nik }}</td>
                            <td>{{ $d->Nik->nama }}</td>
                            <td>{{ $d->Nik->telp }}</td>
                            <td>{{ Str::limit($d->isi_laporan, 100, '...') }}</td>
                            <td><img style="width: 150px" src="{{ asset('/images/pengaduan/'.$d->foto) }}" alt="{{ $d->foto }}"></td>
                            <td class="text-center">
                                @if ($d->status == 'waiting')
                                    <span class="badge bg-primary mb-2 text-dark">Menunggu</span>
                                @endif
                                @if ($d->status == 'proses')
                                    <span class="badge bg-warning mb-2 text-dark">Proses</span>
                                @endif
                                @if ($d->status == 'selesai')
                                    <span class="badge bg-success mb-2 text-dark">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    @if (Auth::guard('admin')->user()->role == 'admin')
                                        <div class="mx-2">
                                            @if ($d->status == 'waiting')
                                            <form action="{{ route('pengaduan.proses', $d->id) }}" method="post">
                                                @csrf
                                                @method("PUT")
                                                <button type="submit" class="btn btn-warning">Proses</button>
                                            </form>
                                            @endif
                                            @if ($d->status == 'proses')
                                                <form action="{{ route('pengaduan.selesai', $d->id) }}" method="post">
                                                    @csrf
                                                    @method("PUT")
                                                    <button type="submit" class="btn btn-success">Selesai</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endif
                                    @if (Auth::guard('admin')->user()->role == 'petugas')
                                        <div class="mx-2">
                                            @if ($d->status == 'waiting')
                                            <form action="{{ route('pengaduan-petugas.proses', $d->id) }}" method="post">
                                                @csrf
                                                @method("PUT")
                                                <button type="submit" class="btn btn-warning">Proses</button>
                                            </form>
                                            @endif
                                            @if ($d->status == 'proses')
                                                <form action="{{ route('pengaduan-petugas.selesai', $d->id) }}" method="post">
                                                    @csrf
                                                    @method("PUT")
                                                    <button type="submit" class="btn btn-success">Selesai</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endif
                                      
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_{{$d->id}}"><i class="fas fa-trash-alt"></i></a>
                                    @if (Auth::guard('admin')->user()->role == 'admin')
                                    <a href="" class="btn btn-primary mx-2"><i class="fas fa-print"></i></a>
                                        
                                    @endif    
                                </div>
                            </td>
                            
                        </tr>
                        @include('pengaduan.modals.delete')
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
    </div>
</section>
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#data').DataTable();
    } );
    </script>
@endsection

@endsection