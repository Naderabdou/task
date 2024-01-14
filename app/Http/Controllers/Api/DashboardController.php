<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\DashboardResource;
use App\Models\Category;
use App\Repositories\Sql\CategoryRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
     //   SetLang(request()->header('lang'));

    }


    public function index()
  {

    $categories= $this->categoryRepository->paginateWith(['projects']);


    // $categories = Category::with('projects')->latest()->paginate(10);

      return response()->api(DashboardResource::collection($categories),'success',200);
  }





}
