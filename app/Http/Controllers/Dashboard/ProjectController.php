<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Repositories\Sql\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    public function index()
    {
        $projects = $this->projectRepository->getAll();

        return view('dashboard.projects.index', compact('projects'));
    }
    public function create()
    {
      $categories=  Category::select('id', 'name_ar', 'name_en')->get();
      $cities=  City::select('id', 'name_ar', 'name_en')->get();
      $districts=  District::select('id', 'name_ar', 'name_en')->get();
        return view('dashboard.projects.create',compact('categories','cities','districts'));
    }
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects');
        }




        if ($this->projectRepository->create($data)) {
            return redirect()->route('admin.projects.index')->with('success', 'تم اضافة المشروع بنجاح');
        } else {
            return redirect()->route('admin.projects.index')->with('error', 'حدث خطأ ما');
        }
    }
    public function edit($id)
    {
        $project = $this->projectRepository->findOne($id);
        $categories=  Category::select('id', 'name_ar', 'name_en')->get();
        $cities=  City::select('id', 'name_ar', 'name_en')->get();
        $districts=  District::where('city_id',$project->city_id)->get();
        return view('dashboard.projects.edit', compact('project','categories','cities','districts'));
    }
    public function update(ProjectRequest $request, $id)
    {
        $data = $request->validated();
        $project = $this->projectRepository->findOne($id);
        if ($request->hasFile('image')) {
            Storage::delete($project->image);
            $data['image'] = $request->file('image')->store('projects');
        }
        if ($this->projectRepository->update($data, $id)) {
            return redirect()->route('admin.projects.index')->with('success', 'تم تعديل المشروع بنجاح');
        } else {
            return redirect()->route('admin.projects.index')->with('error', 'حدث خطأ ما');
        }
    }
    public function destroy($id)
    {
        $project = $this->projectRepository->findOne($id);
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }


    public function status()
    {
        try {
            foreach (json_decode(request()->record_ids) as $recordId) {
                $project = $this->projectRepository->findOne($recordId);


                if ($project->status === 'active'){


                    $project->status = 'inactive';
                }else{

                    $project->status = 'active';
                }

                $project->save();
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
        return redirect()->back()->with('success', 'تم تعديل الحالة بنجاح');

    }// end of status


    public function bulk_delete()
    {
        try {

            foreach (json_decode(request()->record_ids) as $recordId) {

                $projects = $this->projectRepository->findOne($recordId);
                if ($projects->icon) {
                    Storage::delete($projects->image);
                }
                $projects->delete();

            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }// end of bulk_delete


    public function district($id){

        $districts=  District::where('city_id',$id)->get();

        return response()->json($districts);

    }
}
