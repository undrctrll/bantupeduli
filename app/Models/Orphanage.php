<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    protected $fillable = [
        'name', 'slug', 'address', 'phone', 'email', 'description', 'logo', 'created_by'
    ];
}
