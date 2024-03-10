@extends('layouts.home')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <section class="py-5">
                <h4 class="fw-bold">{{$pertanyaan->kuis->nama_kuis}}</h4>
                <p class="text-secondary">
                    {{$pertanyaan->kuis->deskripsi}}
                </p>
            </section>

            <section>
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="text-dark mb-5">{{$pertanyaan->question}}</h5>

                        <form action="{{route('kuis.proses', [$idKuis, $pertanyaan])}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input border-secondary" type="radio" name="answer"
                                        id="a" value="a">
                                    <label class="form-check-label" for="a">
                                        {{$pertanyaan->answer_a}}
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input border-secondary" type="radio" name="answer"
                                        id="b" value="b">
                                    <label class="form-check-label" for="b">
                                        {{$pertanyaan->answer_b}}
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input border-secondary" type="radio" name="answer"
                                        id="c" value="c">
                                    <label class="form-check-label" for="c">
                                        {{$pertanyaan->answer_c}}
                                    </label>
                                </div>
                            </div>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input border-secondary" type="radio" name="answer"
                                        id="d" value="d">
                                    <label class="form-check-label" for="d">
                                        {{$pertanyaan->answer_d}}
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                Selanjutnya
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
