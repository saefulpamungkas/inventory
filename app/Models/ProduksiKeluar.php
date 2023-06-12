<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiKeluar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function produksi()
    {
        return $this->belongsTo(Produksi::class, 'id_produksi');
    }

    public function produsen()
    {
        return $this->belongsTo(Produsen::class, 'id_produsen');
    }
}
