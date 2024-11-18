<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JWR Restaurant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/4c/ba/a5/outdoor.jpg?w=1200&h=-1&s=1') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            height: 100vh;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Konten utama */
        .content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            top: 50%;
            transform: translateY(-50%);
        }

        .navbar {
            z-index: 3;
            position: relative;
        }
    </style>
</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-warning px-5">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Brand -->
            <a class="navbar-brand fs-2 fw-bold py-2" href="/">JWR Restaurant</a>

            <!-- Toggler Button (Responsive) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse px-3" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3" href="{{ route('pelanggan.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3" href="{{ route('home.contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- NAVBAR --}}

    {{-- CONTENT --}}
    <div class="overlay"></div>

    <div class="container mt-5">
        <h1 class="text-center mb-2 text-white content">Daftar Menu</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                        <form action="{{ route('orders.store') }}" method="POST" class="p-3">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="hidden" name="menu_price" value="{{ $menu->harga }}">
                            <input type="text" name="customer_name" class="form-control mb-2"
                                placeholder="Nama Pelanggan" required>
                            <input type="number" name="quantity" class="form-control mb-2" placeholder="Jumlah"
                                min="1" required>
                            <button type="submit" class="btn btn-primary" onclick="pesan">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- CONTENT --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        // Tambahkan event listener untuk form submit
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah pengiriman formulir secara langsung

                // SweetAlert untuk konfirmasi pengiriman
                Swal.fire({
                    title: 'Konfirmasi Pesanan',
                    text: "Apakah Anda yakin ingin memesan ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Pesan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form jika pengguna mengonfirmasi
                        Swal.fire({
                            title: 'Pesanan Berhasil!',
                            text: 'Pesanan Anda telah dibuat.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500 // Pesan akan hilang setelah 1,5 detik
                        });


                        form.submit();
                    }
                });
            });
        });
    </script>

</body>

</html>
