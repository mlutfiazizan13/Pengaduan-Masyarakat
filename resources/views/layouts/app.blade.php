<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.head')
  <title> 
    @hasSection ('title')
      @yield('title')
    @endif
     | Pengaduan Masyarakat
  </title>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('layouts.navbar')
      </nav>
      @include('layouts.sidebar')      

      <!-- Main Content -->
      <div class="main-content">
          @yield('content')
      </div>
      {{-- <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer> --}}
    </div>
  </div>

  @include('layouts.script')
</body>
</html>
