<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return string[]
     */

    public function messages()
    {
        return [
            'name_ar.required'        => 'الاسم بالعربي مطلوب',
            'name_en.required'        => 'الاسم بالانجليزي مطلوب',
           'icon.required'        => 'الايقونة مطلوبة',
            'name_ar.unique'        => 'الاسم بالعربي موجود مسبقا',
            'name_en.unique'        => 'الاسم بالانجليزي موجود مسبقا',
            'icon.image'        => 'الايقونة يجب ان تكون صورة',
            'name_ar.string'        => 'الاسم بالعربي يجب ان يكون نص',
            'name_en.string'        => 'الاسم بالانجليزي يجب ان يكون نص',


        ];
    }




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

                    'name_ar'  => 'required|string|max:252|unique:categories,name_ar',
                    'name_en'  => 'required|string|max:255|unique:categories,name_en',
                    'icon'    => 'required|image|max:255',
                ];
                break;

            case 'PUT':
                return [

                    'name_ar'  => ' required|string|unique:categories,name_ar,'.$this->id.',id',
                    'name_en'  => ' required|string|unique:categories,name_en,'.$this->id.',id',
                    'icon'  => 'sometimes|image|max:255|',
                ];
                break;
        }
    }
}
