<?php

namespace Dentist\Http\Resources;

use Dentist\Address;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClinicCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $clinics = $this->collection;
        foreach ($clinics as $clinic) {
            $clinic->clinica = $clinic->name;
            $clinic->telefone = $clinic->phone;
            $clinic->endereco = $clinic->address()->get()->first();
            unset($clinic->address_id);
            unset($clinic->endereco->id);
            unset($clinic->name);
            unset($clinic->phone);
        }
        return $clinics;
    }
}
