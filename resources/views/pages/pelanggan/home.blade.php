<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWR Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk background */
        body {
            background: url('https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/4c/ba/a5/outdoor.jpg?w=1200&h=-1&s=1') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            height: 100vh;
        }

        /* Overlay styling */
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

        .btn-warning {
            font-size: 1.2rem;
            padding: 0.8rem 2rem;
        }

        h1 {
            font-size: 4rem;
            font-weight: 700;
        }

        p {
            font-size: 1.5rem;
            margin: 1rem 0 2rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning px-5">
        <div class="container-fluid">
            <a class="navbar-brand fs-3 fw-bold" href="/">JWR Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('pelanggan.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('home.contact') }}">Contact
                            Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Content -->
    <div class="content">
        <h1>Welcome to JWR Restaurant</h1>
        <p>Experience the perfect dining ambiance with us</p>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-warning">Explore Menu</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
