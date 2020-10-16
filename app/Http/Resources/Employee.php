<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['__pk' => $this->__pk,
        '_fk_department' => $this->_fk_department,
         'first_name' => $this->first_name,
         'last_name' => $this->last_name,
         'age' => $this->age];
    }
}
