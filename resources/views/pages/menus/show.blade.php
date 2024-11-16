@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Detail Data Menu</h1>
                </div>
                <hr>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Kode </th>
                            <th>:</th>
                            <th>{{ $menus->kode }}</th>
                        </tr>
                        <tr>
                            <th>Nama </th>
                            <th>:</th>
                            <th>{{ $menus->name }}</th>
                        </tr>
                        <tr>
                            <th>Harga </th>
                            <th>:</th>
                            <th>{{ $menus->harga }}</th>
                        </tr>

                    </tbody>
                </table>
                <div>
                    <a href="{{ route('menus.index') }}" class="btn btn-danger">Kembali</a>
                </div>
                <hr>
            </div>
        </div>

    </div>
@endsection
