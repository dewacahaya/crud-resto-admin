@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        @if (session('created'))
            <div class="alert alert-success" role="alert">
                {{ session('created') }}
            </div>
        @endif
        @if (session('updated'))
            <div class="alert alert-warning" role="alert">
                {{ session('updated') }}
            </div>
        @endif
        @if (session('deleted'))
            <div class="alert alert-danger" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between py-3">
                    <h1 class="">Halaman Data Barang</h1>

                    <div>
                        <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Barang</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped mt-1">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $i => $d)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $d->kode }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->harga }}</td>
                                <td class="text-center">
                                    <a href="{{ route('menus.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('menus.show', $d->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="hapusData(`btndelete{{ $d->id }}`)">Hapus</button>
                                    <form action="{{ route('menus.destroy', $d->id) }}" method="POST"
                                        style="display: none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="btndelete{{ $d->id }}"></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                <hr>
                {{ $menus->links() }}
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        function hapusData(id) {
            Swal.fire({
                title: "Yakin hapus data ini?",
                text: "Data yang dihapus tidak bisa dipulihkan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).click();
                }
            });
        }
    </script>
@endpush
