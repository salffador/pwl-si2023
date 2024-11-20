<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total supplier
        $totalSuppliers = Supplier::count();

        // Hitung total produk
        $totalProducts = Product::count();

        // Hitung total transaksi
        $totalTransactions = Transaction::count();

        // Kirim data ke view
        return view('dashboard.index', compact(
            'totalSuppliers',
            'totalProducts',
            'totalTransactions'
        ));
    }
}
