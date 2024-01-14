<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{

    public function messages()
    {
       return [
           'name_ar.required' => 'اسم المشروع مطلوب',
              'name_en.required' => 'اسم المشروع مطلوب',
          'image.required' => 'صورة المشروع مطلوبة',
           'category_id.required' => 'القسم مطلوب',
           'ity_id.required' => 'المدينة مطلوبة',
          // 'district_id.required' => 'الحي مطلوب',
              'address.required' => 'العنوان مطلوب',
              'lat.required' => 'خط العرض مطلوب',
                'lng.required' => 'خط الطول مطلوب',
                'units.required' => 'الوحدات مطلوبة',
                'building_area.required' => 'مساحة البناء مطلوبة',
                'land_area.required' => 'مساحة الارض مطلوبة',
                'projects_sector.required' => 'قطاع المشروع مطلوب',
                'date_created.required' => 'تاريخ الانشاء مطلوب',
                'aesthetic_space.required' => 'المساحة الجمالية مطلوبة',
                'project_services.required' => 'خدمات المشروع مطلوبة',
                'description_ar.required' => 'الوصف مطلوب',
                'description_en.required' => 'الوصف مطلوب',

       ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (request()->method()) {
            case 'POST':
                return [

                    'name_ar'  => 'required|string|max:252',
                    'name_en'  => 'required|string|max:255',
                    'image'    => 'required|image|max:255|mimes:jpeg,png,jpg,gif,svg',
                    'category_id'    => 'required|exists:categories,id',
                    'city_id'    => 'required|exists:cities,id',
                    'district_id'    => 'sometimes|exists:districts,id',
                    'address'    => 'required|string|max:255',
                    'lat'    => 'required|string|max:255',
                    'lng'    => 'required|string|max:255',
                    'units'    => 'required|string|max:255',
                    'building_area'    => 'required|string|max:255',
                    'land_area'    => 'required|string|max:255',
                    'projects_sector'    => 'required|string|max:255',
                    'date_created'    => 'required|string|max:255',
                    'aesthetic_space'    => 'required|string|max:255',
                    'project_services'    => 'required|string|max:255',
                    'description_ar'    => 'required|string|max:255',
                    'description_en'    => 'required|string|max:255',

                ];
                break;

            case 'PUT':
                return [

                    'name_ar'  => 'required|string|max:252',
                    'name_en'  => 'required|string|max:255',
                    'image'    => 'sometimes|image|max:255|mimes:jpeg,png,jpg,gif,svg',
                    'category_id'    => 'required|exists:categories,id',
                    'city_id'    => 'required|exists:cities,id',
                    'district_id'    => 'sometimes|exists:districts,id',
                    'address'    => 'required|string|max:255',
                    'lat'    => 'required|string|max:255',
                    'lng'    => 'required|string|max:255',
                    'units'    => 'required|string|max:255',
                    'building_area'    => 'required|string|max:255',
                    'land_area'    => 'required|string|max:255',
                    'projects_sector'    => 'required|string|max:255',
                    'date_created'    => 'required|string|max:255',
                    'aesthetic_space'    => 'required|string|max:255',
                    'project_services'    => 'required|string|max:255',
                    'description_ar'    => 'required|string|max:255',
                    'description_en'    => 'required|string|max:255',
                ];
                break;
        }
    }
}
