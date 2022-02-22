<?php

namespace App\Services;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Http;

class PunkApiService
{
    public function __construct(protected string $endpoint)
    {
    }

    /**
     * @return Jsonable
     */
    public function getBeers(array $params): array
    {

        $url = $this->endpoint . 'beers?' . http_build_query($params, '');

        return Http::get($url)->object();
    }

    /**
     * @return Jsonable
     */
    public function getBeerById(int $id): ?array
    {

        $url = $this->endpoint . 'beers/' . $id;

        return Http::get($url)->object();
    }
}
