<?php

namespace Dentist\Http\Resources;

use Dentist\Client;
use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'email' => $this->user->email,
           'phone' => $this->phone,
           'role_id' => $this->user->role_id
        ];
    }
}
