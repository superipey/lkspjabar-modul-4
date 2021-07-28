<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $table = 'transaksi_detail';

    protected $fillable = [
        'produk_id',
        'jumlah',
        'transaksi_id',
    ];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_id');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }
}
