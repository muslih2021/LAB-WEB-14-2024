@extends('layouts.master')

@section('container')

<section class="contact-section d-flex align-items-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Komentar</h2>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Komentar</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Type your message here"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="card text-white bg-dark h-100" style="max-height: 300px;">
                    <div class="card-body">
                        <div class="col col-md-12 d-flex flex-column text-white gap-2">
                            <h4 class="fw-bold">Hubungi Kami</h4>
                            <p class="m-0 d-flex align-items-center gap-2 text-truncate">
                                <i class="fa-solid fa-envelope"></i>
                                mathzone@gmail.com
                            </p>
                            <p class="m-0 d-flex align-items-center gap-2">
                                <i class="fa-solid fa-phone"></i>
                                1234567890
                            </p>
                            <p class="m-0 d-flex align-items-center gap-2 text-wrap" style="white-space: normal;">
                                <i class="fa-solid fa-location-dot"></i>
                                Jalan Perintis Kemerdekaan VII, Kel. Tamalanrea Indah, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan 90245
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>


@endsection

