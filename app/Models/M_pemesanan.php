<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tabel_pemesanan';
    protected $guarded = [];
    public $timestamps = false;

    public function total_pemesanan()
    {
        return $this->belongsTo(M_detailTotalPemesanan::class, 'id', 'id_pemesanan');
    }
}
