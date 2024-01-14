<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (request()->route()->getName() == "api.show.category"){
             return [
                 'id'=> $this->id,
                 'name' => $this->name,
                 'description' => strip_tags( $this->description),
                 'image' => $this->image_path,
                 'address' => $this->address,
             ];
        }


        return [
            'id'=> $this->id,
            'name' => $this->name,
            'description' => strip_tags( $this->description),
            'image' => $this->image_path,
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'units' => $this->units,
            'building_area' => $this->building_area,
            'land_area'=>$this->land_area,
            'projects_sector'=>$this->projects_sector,
            'date_created'=>$this->date_created,
            'aesthetic_space'=>$this->aesthetic_space,
            'project_services'=>$this->project_services,
            'city' => $this->city->name,
            'district' => $this->district->name,
            'more_info' => 'https://www.google.com/'.$this->id,
        ];
    }
}
