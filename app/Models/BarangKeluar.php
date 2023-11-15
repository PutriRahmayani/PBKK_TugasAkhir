<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [ 'nama_barang','merek', 'jumlah', 'tanggal_keluar'];

}
