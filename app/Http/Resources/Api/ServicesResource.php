<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> strip_tags( $this->description),
            'image'=> $this->image_path,
            'more_info'=> 'https://www.google.com/'.$this->id,

        ];



    }
}
