@extends('layouts.admin')
@section('content')
<section class="py-5">
    <div class="container">
        <h4 class="text-dark mb-5">Edit Kuis</h4>

        <div class="card border-0">
            <div class="card-body">
                <form action="{{route('listKuis.update', $kuis->id_kuis)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kuis">Nama Kuis</label>
                        <input type="text" name="nama_kuis" id="nama_kuis" class="form-control" autofocus required value="{{$kuis->nama_kuis}}">
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control" required> {{$kuis->deskripsi}} </textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-save"></i> Simpan Baru
                        </button>
                        <a href="admin-list-kuis.html" class="btn btn-light">
                            <i class="bx bx-left-arrow-alt"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
