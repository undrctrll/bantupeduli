<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'jumlah',
        'status',
        'order_id',
        'post_id',
        'metode',
        'sapaan',
        'snap_token',
    ];    
}
