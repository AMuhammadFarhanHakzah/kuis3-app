@extends('layouts.admin')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="text-dark">Pertanyaan Kuis</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Tambah Pertanyaan
                </button>
            </div>

            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kuis->pertanyaan as $key => $k)
                                    <tr class="align-middle">
                                        <td> {{++$key}} </td>
                                        <td> {{$k->question}} </td>
                                        <td>
                                            <ol class="ps-3" type="A">
                                                <li class="{{$k->correct == 'a'  ? 'text-success fw-bold' : ''}} "> {{$k->answer_a}} </li>
                                                <li class="{{$k->correct == 'b'  ? 'text-success fw-bold' : ''}} "> {{$k->answer_b}} </li>
                                                <li class="{{$k->correct == 'c'  ? 'text-success fw-bold' : ''}} "> {{$k->answer_c}} </li>
                                                <li class="{{$k->correct == 'd'  ? 'text-success fw-bold' : ''}} "> {{$k->answer_d}} </li>
                                            </ol>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form action="{{route('listPertanyaan.destroy', $k->id_pertanyaan)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-light" type="submit" onclick = "return confirm('apakah anda yakin ingin menghapus soal ini?')">
                                                        <i class="bx bx-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Tambah Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('listPertanyaan.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id_kuis" value={{ $kuis->id_kuis }}>
                            <div class="col-12 mb-3">
                                <label for="question">Pertanyaan</label>
                                <input type="text" name="question" id="question" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="answer_a">Jawaban A</label>
                                <input type="text" name="answer_a" id="answer_a" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="answer_b">Jawaban B</label>
                                <input type="text" name="answer_b" id="answer_b" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="answer_c">Jawaban C</label>
                                <input type="text" name="answer_c" id="answer_c" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="answer_d">Jawaban D</label>
                                <input type="text" name="answer_d" id="answer_d" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="correct">Jawaban Benar</label>
                                <select name="correct" id="correct" class="form-select">
                                    <option value="a">Jawaban A</option>
                                    <option value="b">Jawaban B</option>
                                    <option value="c">Jawaban C</option>
                                    <option value="d">Jawaban D</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-save"></i> Buat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
