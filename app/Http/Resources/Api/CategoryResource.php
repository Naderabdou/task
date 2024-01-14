<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (request()->route()->getName() == 'api.show.category'){
            return [
                'id'=> $this->id,
                'name'=> $this->name,
                'projects'=> ProjectResource::collection($this->whenLoaded('projects')->paginate(10))
            ];
        }
            return [
                'id' => $this->id,
                'name' => $this->name,
                'icon' => $this->icon_path
                ];
        }

}
