<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequest extends Model
{
    protected $fillable = [
        'bike_name',
        'task',
        'bike_id',
        'done',
        'cost',
        'user_id'


    ];

    protected $casts = [
        'done'=> 'string',
        'created_at'=> 'date:m-Y'

    ];

     // Relations
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
