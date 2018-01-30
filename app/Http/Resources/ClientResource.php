<?php

namespace Dentist\Http\Resources;

use Dentist\Client;
use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*
        id nome email telefone
        */
        $this->name = $request->name;
        $this->email = $request->email;
        $this->phone = $request->phone;
        return parent::toArray($request);
    }
}
