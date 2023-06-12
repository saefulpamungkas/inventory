<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Supplier;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Page',
            'barang' => Barang::all(),
            'supplier' => Supplier::all(),
            'barMasuk' => BarangMasuk::all(),
            'barKeluar' => BarangKeluar::all()
        ]);
    }
}
