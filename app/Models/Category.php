<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $appends=['icon_path'];
    protected $guarded=[];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }


    public function getIconPathAttribute()
    {

        return asset('storage/' . $this->icon);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
