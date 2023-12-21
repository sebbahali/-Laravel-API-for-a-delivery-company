<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'tracking_number',
        'weight',
        'status',
        'sender_name',
        'sender_address',
        'receiver_name',
        'receiver_address',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'driver_id',
    ];
    public function driver() :BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function orders() :HasMany
     {
        return $this->hasMany(Order::class);
    }
}
