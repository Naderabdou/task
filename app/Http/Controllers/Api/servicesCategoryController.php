<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ServicesCategoryResource;
use App\Models\ServiceCategory;
use App\Repositories\Sql\ServiceCategoryRepository;
use Illuminate\Http\Request;

class servicesCategoryController extends Controller
{
    protected $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepository;
       // setLang(request()->header('lang'));
    }

    public function index()
    {
        $categoryServices = $this->serviceCategoryRepository->paginateWith(['services']);
        return response()->api(ServicesCategoryResource::collection($categoryServices),'success',200);
    }
}
