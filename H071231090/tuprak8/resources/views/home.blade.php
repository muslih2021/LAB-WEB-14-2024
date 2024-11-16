@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="hero-section">
        <div class="image1">
            <img src="{{ asset('css/images/h2.jpg') }}" alt="" width="auto" height="200" />
        </div>
        <div class="image2">
            <img src="{{ asset('css/images/h1.jpg') }}" alt="" width="300" height="200" />
        </div>
        <div class="container d-flex align-items-start justify-content-between fs-1 text-white flex-column">
            <div>
                <h1 class="text-start">Sebelum Iblis Menjemput</h1>
                <p>Berharap mendapat jawaban atas penyakit sang ayah yang misterius, seorang gadis muda mengunjungi vila tua ayahnya dan menguak fakta masa lalu yang mengerikan.</p>
                <a><x-button url="/about" label="Lebih lanjut" /></a>
            </div>
            
            <div class="stats-container">
                <div class="stat">
                    <h2 class="stats-number">18+</h2>
                    <p class="stats-description">Rating</p>
                </div>
                <div class="stat">
                    <h2 class="stats-number">1.120.891</h2>
                    <p class="stats-description">Penonton</p>
                </div>
            </div>
        </div>
    </section>
@endsection