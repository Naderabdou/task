<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ServicesResource;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Repositories\Sql\ServiceRepository;
use Illuminate\Http\Request;

class servicesController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
        //SetLang(request()->header('lang'));
    }



    public function show($id)
    {

        $services= $this->serviceRepository->findOne($id);
        if (!$services){
            return response()->apiError('not found',404);
        }
        return response()->api(new ServicesResource($services),'success',200);

    } // end of index
}
