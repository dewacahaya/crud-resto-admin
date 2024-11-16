@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Edit Data Menu</h1>
                </div>

                <form action="{{ route('menus.update', $menus->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" value="{{ old('kode', $menus->kode) }}"
                            class="form-control" placeholder="Masukkan Kode menu">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $menus->name) }}"
                            class="form-control" placeholder="Masukkan Nama menu">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" step="0.01" min="0.01"
                            value="{{ old('harga', $menus->harga) }}" class="form-control"
                            placeholder="Masukkan Harga menu">
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
