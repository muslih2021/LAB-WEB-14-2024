<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">FILM</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/">Home</a>
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

    <main>
        @yield('content')
    </main>

    <footer class="footer text-white py-5">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-6 mb-4">
                  <h5 class="text-uppercase mb-4">About Us</h5>
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas quod illo placeat, at autem sunt nesciunt tempore harum, saepe alias quos inventore ipsa? Dolore doloremque dolorem fuga odit autem? </p>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">
                  <h5 class="text-uppercase mb-4">Contact</h5>
                  <ul class="list-unstyled">
                      <li><i class="bi bi-envelope-fill me-2"></i>username@gmail.com</li>
                      <li><i class="bi bi-phone-fill me-2"></i>0190189080129</li>
                      <li><i class="bi bi-instagram me-2"></i>@username</li>
                      <li><i class="bi bi-facebook me-2"></i>Username</li>
                  </ul>
              </div>
              <div class="col-lg-4 col-md-12 mb-2">
                  <h5 class="text-uppercase mb-4">Follow Us</h5>
                  <div class="d-flex">
                      <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-instagram"></i></a>
                      <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-facebook"></i></a>
                      <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-twitter"></i></a>
                  </div>
              </div>
          </div>
          <div class="text-center pt-4">
              <p>&copy; 2024 All right reserved</p>
          </div>
      </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>