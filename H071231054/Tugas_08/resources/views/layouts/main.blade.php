<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/style.css')}}">
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('partials.navbar')

        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    
        @include('partials.footer')
    </div>

</body>
</html>