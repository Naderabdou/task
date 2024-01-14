<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServicesRequest;
use App\Models\ServiceCategory;
use App\Repositories\Sql\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $services = $this->serviceRepository->getAll();

        return view('dashboard.services.index', compact('services'));
    }
    public function create()
    {

      $categories=  ServiceCategory::select('id','name_ar','name_en')->get();

        return view('dashboard.services.create',compact('categories'));
    }
    public function store(ServicesRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services');
        }

        $service = $this->serviceRepository->create($data);

        if ($service) {
            return redirect()->route('admin.services.index')->with('success', 'تم اضافة الخدمة بنجاح');
        } else {
            return redirect()->route('admin.services.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $service = $this->serviceRepository->findOne($id);
        $categories=  ServiceCategory::select('id','name_ar','name_en')->get();

        return view('dashboard.services.edit', compact('service','categories'));
    }
    public function update(ServicesRequest $request, $id)
    {
        $data = $request->validated();
        $service = $this->serviceRepository->findOne($id);


        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $data['image'] = $request->file('image')->store('services');
        }

        $service = $this->serviceRepository->update($data, $id);

        if ($service) {
            return redirect()->route('admin.services.index')->with('success', 'تم تعديل الخدمة بنجاح');
        } else {
            return redirect()->route('admin.services.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy($id)
    {
        $service = $this->serviceRepository->findOne($id);

        if ($service->image) {
            Storage::delete($service->image);
        }

       $service->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }


    public function status()
    {
        try {
      foreach (json_decode(request()->record_ids) as $recordId) {

              $category = $this->serviceRepository->findOne($recordId);


              if ($category->status === 'active'){


                  $category->status = 'inactive';
              }else{

                  $category->status = 'active';
              }

              $category->save();

        }
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
        return redirect()->back()->with('success', 'تم تعديل الحالة بنجاح');



    }// end of status


    public function bulk_delete()
    {

        try {
            foreach (json_decode(request()->record_ids) as $recordId) {


                $services = $this->serviceRepository->findOne($recordId);
                if ($services->icon) {
                    Storage::delete($services->image);
                }
                $services->delete();

            }

        }
        catch (\Exception $e){
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }// end of bulk_delete

}
