@extends('layouts.master')

@section('title', 'About')

@section('content')
    <div class="about-cotainer">
        <div class="container">
            <section class="about">
                <div class="about-image">
                    <img src="{{ asset('css/images/a1.jpg') }}" alt="">
                </div>
                <div class="about-content">
                    <h2>Sebelum Iblis Menjemput</h2>
                    <p>Dengan bantuan seorang Dukun misterius (Ruth Marini), Lesmana (Ray Sahetapy) membuat perjanjian dengan Iblis, bahwa ia akan mendapatkan kesuksesan sebagai seorang pengusaha, dengan menumbalkan istrinya (Kinaryosih). Setelah melakukan perjanjian, Lesmana pun segera meninggalkan istri serta putrinya yang masih kecil, Alvi (Nicole Rossi). Istri Lesmana yang sudah ditumbalkan pun bunuh diri dengan misterius, yang disaksikan oleh Alvi dan meninggalkan luka misterius di lengannya. Bertahun-tahun kemudian, Alvi yang sudah dewasa (Chelsea Islan) tumbuh menjadi wanita muda yang mandiri nan dingin, lantaran kehidupan keras yang dijalaninya seorang diri. Alvi pun mendapatkan kabar bahwa Lesmana sedang sekarat di rumah sakit karena penyakit misterius, dan disanalah ia bertemu dengan anak-anak Lesmana yang lain: Maia (Pevita Pearce), Reuben (Samo Rafael) serta Nara (Hadijah Shahab) yang masih kecil, dari istri keduanya Laksmi (Karina Suwandi). Alvi bersikap dingin pada keluarga tirinya tersebut, tetapi saat ia ditinggal berdua dengan Lesmana dalam kamar, sesosok makhluk misterius menerornya.</p>
                    <a><x-button url="/contact" label="Contact Us" /></a>
                </div>
            </section>
        </div>
    </div>
   
@endsection