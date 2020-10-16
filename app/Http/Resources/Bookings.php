<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class bookings extends JsonResource
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
        '_fk_property'=> $this->_fk_property,
        'start_date' => $this->start_date,
        'end_date' => $this->end_date,

        // 'prev'  => $this->previousPageUrl(),
        // 'next'  => $this->nextPageUrl(),

        // 'result' => $this->collection
    ];

    }
}
