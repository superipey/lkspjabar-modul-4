<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat_lengkap',
        'email',
        'password',
    ];
}
