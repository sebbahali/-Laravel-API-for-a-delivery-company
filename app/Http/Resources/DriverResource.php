<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    
        return [
            
            'driver_id' => $this->id,
            'license_number' => $this->license_number ,
            'phone'  => $this->phone,
            'status' => $this->status,
            'Pakages' =>$this->whenloaded('packages')
           
        ];
    }
}
