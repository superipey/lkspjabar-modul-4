<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $dates = ['tanggal'];

    protected $fillable = [
        'customer_id',
        'tanggal',
        'kode_transaksi',
    ];

    public function detail() {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id', 'id');
    }
}
