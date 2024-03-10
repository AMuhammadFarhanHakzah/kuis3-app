@extends('layouts.admin')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="text-dark">Semua Kuis</h4>
                <a href="{{ route('listKuis.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Tambah Baru
                </a>
            </div>

            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kuis</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kuis as $key => $k)
                                    <tr class="align-middle">
                                        <td> {{ ++$key }} </td>
                                        <td> {{ $k->nama_kuis }} </td>
                                        <td> {{ $k->deskripsi }} </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{route('listKuis.show', $k->id_kuis)}}" class="btn btn-sm btn-info text-white">
                                                    <i class="bx bx-file"></i> Pertanyaan
                                                </a>
                                                <a href="{{route('listKuis.edit', $k->id_kuis)}}" class="btn btn-sm btn-warning text-white">
                                                    <i class="bx bx-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('listKuis.destroy', $k->id_kuis) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-light" type="submit" onclick="return confirm('apakah anda yakin ingin menghapus kuis ini?')">
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
@endsection
