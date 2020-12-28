<?php
return [
  'tenant_name_gs' => env('AAD_TENANT_NAME'),
  'tenant' => env('TENANT_ID_GS'),
  'id' => env('APP_ID'),
  'secret' => env('APP_SECRET'),
  'prefix' => env('TOKEN_ENDPOINT_PREFIX'),
  'method' => env('METHOD'),
  'version' => env('VERSION'),
  'call' => env('CALL'),
  'scope' => env('MS_GRAPH_SCOPE'),
  'users' => env('MS_GRAPH_USERS'),
  'credentials' => env('TYPE_CLIENT'),
  'login' => env('LOGIN_SUFIX'),
  'policy' => env('GRAPHP'),
  'sign' => env('GRAPHS')
];
