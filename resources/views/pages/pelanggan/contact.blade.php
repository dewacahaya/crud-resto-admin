<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWR Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            z-index: 1;
        }

        /* Konten utama */
        .content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            padding-top: 10vh;
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
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5rem;
        }

        .social-icons {
            margin-top: 2rem;
        }

        .social-icons a {
            color: white;
            font-size: 2rem;
            margin: 0 1rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .social-icons a:hover {
            color: #ffc107;
            transform: scale(1.1);
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
    <div class="content container">
        <h1>Contact Us</h1>
        <p>Follow us on social media for updates, news, and more!</p>

        <!-- Social Media Links -->
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://youtube.com" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="https://linkedin.com" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>