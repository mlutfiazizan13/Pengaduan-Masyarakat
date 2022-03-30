@extends('layouts.app')
@section('title', 'Data Petugas')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Data Petugas</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
              <h4>Petugas</h4>
            </div> 
            
            @include('layouts.alert')
            <div class="card-body">
                <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3">Create</a>
              <div class="table-responsive">
                <table id="data" class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Telp</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->username }}</td>
                            <td>{{ $d->telp }}</td>
                            <td>{{ $d->role }}</td>
                            <td class="d-flex">
                                <a href="{{ route('petugas.edit', $d->id) }}" class="btn btn-warning mx-2"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('petugas.destroy', $d->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
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