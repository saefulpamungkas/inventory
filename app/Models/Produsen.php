<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produsen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produsen',
        'no_seluler',
        'no_telp_wa',
        'alamat_produsen',
    ];
}
