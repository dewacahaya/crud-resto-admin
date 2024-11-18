<!-- views/dashboard.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Selamat Datang, Admin!</h5>
                        <p class="card-text">Halaman CRUD untuk admin mengolah data menu dan mengubah profile</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Admin Profile</h5>
                        <label for="name" class="mb-1">Nama Admin</label>
                        <input type="text" name="name" id="name"
                            class="form-control mb-2 @error('name') is-invalid @enderror"
                            value="{{ old('name', $admin->name) }}" disabled>
                        <label for="email" class="mb-1">Email Admin</label>
                        <input type="text" name="email" id="email"
                            class="form-control mb-2 @error('email') is-invalid @enderror"
                            value="{{ old('name', $admin->email) }}" disabled>
                        <button class="btn btn-primary mt-4"><a href="{{ route('admin.profile') }}"
                                class="text-decoration-none text-light">Lihat
                                Profile</a></button>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('admin.profile') }}" class="text-decoration-none"><i
                                        class="bi bi-person-circle me-2"></i>Admin
                                    Profile</a></li>
                            <li><a href="{{ route('menus.index') }}" class="text-decoration-none"><i
                                        class="bi bi-list-ul me-2"></i>Menus</a>
                            </li>
                            <li><a href="{{ route('logout') }}" class="text-decoration-none"><i
                                        class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
