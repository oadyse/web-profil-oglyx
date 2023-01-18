<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_pemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tabel_pemesanan';
    protected $guarded = [];
    public $timestamps = false;

    public function total()
    {
        return $this->hasMany(M_detailTotalPemesanan::class, 'id_pemesanan', 'id');
    }

    public function detail()
    {
        return $this->hasMany(M_detailPemesanan::class, 'id_pemesanan', 'id');
    }
}
