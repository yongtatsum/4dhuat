<?php
return array(
    'enable' => Config::get('app.debug'),

    'prefix' => 'api-docs',

    'paths' => 'app',
    'output' => 'docs',
    'exclude' => null,
    'default-base-path' => 'https://www.fourdhuat.com:443/api',
//  'default-base-path'=>'http://104.198.93.242/api',
    'default-api-version' => null,
    'default-swagger-version' => null,
    'api-doc-template' => null,
    'suffix' => '.{format}',

    'title' => 'Swagger UI'
);