<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
           'id' => $this->id,
           'title' => $this->title,
           'description' => strip_tags( $this->description),
           'image' => $this->image_path,
           'created_at' =>Carbon::parse($this->created_at)->translatedFormat(' j F'),


       ];
    }
}
