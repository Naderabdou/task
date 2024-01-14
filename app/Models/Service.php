<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['image_path'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . app()->getLocale()};
    }
    public function getImagePathAttribute()
    {

        return asset('storage/' . $this->image);
    }

}
