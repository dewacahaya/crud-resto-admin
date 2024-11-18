<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'customer_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $totalPrice = $menu->harga * $request->quantity;

        Order::create([
            'menu_id' => $request->menu_id,
            'customer_name' => $request->customer_name,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
