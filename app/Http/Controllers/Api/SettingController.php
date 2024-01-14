<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index($key)
    {
        if (!in_array($key, ['about-us', 'connect-us', 'chat','about-app']))
            return response()->apiError('not found',404);

        $lang = request()->header('lang');
        if (!$lang)
            $lang = 'ar';
        $data = [];
        switch ($key) {
            case 'about-us':
               $data['about'] = getSetting('about',$lang)->value;
                $data['vision'] = getSetting('vision',$lang)->value;
                $data['message'] = getSetting('message',$lang)->value;
                $data['identity'] = getSetting('identity',$lang)->value;
                break;
            case 'connect-us':
                $data['phone'] = getSetting('phone')->value;
                $data['email'] = getSetting('email')->value;
                $data['website'] = getSetting('website')->value;
                break;
            case 'chat':
                $data['chat_link'] = getSetting('chat_link')->value;
                break;

            case 'about-app':
                $data['about_app'] = getSetting('about_app',$lang)->value;
                break;


        }

        return response()->api($data, 'success', 200);

    }
}
