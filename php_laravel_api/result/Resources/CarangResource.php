<?php

namespace App\Http\Resources;

use App\MyApp;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CarangResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'created_at' => Carbon::parse($this->created_at)->format(MyApp::created_at),
            // 'updated_at' => Carbon::parse($this->updated_at)->format(MyApp::updated_at),
        ];
    }
}
