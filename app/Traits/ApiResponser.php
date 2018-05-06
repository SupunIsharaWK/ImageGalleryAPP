<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;


/**
 * Created by PhpStorm.
 * User: Supun Ishara
 * Date: 5/5/2018
 * Time: 5:17 PM
 */

trait ApiResponser
{
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
    protected function showOne(Model $model, $code = 200)
    {
        return $this->successResponse($model, $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }
        //$collection = $this->paginate($collection);
        $collection = $this->cacheResponse($collection);
        return $this->successResponse($collection, $code);
    }
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }
    protected function paginate(Collection $collection)
    {
        $rules = [
            'per_page' => 'integer|min:2|max:50',
        ];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20;
        if (request()->has('per_page')) {
            $perPage = (int)request()->per_page;
        }
        $result = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($result, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }
    protected function cacheResponse($data)
    {
        $url = request()->url();
        $queryParams = request()->query();
        ksort($queryParams);

        $queryString = http_build_query($queryParams);
        $fullUrl = "{$url}?{$queryString}";
        return Cache::remember($fullUrl, 30/60, function () use ($data){
            return $data;
        });
    }
}