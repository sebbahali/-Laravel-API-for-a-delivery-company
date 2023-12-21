<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 
 
        return [

            'package_id' => $this->id ,
            'tracking_number'  => $this->tracking_number,
            'weight' => $this->weight,
            'status' => $this->status,
            'sender_name' => $this->sender_name,
            'sender_address' =>$this->sender_address,
            'receiver_name' => $this->receiver_name,
            'receiver_address' => $this->receiver_address,
            'drivers' => $this->whenloaded('driver'),
                     
          
        ];
    }
}
