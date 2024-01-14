<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResponseFactory::macro('api', function ($data  , $message = 'success', $status = 200) {


            $format = [
                'status' => $status,
                'message' => $message,
                'data' => $data,
            ];
            return response()->json($format, $status);
        });

        ResponseFactory::macro('apiError', function ($message = null, $status=404) {
            $format = [
                'status' => $status,

                'message' => $message,
            ];
            return response()->json($format, $status);
        });
        ResponseFactory::macro('apiSuccess', function ($message = null, $status = 200) {
            $format = [
                'status' => $status,

                'message' => $message,
            ];
            return response()->json($format, $status);
        });

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'pages'): LengthAwarePaginator {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,

                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
