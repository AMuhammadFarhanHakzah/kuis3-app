@extends('layouts.home')
@section('content')
    <div class="container py-5">
        <nav class="d-flex justify-content-center">
            <a href="/" class="logo">
                <img src="assets/images/logo.png" alt="Logo">
                <h4 class="text-dark fw-bold">Quizz</h4>
            </a>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <section class="py-5">
                    @if (auth()->user())
                        <a href="{{ 'logout' }}" class="text-danger"
                            onclick = "event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form action="{{ 'logout' }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    @else
                        <a href="{{'login'}}" class="text-primary">
                            Login
                        </a>
                    @endif
                    <h2 class="text-center fw-bold mb-3">Selamat Datang di Quizz</h2>
                    <p class="text-center text-secondary">
                        tempat yang sempurna bagi para penikmat tantangan dan pencari pengetahuan.
                        <br class="d-none d-md-block"> Dengan berbagai kuis yang menarik dan bervariasi, platform ini
                        menyajikan
                        <br class="d-none d-md-block"> pengalaman kuis online yang interaktif dan mendidik.
                    </p>
                </section>

                <section>
                    <h5 class="mb-0 text-dark fw-bold mb-4">List Kuis</h5>

                    <div class="row g-3">
                        @foreach ($kuis as $k)
                            <div class="col-md-6">
                                <a href="{{route('kuis.kuis', $k->id_kuis)}}" class="card">
                                    <div class="card-body">
                                        <h5 class="text-dark text-center"> {{$k->nama_kuis}} </h5>
                                        <p class="mb-0 text-secondary text-center fs-7">
                                            {{$k->deskripsi}}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
