<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::paginate(10);

        // Mengirim data ke view
        return view('pages.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "kode" => "required|string|max:255",
            "name" => "required|string|max:255",
            "harga" => "required|numeric",
            "gambar" => "nullable|image|mimes:jpg,jpeg,png|max:2048", // Validasi untuk gambar
        ]);


        if ($request->hasFile('gambar')) {
            $filePath = $request->file('gambar')->store('gambar', 'public');
            $validatedData['gambar'] = $filePath; // Path file ditambahkan ke array validatedData
        }

        // Simpan data ke database
        Menu::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route("menus.index")->with('created', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $menus_id)
    {
        $menus = Menu::where('id', $menus_id)->first();

        return view('pages.menus.show', compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $menus_id)
    {
        $menus = Menu::findOrFail($menus_id);

        return view('pages.menus.edit', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $menus_id)
    {
        $validatedData = $request->validate([
            "kode" => "required|string|max:255",
            "name" => "required|string|max:255",
            "harga" => "required|numeric",
            "gambar" => "nullable|image|mimes:jpg,jpeg,png|max:2048", // Validasi untuk gambar
        ]);

        $menus = Menu::findOrFail($menus_id);

        // Jika ada file gambar baru diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($menus->gambar && Storage::exists('public/' . $menus->gambar)) {
                Storage::delete('public/' . $menus->gambar);
            }

            $filePath = $request->file('gambar')->store('gambar', 'public');

            // Simpan gambar baru
            $filePath = $request->file('gambar')->store('gambar', 'public');
            $validatedData['gambar'] = $filePath;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $validatedData['gambar'] = $menus->gambar;
        }

        // Update data menus
        $menus->update($validatedData);

        return redirect()->route('menus.index')->with('updated', 'Data berhasil diubah!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $menus_id)
    {
        $menus = Menu::where('id', $menus_id)->delete();

        return redirect()->route('menus.index')->with('deleted', 'Data Berhasil Dihapus!');
    }
}
