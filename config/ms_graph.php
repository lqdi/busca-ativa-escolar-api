<?php
return [
  'id' => env('APP_ID'),
  'secret' => env('APP_SECRET'),
  'prefix' => env('TOKEN_ENDPOINT_PREFIX'),
  'tenant' => env('TENANT_ID'),
  'method' => env('METHOD'),
  'version' => env('VERSION'),
  'call' => env('CALL'),
  'scope' => env('MS_GRAPH_SCOPE'),
  'users' => env('MS_GRAPH_USERS'),
  'credentials' => env('TYPE_CLIENT'),
  'tenant_name' => env('TENANT_NAME'),
  'login' => env('LOGIN_SUFIX'),
  'policy' => env('GRAPHP'),
  'sign' => env('GRAPHS')
];
