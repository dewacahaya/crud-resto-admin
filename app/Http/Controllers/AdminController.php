<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admins.profile');
    }

    public function editProfile()
    {
        $admin = Auth::user(); // Ambil admin yang sedang login
        return view('pages.admins.profile', compact('admin'));
    }

    public function show($admin_id)
    {
        $admin = Admin::findOrFail($admin_id); // Menangani ID yang tidak ditemukan
        return view('pages.admins.profile', compact('admin'));
    }


    public function updateProfile(Request $request, $admin_id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin_id, // Pastikan email unik kecuali untuk admin ini
            'password' => 'nullable|string|confirmed',
        ]);

        // Siapkan data untuk update
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Tambahkan password jika diisi
        if ($request->password) {
            $updateData['password'] = bcrypt($request->password);
        }

        // Gunakan Query Builder untuk mengupdate data
        DB::table('admins')->where('id', $admin_id)->update($updateData);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.profile')->with('success', 'Data berhasil diubah!');
    }
}
