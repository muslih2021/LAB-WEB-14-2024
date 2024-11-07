@extends('layouts.master')

@section('container')

<div class="container">
    <div class="about-box text-center">
        <h1 class="fw-bold mb-4">Tentang Kami</h1>
        <p class="lh-lg mb-5">MathZone adalah platform pembelajaran yang dirancang untuk mempermudah siswa dalam memahami konsep-konsep matematika. Kami menyediakan berbagai materi, latihan soal, dan sumber belajar yang interaktif untuk mendukung proses belajar secara mandiri. Dengan MathZone, kami berkomitmen membantu siswa menjadikan matematika lebih mudah diakses dan dipahami, kapan saja dan di mana saja.</p>
        <img src="https://i.pinimg.com/474x/57/d8/39/57d8398dc09bd15299d2aeda9a73ac34.jpg" alt="">
    </div>
    <div class="services-box">
        <h1 class="fw-bold mb-3">Layanan Kami</h1>
        <p>Kami di MathZone berkomitmen untuk memberikan pengalaman belajar matematika terbaik bagi Anda. Dengan berbagai layanan yang kami sediakan, Anda dapat mempelajari matematika dengan cara yang lebih efektif, interaktif, dan menyenangkan. Berikut adalah layanan yang dapat Anda manfaatkan untuk meningkatkan pemahaman Anda dalam matematika:</p>
        <div class="box pt-4 d-flex gap-3 flex-md-row flex-column">
            <div class="service p-4 shadow bg-primary text-white rounded-4">
                <i class="fa-solid fa-book-open mb-3"></i>
                <h4 class="mb-3 fw-bold">Rangkuman Materi</h4>
                <p class="lh-lg">Layanan rangkuman materi untuk setiap topik, yang dirancang singkat dan jelas untuk membantu pengguna mengulang pelajaran dengan cepat.</p>
            </div>
            <div class="service p-4 shadow bg-primary text-white rounded-4">
                <i class="fa-solid fa-file-pen mb-3"></i>
                <h4 class="mb-3 fw-bold">Latihan Soal Interaktif</h4>
                <p class="lh-lg">Layanan soal latihan interaktif dengan penilaian otomatis, sehingga pengguna bisa menguji pemahaman mereka dan mendapatkan feedback langsung.</p>
            </div>
            <div class="service p-4 shadow bg-primary text-white rounded-4">
                <i class="fa-solid fa-people-group mb-3"></i>
                <h4 class="mb-3 fw-bold">Forum Diskusi</h4>
                <p class="lh-lg">Fasilitas forum bagi pengguna untuk berdiskusi dan bertukar pikiran tentang berbagai topik matematika, bertanya soal, atau berbagi tips.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
</div>
@endsection
