<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'description',
        'worksheet'
    ];

    // Relations
    public function bike()

    {
        return $this->belongsTo(Bike::class);
    }
}
