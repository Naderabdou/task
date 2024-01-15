<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ServicesCategoryResource;
use App\Http\Resources\Api\ServicesCategoryShowResource;
use App\Http\Resources\Api\ServicesShowResource;
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
        $categoryServices = $this->serviceCategoryRepository->getAll();
        return response()->api(ServicesCategoryResource::collection($categoryServices),'success',200);
    }
    public function show($id)
    {

        $categoryServices = $this->serviceCategoryRepository->findWith($id, (array)'services');
        if (!$categoryServices){
            return response()->apiError('not found',404);
        }
        return response()->api(new ServicesCategoryShowResource($categoryServices),'success',200);
    }

}
