<?php

return [

    'domains' => env('SITE_DOMAINS', null),

    'subdomain' => [
        'front'  => env('SUBDOMAIN_FRONT', null),
        'agency' => env('SUBDOMAIN_AGENCY', null),
    ],
    
];