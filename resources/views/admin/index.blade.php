@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Pengaduan
            
          </div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $menunggu }}</div>
              <div class="card-stats-item-label">Menunggu</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $proses }}</div>
              <div class="card-stats-item-label">Proses</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $selesai }}</div>
              <div class="card-stats-item-label">Selesai</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pengaduan</h4>
          </div>
          <div class="card-body">
            {{ $total }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-chart">
          <canvas id="balance-chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Masyarakat</h4>
          </div>
          <div class="card-body">
            {{ $totalMasyarakat }}
          </div>
        </div>
      </div>
    </div>
    @if (Auth::guard('admin')->user()->role == 'admin')
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-chart">
          <canvas id="sales-chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Petugas</h4>
          </div>
          <div class="card-body">
            {{ $totalPetugas }}
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4>Chart Pengaduan</h4>
        </div>
        <div class="card-body">
          {{-- <canvas id="myChart" height="158"></canvas> --}}
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card gradient-bottom">
        <div class="card-header">
          <h4>Recent Pengaduan</h4>
        </div>
        <div class="card-body" id="top-5-scroll">
          <ul class="list-unstyled list-unstyled-border">
            @foreach ($resentPengaduan as $d)
              <li class="media">
                <div class="media-body">
                  <div class="media-title">{{ $d->Nik->nama }}</div>
                  <div class="mt-1">
                    <p>{{ Str::limit($d->isi_laporan, 100, '...') }}</p>
                  </div>
                </div>
              </li>
            @endforeach
            
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection