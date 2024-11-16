<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Capybara Go Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-dark border-body" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">
                <img src="{{ URL('images\capybara-go_Logo.png') }}" style="height: 50px;" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    

    <main class="hero-section text-center d-flex align-items-center justify-content-center" style="height: 100vh; background: rgba(111, 180, 226, 0.411) no-repeat center center/cover;">
        @yield('content')
    </main>

    <footer>
        <p>&copy: 2024 CapyBara Go Website</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>