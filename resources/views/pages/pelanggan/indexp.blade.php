<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resto Web</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-warning opacity-75 px-5">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 fw-bold py-2" href="{{ route('pelanggan.index') }}">Resto Web</a>
        </div>
    </nav>
    {{-- NAVBAR --}}

    {{-- CONTENT --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Menu</h1>

        <div class="row">
            @foreach ($menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($menu->gambar)
                            <img src="{{ Storage::url($menu->gambar) }}" class="card-img-top" alt="{{ $menu->name }}"
                                style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">
                                <strong>Kode:</strong> {{ $menu->kode }} <br>
                                <strong>Harga:</strong> Rp{{ number_format($menu->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- CONTENT --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
