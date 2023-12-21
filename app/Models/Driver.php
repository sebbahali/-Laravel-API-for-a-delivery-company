<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    use HasFactory;


    protected $fillable = [
        
     
        'license_number',
        'phone',
        'status',
          
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function packages() :HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function orders() :hasmany
    {
        return $this->hasMany(Order::class);
    }
  
}
