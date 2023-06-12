<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Http\Requests\StoreBarangMasukRequest;
use App\Http\Requests\UpdateBarangMasukRequest;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.barang_masuk.index', [
            "title" => "Barang Masuk",
            // "barMasuk" => BarangMasuk::with('getNamaSupplier', 'getNamaBarang')->get()->last()->paginate(),
            "barMasuk" => BarangMasuk::get(),
            "supplier" => Supplier::all(),
            "barang" => Barang::all(),
        ]);
        // $title = 'Barang Masuk';
        // $barMasuk = BarangMasuk::all();
        // return view('dashboard.barang_masuk.index', compact('barMasuk', 'title'));
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
        BarangMasuk::create([
            'id_supplier' => $request->id_supplier,
            'id_barang' => $request->id_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'spek_barang' => $request->spek_barang,
        ]);

        $barang = Barang::find($request->id_barang);
        $barang->jumlah_barang += $request->jumlah_barang;
        $barang->save();

        return redirect('/dashboard/barangmasuk')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barMasuk = BarangMasuk::find($id);
        $barMasuk->update([
            'id_supplier' => $request->id_supplier,
            'id_barang' => $request->id_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'spek_barang' => $request->spek_barang,
        ]);

        $barang = Barang::find($request->id_barang);

        $barang->jumlah_barang += $request->jumlah_barang;
        $barang->update();

        return redirect('/dashboard/barangmasuk')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $barMasuk = BarangMasuk::find($id);
        $barang = Barang::find($request->id);
        $barMasuk->delete();
        return redirect('/dashboard/barangmasuk')->with('success', 'Data Berhasil Dihapus');
    }

    // public function updateSgBarang($request, $idTrx = '')
    // {
    //     $sg_barang = Barang::where('id', $request->id_barang);
    //     $value = $sg_barang->value('jumlah_barang');

    //     if ($idTrx != '') {
    //         $trx = BarangMasuk::where('id', $idTrx)->first();
    //         if ($trx->jenis_transaksi == 'Masuk') {
    //             $sg_barang->update(["jumlah_barang" => (int) $value - (int) $trx->jumlah_barang]);
    //         } elseif ($trx->jenis_transaksi == 'Keluar') {
    //             $sg_barang->update(["jumlah_barang" => (int) $value + (int) $trx->jumlah_barang]);
    //         }
    //         $value = Barang::where('id', $request->id_barang)->value('jumlah_barang');
    //     }

    //     if ($request->jenis_transaksi == 'Masuk') {
    //         $sg_barang->update(["jumlah_barang" => (int) $value + (int) $request->jumlah_barang]);
    //     } elseif ($request->jenis_transaksi == 'Keluar') {
    //         $sg_barang->update(["jumlah_barang" => (int) $value - (int) $request->jumlah_barang]);
    //     }
    // }

    public function laporan()
    {
        return view('dashboard.data_laporan.barangmasuk', [
            "title" => "Barang Masuk",
            "barMasuk" => BarangMasuk::get(),
            "supplier" => Supplier::all(),
            "barang" => Barang::all(),
        ]);
    }
}
