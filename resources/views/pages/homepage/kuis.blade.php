@extends('layouts.home')
@section('content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-body">
                        <span class="success-icon text-success mx-auto border border-success rounded-circle">
                            <i class="bx bx-check"></i>
                        </span>

                        <h3 class="text-center mt-5 mb-3">{{$kuis->nama_kuis}}</h3>
                        <h5 class="text-secondary text-center mb-5">
                            {{$kuis->deskripsi}}
                        </h5>

                        <a href="{{route('kuis.soal', [$kuis->id_kuis, $kuis->pertanyaan->first()->id_pertanyaan])}}" class="btn btn-primary mx-auto" style="width: max-content;">Mulai Kuis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
