<?php
return [
    'endpoint' => env('PUNK_ENDPOINT'),
    'per_page' => env('PER_PAGE'),
    'filters' => explode(',', env('PUNK_PARAMS', []))
];
