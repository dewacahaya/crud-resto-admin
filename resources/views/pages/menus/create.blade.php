@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Tambah Data Menu</h1>
                </div>

                <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <hr>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control mb-2"
                            placeholder="Masukkan Kode Menu">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control mb-2"
                            placeholder="Masukkan Nama Menu">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control mb-2"
                            placeholder="Masukkan Harga Menu">
                        <label for="gambar">Tambah Gambar : </label>
                        <input type="file" name="gambar" id="gambar" accept="image/*">
                    </div>
                    </hr>
                    <div class=" pt-3">
                        <a href="{{ route('menus.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>


            </div>
        </div>

    </div>
@endsection
