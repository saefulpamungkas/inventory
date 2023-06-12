<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Http\Requests\StoreBarangKeluarRequest;
use App\Http\Requests\UpdateBarangKeluarRequest;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.barang_keluar.index', [
            'title' => 'Barang Keluar',
            'barKeluar' => BarangKeluar::all(),
            'barang' => Barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BarangKeluar::create([
            'id_barang' => $request->id_barang,
            'nama_pemesan' => $request->nama_pemesan,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_keluar' => $request->tanggal_masuk,
            'spek_barang' => $request->spek_barang,
        ]);

        $barang = Barang::find($request->id_barang);
        $barang->jumlah_barang -= $request->jumlah_barang;
        $barang->save();

        return redirect('/dashboard/barangkeluar')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangKeluarRequest $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }

    public function laporan()
    {
        return view('dashboard.data_laporan.barangkeluar', [
            'title' => 'Barang Keluar',
            'barKeluar' => BarangKeluar::all(),
            'barang' => Barang::all()
        ]);
    }
}
