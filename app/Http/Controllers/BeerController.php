<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeerResource;
use App\Services\PunkApiService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PunkApiService $punk, Request $request)
    {
        return $this->getBeers($request, $punk);

    }

    /**
     * @param Request $request
     * @param PunkApiService $punk
     * @return LengthAwarePaginator
     */
    public function getBeers(Request $request, PunkApiService $punk): LengthAwarePaginator
    {
        $filters = collect(config('punk.filters'))->map(fn($ele) => trim($ele))->toArray();

        $params = $request->only($filters);
        $params['per_page'] = !empty($params['per_page']) ? $params['per_page'] : 10;

        $collection = BeerResource::collection($punk->getBeers($params));


        $paginator = new LengthAwarePaginator($collection, 321, $params['per_page'], null, [
            'path' => route('showBeers'),
            //   'query' => http_build_query($params)

        ]);

        return $paginator;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Beer $beer
     * @return \Illuminate\Http\Response
     */
    public function show(int $beer, PunkApiService $punk): ResourceCollection
    {
        return BeerResource::collection($punk->getBeerById($beer));
    }

    public function showBeers(Request $request, PunkApiService $punk)
    {

        return view('beers')->with('beers', $this->getBeers($request, $punk));
    }

}
