<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'produk';
    protected $guarded = [];
    public $timestamps = false;
}
