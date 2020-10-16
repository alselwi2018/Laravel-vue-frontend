<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Properties extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            '__pk' => $this->__pk,
            '_fk_location' => $this->_fk_location,
            'property_name' => $this->property_name,
           'near_beach' => $this->near_beach,
           'accepts_pets' => $this->accepts_pets,
            'sleeps' =>$this->sleeps,
            'beds' => $this->beds
        ];
    }
}
