<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas 8 | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"> --}}
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('components.sidebar')
            <div class="content col-sm min-vh-100 d-flex flex-column p-0" id="fog">
                <div class="flex-grow-1 p-3">
                    @yield('content')
                </div>
                <footer class="bg-light text-center p-2 mt-auto mx-0 w-100">
                    <p class="mb-0">© 2024 Your Company. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
    <script>
        VANTA.FOG({
          el: "#fog",
          mouseControls: true,
          touchControls: true,
          gyroControls: false,
          minHeight: 200.00,
          minWidth: 200.00,
          highlightColor: 0xffffff,
          midtoneColor: 0xdbdbdb,
          lowlightColor: 0xcccccc,
          baseColor: 0xd0d8ff,
          blurFactor: 0.84,
          speed: 1.30,
          zoom: 0.40
        })
    </script>
    @stack('scripts')
</body>
</html>