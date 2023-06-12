<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_supplier',
        'no_telp',
        'alamat_supplier',
    ];

    public function barangmasuk()
    {
        return $this->belongsTo(BarangMasuk::class);
    }
}
