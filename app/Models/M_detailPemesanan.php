<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_detailPemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detail_pemesanan';
    protected $guarded = [];
    public $timestamps = false;

    public function pemesanan()
    {
        return $this->hasOne(M_pemesanan::class, 'id_pemesanan', 'id');
    }

    public function produk()
    {
        return $this->hasOne(M_produk::class, 'id_produk', 'id');
    }

    public static function getDetail($id)
    {
        return DB::table('detail_pemesanan')
            ->select('nama')
            ->join('produk', 'produk.id', '=', 'detail_pemesanan.id_produk')
            ->groupBy('detail_pemesanan.id_pemesanan', 'produk.nama')
            ->where('detail_pemesanan.id_pemesanan', $id)
            ->get();
    }
}
