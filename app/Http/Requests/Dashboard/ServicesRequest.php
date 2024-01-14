<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ServicesRequest extends FormRequest
{

    public function messages()
    {
        return [
            'name_ar.required'        => 'الاسم بالعربي مطلوب',
            'name_en.required'        => 'الاسم بالانجليزي مطلوب',
            'name_ar.string'        => 'الاسم بالعربي يجب ان يكون نص',
            'name_en.string'        => 'الاسم بالانجليزي يجب ان يكون نص',
            'name_ar.unique'        => 'الاسم بالعربي موجود مسبقا',
            'name_en.unique'        => 'الاسم بالانجليزي موجود مسبقا',
            'description_ar.required'        => 'الوصف بالعربي مطلوب',
            'description_en.required'        => 'الوصف بالانجليزي مطلوب',
            'description_ar.string'        => 'الوصف بالعربي يجب ان يكون نص',
            'description_en.string'        => 'الوصف بالانجليزي يجب ان يكون نص',
            'image.image'        => 'الصوره يجب ان تكون صورة',
            'image.required'        => 'الصوره مطلوبة',
            'service_category_id.required'        => 'القسم مطلوب',
            'service_category_id.exists'        => 'القسم غير موجود',




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
 $id = $this->route()->parameter('service');
        switch (request()->method()) {
            case 'POST':
                return [

                    'name_ar'  => 'required|string|max:252|unique:services,name_ar',
                    'name_en'  => 'required|string|max:255|unique:services,name_en',
                    'description_ar'  => 'required|string',
                    'description_en'  => 'required|string',
                    'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'service_category_id'    => 'required|exists:service_categories,id',
                ];
                break;

            case 'PUT':
                return [

                    'name_ar'  => ' required|string|unique:services,name_ar,'.$id.',id',
                    'name_en'  => ' required|string|unique:services,name_en,'.$id.',id',
                    'description_ar'  => 'required|string',
                    'description_en'  => 'required|string',
                    'image'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'service_category_id'    => 'required|exists:service_categories,id',
                ];
                break;
        }
    }
}
