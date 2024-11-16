<!-- layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styling */
        .sidebar {
            width: 250px;
            height: 90vh;
            top: 0;
            left: 0;
            overflow-y: auto;
            /* Scroll vertikal jika konten terlalu panjang */
            overflow-x: hidden;
            /* Hilangkan scrollbar horizontal */
        }

        .content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }
    </style>

</head>

<body>
    <header>
        <div class="px-md-3 p-4 bg-info">
            <a href="{{ route('dashboard') }}" class="fs-3 text-decoration-none text-dark">Resto Admin - CRUD
                Dashboard</a>
        </div>
    </header>

    <section class="d-flex h-calc">
        <div class="sidebar bg-dark text-white d-flex flex-column">
            <ul class="list-unstyled flex-grow-1">
                <li class="my-5 text-center"><a href="{{ route('dashboard') }}"
                        class="text-decoration-none text-white">Dashboard</a></li>
                <li class="my-5 text-center"><a href="{{ route('admin.profile') }}"
                        class="text-decoration-none text-white">Admin Profile</a></li>
                <li class="my-5 text-center"><a href="{{ route('menus.index') }}"
                        class="text-decoration-none text-white">Menus</a></li>
            </ul>
            <ul class="list-unstyled">
                <li class="my-5 text-center"><a href="{{ route('logout') }}"
                        class="text-decoration-none text-white">Logout</a></li>
            </ul>
        </div>
        <div class="content flex-grow-1">
            @yield('content')
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')
</body>

</html>
