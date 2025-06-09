<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'slug', 'orphanage_id', 'user_id', 'image', 'target', 'batas_waktu'
    ];

    public function orphanage()
    {
        return $this->belongsTo(Orphanage::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function donations()
    {
        return $this->hasMany(\App\Models\Donation::class);
    }

    public function totalDonasi()
    {
        return $this->donations()->sum('jumlah');
    }
}
