<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryProjectShowResource;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use App\Repositories\Sql\CategoryRepository;
use Illuminate\Http\Request;

class CategoryProjectController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
       // SetLang(request()->header('lang'));

    }


    public function index()
    {
        $categories = $this->categoryRepository->paginate(10);
        return response()->api(CategoryResource::collection($categories),'success',200);

    } // end of index






    public function show($id){
        $category= $this->categoryRepository->findWith($id,['projects']);
        if (!$category){
            return response()->apiError('not found',404);
        }
        return response()->api(new CategoryResource($category),'success',200);
    }
}
