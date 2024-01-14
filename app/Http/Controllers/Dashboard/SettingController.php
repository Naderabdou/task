<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use App\Repositories\Contract\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {

        $this->settingRepository = $settingRepository;
    } // end of contruct

    public function create()
    {

        $settings = $this->settingRepository->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.settings.edit', compact('settings'));
    } // end of create

    public function store(SettingRequest $request)
    {

        $attribute = $request->except('_token', '_method', 'logo');

        $logo = $this->settingRepository->getWhere([['key', 'logo']])->first()['value'];
       // $main_image = $this->settingRepository->getWhere([['key', 'main_image']])->first()['value'];
      //  $about_image = $this->settingRepository->getWhere([['key', 'about_image']])->first()['value'];

        if ($request->has('logo')) {

            // Delete old internal_image
            Storage::delete($logo);

            // Upload new internal_image
            $attribute['logo'] = $request->file('logo')->store('setting');
        }

      /*  if ($request->has('main_image')) {

            // Delete old internal_image
            Storage::delete($main_image);

            // Upload new internal_image
            $attribute['main_image'] = $request->file('main_image')->store('setting');
        }*/

        /*if ($request->has('about_image')) {

            // Delete old internal_image
            Storage::delete($about_image);

            // Upload new internal_image
            $attribute['about_image'] = $request->file('about_image')->store('setting');
        }*/

        $attribute['phone'] = $request->phone_key . $request->phone;

        $this->settingRepository->updateSetting($attribute);

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    } // end of update
}
