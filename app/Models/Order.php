<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id', 
        'order_number',
        'status',
        'delivery_address',
        'delivery_date',
        
    ];
    public function driver() :BelongsTo
    {
        return $this->belongsTo(Driver::class);

    }
    public function package() :BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}

