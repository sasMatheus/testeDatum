<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HashResource extends JsonResource
{
    
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'key' => $this->key,
            'data' => $this->data,
            'date_created' => Carbon::make($this->created_at)->format('d/m/Y'),
        ];
    }
}
