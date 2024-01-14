<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
{
    public function messages()
    {
        return [
            'title_ar.required' => 'من فضلك ادخل العنوان بالعربية',
            'title_en.required' => 'من فضلك ادخل العنوان بالانجليزية',
            'title_ar.unique' => 'العنوان بالعربية موجود مسبقا',
            'title_en.unique' => 'العنوان بالانجليزية موجود مسبقا',
            'description_ar.required' => 'من فضلك ادخل الوصف بالعربية',
            'description_en.required' => 'من فضلك ادخل الوصف بالانجليزية',
            'image.required' => 'من فضلك ادخل الصورة',
            'image.image' => 'من فضلك ادخل صورة وليس فيديو',

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

                    'title_ar'  => 'required|string|max:252|unique:blogs,title_ar',
                    'title_en'  => 'required|string|max:255|unique:blogs,title_en',
                    'description_ar'  => 'required|string',
                    'description_en'  => 'required|string',
                    'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ];
                break;

            case 'PUT':
                return [

                    'title_ar'  => ' required|string|unique:blogs,title_ar,'.$this->id.',id',
                    'title_en'  => ' required|string|unique:blogs,title_en,'.$this->id.',id',
                    'description_ar'  => 'required|string',
                    'description_en'  => 'required|string',
                    'image'  => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                break;
        }
    }
}
