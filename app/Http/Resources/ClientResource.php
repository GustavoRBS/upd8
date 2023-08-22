<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'cpf' => $this->cpf,
            'name' => $this->name,
            'date_of_birth'=> $this->date_of_birth,
            'gender' => $this->gender,
            'state' => $this->state,
            'city' => $this->city,
        ];
    }
}
