<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $admin = Auth::user();

        // Mengirim data ke view
        return view('pages.dashboard', compact('admin'));
    }
}
