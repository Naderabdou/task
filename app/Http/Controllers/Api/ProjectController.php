<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProjectResource;
use App\Models\Project;
use App\Repositories\Sql\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
       // setLang(request()->header('lang'));

    }
   public function show($id){
         $project= $this->projectRepository->findOne($id);
       if (!$project){
           return response()->apiError('not found',404);
       }
       return response()->api(new ProjectResource($project),'success',200);
   }
}
