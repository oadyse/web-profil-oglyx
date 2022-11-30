<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_detailTotalPemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detail_total_pemesanan';
    protected $guarded = [];
    public $timestamps = false;

    public static function getTotal($id)
    {
        return DB::table('detail_total_pemesanan')
            ->select('total')
            ->where('detail_total_pemesanan.id_pemesanan', $id)
            ->get();
    }
}
