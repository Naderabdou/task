<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlogResource;
use App\Models\Blog;
use App\Repositories\Sql\BlogRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
      //  setLang(request()->header('lang'));
    }

    public function index()
  {

    $blogs =  $this->blogRepository->paginate(10);
    return response()->api(BlogResource::collection($blogs), 'success');
  } // end of index

    public function show($id)
    {
        $blog = $this->blogRepository->findOne($id);
        if (!$blog) {
            return response()->apiError('Blog Not Found', 404);
        }
        return response()->api(new BlogResource($blog), 'success');
    } // end of show
}
