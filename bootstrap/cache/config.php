<?php return array (
  'aad_login_setup' => 
  array (
    'tenant_name' => 'baunicef',
    'login_prefix' => 'b2clogin',
    'login_sufix' => 'onmicrosoft',
    'method' => 'oauth2',
    'version' => 'v2.0',
    'call' => 'token',
    'signup' => 'b2c_1_ropc_login',
    'user' => 'username',
    'pass' => 'password',
    'type' => 'grant_type',
    'scope' => 'scope',
    'prefix' => 'openid',
    'sufix' => 'offline_access',
    'id' => '77b96ac0-c79d-436b-acad-0ea55271d9f6',
    'client_name' => 'client_id',
    'response' => 'id_token',
    'response_sufix' => 'id_token',
  ),
  'activity_log' => 
  array (
    'visible_events' => 
    array (
      'BuscaAtivaEscolar\\Child' => 
      array (
        0 => 'alert_spawned',
        1 => 'alert_accepted',
        2 => 'alert_rejected',
        3 => 'step_updated',
        4 => 'step_assigned',
        5 => 'step_started',
        6 => 'added_comment',
        7 => 'added_attachment',
        8 => 'status_cancelled',
        9 => 'status_interrupted',
        10 => 'status_completed',
      ),
      'global' => 
      array (
        0 => 'alert_spawned',
        1 => 'alert_accepted',
        2 => 'alert_rejected',
        3 => 'step_updated',
        4 => 'step_assigned',
        5 => 'step_started',
        6 => 'added_comment',
        7 => 'added_attachment',
        8 => 'status_cancelled',
        9 => 'status_interrupted',
        10 => 'status_completed',
      ),
    ),
  ),
  'app' => 
  array (
    'name' => 'Busca Ativa Escolar',
    'env' => 'development',
    'debug' => true,
    'url' => 'http://api.busca-ativa-escolar.test/',
    'timezone' => 'America/Sao_Paulo',
    'locale' => 'pt_BR',
    'fallback_locale' => 'en',
    'key' => 'base64:LOriEWO1cXt8ZLm2xGRNErc0/4wCAfINvsMaTOb2III=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'info',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Barryvdh\\LaravelIdeHelper\\IdeHelperServiceProvider',
      23 => 'Barryvdh\\Debugbar\\ServiceProvider',
      24 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
      25 => 'Intervention\\Image\\ImageServiceProvider',
      26 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
      27 => 'Ixudra\\Curl\\CurlServiceProvider',
      28 => 'Spatie\\Fractal\\FractalServiceProvider',
      29 => 'Geocoder\\Laravel\\Providers\\GeocoderService',
      30 => 'Jenssegers\\Agent\\AgentServiceProvider',
      31 => 'BuscaAtivaEscolar\\Providers\\AppServiceProvider',
      32 => 'BuscaAtivaEscolar\\Providers\\AuthServiceProvider',
      33 => 'BuscaAtivaEscolar\\Providers\\EventServiceProvider',
      34 => 'BuscaAtivaEscolar\\Providers\\RouteServiceProvider',
      35 => 'BuscaAtivaEscolar\\Providers\\SearchServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
      'Curl' => 'Ixudra\\Curl\\Facades\\Curl',
      'Fractal' => 'Spatie\\Fractal\\FractalFacade',
      'Agent' => 'Jenssegers\\Agent\\Facades\\Agent',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'BuscaAtivaEscolar\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'memcached',
    'timeouts' => 
    array (
      'stats_platform' => 240,
      'uf_tenants' => 60,
      'uf_cities' => 60,
      'status_bar_city' => 60,
    ),
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/framework/cache',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'fdenp_test',
  ),
  'compile' => 
  array (
    'files' => 
    array (
    ),
    'providers' => 
    array (
    ),
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => '*',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'fetch' => 5,
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'busca-ativa-escolar',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '192.168.10.10',
        'port' => '3306',
        'database' => 'busca-ativa-escolar',
        'username' => 'homestead',
        'password' => 'secret',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'mysql2' => 
      array (
        'driver' => 'mysql',
        'host' => '192.168.10.10',
        'port' => '3306',
        'database' => 'busca-ativa-escolar',
        'username' => 'homestead',
        'password' => 'secret',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '192.168.10.10',
        'port' => '3306',
        'database' => 'busca-ativa-escolar',
        'username' => 'homestead',
        'password' => 'secret',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'cluster' => false,
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'driver' => 'file',
      'path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
    ),
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'symfony_request' => true,
      'mail' => true,
      'logs' => false,
      'files' => false,
      'config' => false,
      'auth' => false,
      'gate' => false,
      'session' => true,
    ),
    'options' => 
    array (
      'auth' => 
      array (
        'show_name' => false,
      ),
      'db' => 
      array (
        'with_params' => true,
        'timeline' => false,
        'backtrace' => false,
        'explain' => 
        array (
          'enabled' => false,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => true,
      ),
      'mail' => 
      array (
        'full_log' => false,
      ),
      'views' => 
      array (
        'data' => false,
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_domain' => NULL,
    'theme' => 'auto',
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/framework/laravel-excel',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/vagrant/code/busca-ativa-escolar-api/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/vagrant/code/busca-ativa-escolar-api/storage/app/public',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => 'your-key',
        'secret' => 'your-secret',
        'region' => 'your-region',
        'bucket' => 'your-bucket',
      ),
    ),
  ),
  'geocoder' => 
  array (
    'cache' => 
    array (
      'store' => NULL,
      'duration' => 9999999,
    ),
    'providers' => 
    array (
      'Geocoder\\Provider\\GoogleMaps' => 
      array (
        0 => 'pt',
        1 => 'br',
        2 => true,
        3 => 'AIzaSyBV7jc2f9d4yM-9wqw9btUP5QS2Q8iJSxo',
      ),
    ),
    'adapter' => 'Ivory\\HttpAdapter\\CurlHttpAdapter',
    'reader' => NULL,
  ),
  'ide-helper' => 
  array (
    'filename' => '_ide_helper',
    'meta_filename' => '.phpstorm.meta.php',
    'include_fluent' => false,
    'include_factory_builders' => false,
    'write_model_magic_where' => true,
    'write_model_external_builder_methods' => true,
    'write_model_relation_count_properties' => true,
    'write_eloquent_model_mixins' => false,
    'include_helpers' => false,
    'helper_files' => 
    array (
      0 => '/home/vagrant/code/busca-ativa-escolar-api/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ),
    'model_locations' => 
    array (
      0 => 'app',
    ),
    'ignored_models' => 
    array (
    ),
    'extra' => 
    array (
      'Eloquent' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'Illuminate\\Database\\Query\\Builder',
      ),
      'Session' => 
      array (
        0 => 'Illuminate\\Session\\Store',
      ),
    ),
    'magic' => 
    array (
      'Log' => 
      array (
        'debug' => 'Monolog\\Logger::addDebug',
        'info' => 'Monolog\\Logger::addInfo',
        'notice' => 'Monolog\\Logger::addNotice',
        'warning' => 'Monolog\\Logger::addWarning',
        'error' => 'Monolog\\Logger::addError',
        'critical' => 'Monolog\\Logger::addCritical',
        'alert' => 'Monolog\\Logger::addAlert',
        'emergency' => 'Monolog\\Logger::addEmergency',
      ),
    ),
    'interfaces' => 
    array (
    ),
    'custom_db_types' => 
    array (
    ),
    'model_camel_case_properties' => false,
    'type_overrides' => 
    array (
      'integer' => 'int',
      'boolean' => 'bool',
    ),
    'include_class_docblocks' => false,
    'force_fqn' => false,
    'additional_relation_types' => 
    array (
    ),
    'format' => 'php',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'jwt' => 
  array (
    'secret' => 'H3nvqo4B8PmvNkH7lY6d1whA4SOdk4bKIC3QzpR2btCsPf2RPAl6LToezF3qGSDN',
    'keys' => 
    array (
      'public' => NULL,
      'private' => NULL,
      'passphrase' => NULL,
    ),
    'ttl' => 60,
    'refresh_ttl' => 20160,
    'algo' => 'HS256',
    'required_claims' => 
    array (
      0 => 'iss',
      1 => 'iat',
      2 => 'exp',
      3 => 'nbf',
      4 => 'sub',
      5 => 'jti',
    ),
    'persistent_claims' => 
    array (
    ),
    'lock_subject' => true,
    'leeway' => 0,
    'blacklist_enabled' => true,
    'blacklist_grace_period' => 0,
    'decrypt_cookies' => false,
    'providers' => 
    array (
      'jwt' => 'Tymon\\JWTAuth\\Providers\\JWT\\Lcobucci',
      'auth' => 'Tymon\\JWTAuth\\Providers\\Auth\\Illuminate',
      'storage' => 'Tymon\\JWTAuth\\Providers\\Storage\\Illuminate',
    ),
  ),
  'laravel-fractal' => 
  array (
    'default_serializer' => '',
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailgun.org',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'contato@mg2.buscaativaescolar.org.br',
      'name' => 'Busca Ativa Escolar',
    ),
    'encryption' => NULL,
    'username' => 'contato@mg2.buscaativaescolar.org.br',
    'password' => 'c63ec7d2e42d9e611551377f7d0fc441-e566273b-2f64c1a2',
    'sendmail' => '/usr/sbin/sendmail -bs',
  ),
  'ms_graph' => 
  array (
    'tenant_name_gs' => 'baunicef',
    'tenant' => 'eec843f4-0425-485f-9fa5-f86adf0473b6',
    'id' => '15e1f478-e347-416d-8cf7-04e7a5e395b3',
    'secret' => 'O24t1H~_M-C0GgOThMDv4SuxCvJ-S-z5oG',
    'prefix' => 'https://login.microsoftonline.com/',
    'method' => 'oauth2',
    'version' => 'v2.0',
    'call' => 'token',
    'scope' => 'https://graph.microsoft.com/.default',
    'users' => 'https://graph.microsoft.com/v1.0/users',
    'credentials' => 'client_credentials',
    'login' => 'onmicrosoft',
    'policy' => 'DisablePasswordExpiration',
    'sign' => 'emailAddress',
  ),
  'old_excel' => 
  array (
    'cache' => 
    array (
      'enable' => true,
      'driver' => 'memory',
      'settings' => 
      array (
        'memoryCacheSize' => '32MB',
        'cacheTime' => 600,
      ),
      'memcache' => 
      array (
        'host' => 'localhost',
        'port' => 11211,
      ),
      'dir' => '/home/vagrant/code/busca-ativa-escolar-api/storage/cache',
    ),
    'properties' => 
    array (
      'creator' => 'Busca Ativa Escolar',
      'lastModifiedBy' => 'Busca Ativa Escolar',
      'title' => 'Spreadsheet',
      'description' => 'Export',
      'subject' => 'Export',
      'keywords' => 'excel, export',
      'category' => 'Excel',
      'manager' => 'Busca Ativa Escolar',
      'company' => 'Busca Ativa Escolar',
    ),
    'sheets' => 
    array (
      'pageSetup' => 
      array (
        'orientation' => 'portrait',
        'paperSize' => '9',
        'scale' => '100',
        'fitToPage' => false,
        'fitToHeight' => true,
        'fitToWidth' => true,
        'columnsToRepeatAtLeft' => 
        array (
          0 => '',
          1 => '',
        ),
        'rowsToRepeatAtTop' => 
        array (
          0 => 0,
          1 => 0,
        ),
        'horizontalCentered' => false,
        'verticalCentered' => false,
        'printArea' => NULL,
        'firstPageNumber' => NULL,
      ),
    ),
    'creator' => 'Busca Ativa Escolar',
    'csv' => 
    array (
      'delimiter' => ',',
      'enclosure' => '"',
      'line_ending' => '
',
      'use_bom' => false,
    ),
    'export' => 
    array (
      'autosize' => true,
      'autosize-method' => 'approx',
      'generate_heading_by_indices' => true,
      'merged_cell_alignment' => 'left',
      'calculate' => false,
      'includeCharts' => false,
      'sheets' => 
      array (
        'page_margin' => false,
        'nullValue' => NULL,
        'startCell' => 'A1',
        'strictNullComparison' => false,
      ),
      'store' => 
      array (
        'path' => '/home/vagrant/code/busca-ativa-escolar-api/storage/exports',
        'returnInfo' => false,
      ),
      'pdf' => 
      array (
        'driver' => 'DomPDF',
        'drivers' => 
        array (
          'DomPDF' => 
          array (
            'path' => '/home/vagrant/code/busca-ativa-escolar-api/vendor/dompdf/dompdf/',
          ),
          'tcPDF' => 
          array (
            'path' => '/home/vagrant/code/busca-ativa-escolar-api/vendor/tecnick.com/tcpdf/',
          ),
          'mPDF' => 
          array (
            'path' => '/home/vagrant/code/busca-ativa-escolar-api/vendor/mpdf/mpdf/',
          ),
        ),
      ),
    ),
    'filters' => 
    array (
      'registered' => 
      array (
        'chunk' => 'Maatwebsite\\Excel\\Filters\\ChunkReadFilter',
      ),
      'enabled' => 
      array (
      ),
    ),
    'import' => 
    array (
      'heading' => 'slugged',
      'startRow' => 12,
      'separator' => '_',
      'includeCharts' => false,
      'to_ascii' => true,
      'encoding' => 
      array (
        'input' => 'UTF-8',
        'output' => 'UTF-8',
      ),
      'calculate' => true,
      'ignoreEmpty' => false,
      'force_sheets_collection' => false,
      'dates' => 
      array (
        'enabled' => true,
        'format' => false,
        'columns' => 
        array (
        ),
      ),
      'sheets' => 
      array (
        'test' => 
        array (
          'firstname' => 'A2',
        ),
      ),
    ),
    'views' => 
    array (
      'styles' => 
      array (
        'th' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'strong' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'b' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'i' => 
        array (
          'font' => 
          array (
            'italic' => true,
            'size' => 12,
          ),
        ),
        'h1' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 24,
          ),
        ),
        'h2' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 18,
          ),
        ),
        'h3' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 13.5,
          ),
        ),
        'h4' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'h5' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 10,
          ),
        ),
        'h6' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 7.5,
          ),
        ),
        'a' => 
        array (
          'font' => 
          array (
            'underline' => true,
            'color' => 
            array (
              'argb' => 'FF0000FF',
            ),
          ),
        ),
        'hr' => 
        array (
          'borders' => 
          array (
            'bottom' => 
            array (
              'style' => 'thin',
              'color' => 
              array (
                0 => 'FF000000',
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'beanstalkd',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'search' => 
  array (
    'index_prefix' => '',
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => '4ca604864872a5065b0dbf835b53f401-e566273b-e8e84942',
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'BuscaAtivaEscolar\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'memcached',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/vagrant/code/busca-ativa-escolar-api/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
  ),
  'uploads' => 
  array (
    'allowed_mime_types' => 
    array (
      0 => 'image/gif',
      1 => 'image/jpeg',
      2 => 'image/png',
      3 => 'audio/mpeg',
      4 => 'audio/x-ms-wmv',
      5 => 'audio/webm',
      6 => 'video/msvideo',
      7 => 'video/avi',
      8 => 'video/x-msvideo',
      9 => 'video/mpeg',
      10 => 'video/x-ms-wmv',
      11 => 'video/quicktime',
      12 => 'video/3gpp',
      13 => 'video/mp4',
      14 => 'video/x-flv',
      15 => 'video/webm',
      16 => 'text/plain',
      17 => 'application/pdf',
      18 => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
      19 => 'application/vnd.ms-powerpointtd',
      20 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
      21 => 'application/rtf',
      22 => 'application/rdf',
      23 => 'application/rdf+xml',
      24 => 'application/vnd.ms-excel',
      25 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      26 => 'application/zip',
      27 => 'application/x-compressed-zip',
      28 => 'application/msword',
      29 => 'application/doc',
      30 => 'application/x-doc',
      31 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      32 => 'application/msword',
      33 => 'application/ms-word',
      34 => 'application/ms-excel',
      35 => 'application/msexcel',
      36 => 'application/vnd.ms-word',
      37 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      38 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
      39 => 'application/msexcel',
      40 => 'application/x-msexcel',
      41 => 'application/x-ms-excel',
      42 => 'application/x-excel',
      43 => 'application/x-dos_ms_excel',
      44 => 'application/xls',
      45 => 'application/x-xls',
      46 => 'application/vnd.ms-word.document.macroEnabled.12',
      47 => 'application/vnd.ms-word.template.macroEnabled.12',
      48 => 'application/vnd.ms-excel',
      49 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      50 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
      51 => 'application/vnd.ms-excel.sheet.macroEnabled.12',
      52 => 'application/vnd.ms-excel.template.macroEnabled.12',
      53 => 'application/vnd.ms-excel.addin.macroEnabled.12',
      54 => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
      55 => 'application/vnd.ms-powerpoint',
      56 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
      57 => 'application/vnd.openxmlformats-officedocument.presentationml.template',
      58 => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
      59 => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
      60 => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
      61 => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
      62 => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
      63 => '',
    ),
    'forbidden_extensions' => 
    array (
      0 => 'html',
      1 => 'php',
      2 => 'htm',
      3 => 'exe',
      4 => 'dmg',
      5 => 'bat',
      6 => 'sh',
      7 => 'php5',
      8 => 'asp',
      9 => 'js',
      10 => 'pkg',
      11 => 'bin',
      12 => 'pl',
      13 => 'py',
      14 => 'rb',
      15 => 'cmd',
      16 => 'bat',
      17 => 'com',
      18 => 'php3',
      19 => 'aspx',
      20 => 'aspm',
      21 => 'tpl',
      22 => 'xps',
    ),
    'max_size' => 
    array (
      'images' => 10485760,
      'videos' => 104857600,
      'generic' => 5242880,
    ),
  ),
  'user_type_permissions' => 
  array (
    'superuser' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'reports.tenants',
      3 => 'reports.signups',
      4 => 'users.view',
      5 => 'users.manage',
      6 => 'users.export',
      7 => 'tenants.manage',
      8 => 'tenants.view',
      9 => 'tenants.activity',
      10 => 'tenants.contact_info',
      11 => 'tenants.export',
      12 => 'tenants.export_signups',
      13 => 'ufs.view',
      14 => 'ufs.manage',
      15 => 'ufs.contact_info',
      16 => 'developer_tools',
      17 => 'maintenance',
      18 => 'update.yourself',
    ),
    'gestor_nacional' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'reports.tenants',
      3 => 'reports.signups',
      4 => 'cases.map',
      5 => 'users.view',
      6 => 'users.manage',
      7 => 'users.export',
      8 => 'tenants.manage',
      9 => 'tenants.view',
      10 => 'tenants.activity',
      11 => 'tenants.contact_info',
      12 => 'tenants.export',
      13 => 'tenants.export_signups',
      14 => 'ufs.view',
      15 => 'ufs.manage',
      16 => 'ufs.contact_info',
      17 => 'cities.selo_reports',
      18 => 'users.reports',
      19 => 'update.yourself',
    ),
    'comite_nacional' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'reports.tenants',
      3 => 'reports.signups',
      4 => 'cases.map',
      5 => 'tenants.view',
      6 => 'ufs.view',
      7 => 'update.yourself',
    ),
    'gestor_politico' => 
    array (
      0 => 'reports.view',
      1 => 'cases.map',
      2 => 'users.view',
      3 => 'users.manage',
      4 => 'users.export',
      5 => 'alerts.spawn',
      6 => 'settings.manage',
      7 => 'settings.educacenso',
      8 => 'preferences',
      9 => 'notifications',
      10 => 'groups.manage',
      11 => 'update.yourself',
    ),
    'gestor_estadual' => 
    array (
      0 => 'reports.view',
      1 => 'cases.map',
      2 => 'cases.export.uf',
      3 => 'users.view',
      4 => 'users.manage',
      5 => 'users.export',
      6 => 'tenants.view',
      7 => 'tenants.activity',
      8 => 'tenants.contact_info',
      9 => 'tenants.export',
      10 => 'groups.manage',
      11 => 'preferences',
      12 => 'update.yourself',
    ),
    'coordenador_estadual' => 
    array (
      0 => 'cases.manage',
      1 => 'cases.assign',
      2 => 'reports.view',
      3 => 'cases.map',
      4 => 'cases.export.uf',
      5 => 'users.view',
      6 => 'users.manage',
      7 => 'users.export',
      8 => 'tenants.view',
      9 => 'tenants.activity',
      10 => 'tenants.contact_info',
      11 => 'tenants.export',
      12 => 'groups.manage',
      13 => 'preferences',
      14 => 'cases.view',
      15 => 'cases.step.alerta',
      16 => 'cases.step.pesquisa',
      17 => 'cases.step.analise_tecnica',
      18 => 'cases.step.gestao_do_caso',
      19 => 'cases.step.rematricula',
      20 => 'cases.step.1a_observacao',
      21 => 'cases.step.2a_observacao',
      22 => 'cases.step.3a_observacao',
      23 => 'cases.step.4a_observacao',
      24 => 'school.list',
      25 => 'update.yourself',
    ),
    'comite_estadual' => 
    array (
      0 => 'reports.view',
      1 => 'cases.map',
      2 => 'tenants.view',
      3 => 'tenants.contact_info',
      4 => 'preferences',
      5 => 'update.yourself',
    ),
    'coordenador_operacional' => 
    array (
      0 => 'reports.view',
      1 => 'users.view',
      2 => 'users.manage',
      3 => 'users.export',
      4 => 'cases.view',
      5 => 'cases.manage',
      6 => 'cases.cancel',
      7 => 'cases.assign',
      8 => 'cases.reopen',
      9 => 'cases.request-transfer',
      10 => 'cases.export.all',
      11 => 'requests.view',
      12 => 'requests.reject',
      13 => 'cases.transfer',
      14 => 'cases.map',
      15 => 'cases.step.alerta',
      16 => 'cases.step.pesquisa',
      17 => 'cases.step.analise_tecnica',
      18 => 'cases.step.gestao_do_caso',
      19 => 'cases.step.rematricula',
      20 => 'cases.step.1a_observacao',
      21 => 'cases.step.2a_observacao',
      22 => 'cases.step.3a_observacao',
      23 => 'cases.step.4a_observacao',
      24 => 'alerts.pending',
      25 => 'alerts.spawn',
      26 => 'settings.manage',
      27 => 'settings.educacenso',
      28 => 'tenant.complete_setup',
      29 => 'preferences',
      30 => 'notifications',
      31 => 'groups.manage',
      32 => 'school.list',
      33 => 'update.yourself',
    ),
    'supervisor_institucional' => 
    array (
      0 => 'reports.view',
      1 => 'users.view',
      2 => 'users.manage',
      3 => 'cases.view',
      4 => 'cases.manage',
      5 => 'cases.cancel',
      6 => 'cases.assign',
      7 => 'cases.request-reopen',
      8 => 'cases.map',
      9 => 'cases.step.alerta',
      10 => 'cases.export.all',
      11 => 'requests.view',
      12 => 'cases.step.pesquisa',
      13 => 'cases.step.analise_tecnica',
      14 => 'cases.step.gestao_do_caso',
      15 => 'cases.step.rematricula',
      16 => 'cases.step.1a_observacao',
      17 => 'cases.step.2a_observacao',
      18 => 'cases.step.3a_observacao',
      19 => 'cases.step.4a_observacao',
      20 => 'alerts.pending',
      21 => 'alerts.spawn',
      22 => 'preferences',
      23 => 'notifications',
      24 => 'settings.educacenso',
      25 => 'school.list',
      26 => 'update.yourself',
    ),
    'supervisor_estadual' => 
    array (
      0 => 'reports.view',
      1 => 'users.view',
      2 => 'users.manage',
      3 => 'users.export',
      4 => 'cases.view',
      5 => 'cases.manage',
      6 => 'cases.cancel',
      7 => 'cases.assign',
      8 => 'cases.reopen',
      9 => 'cases.map',
      10 => 'cases.export.uf',
      11 => 'cases.step.alerta',
      12 => 'cases.step.pesquisa',
      13 => 'cases.step.analise_tecnica',
      14 => 'cases.step.gestao_do_caso',
      15 => 'cases.step.rematricula',
      16 => 'cases.step.1a_observacao',
      17 => 'cases.step.2a_observacao',
      18 => 'cases.step.3a_observacao',
      19 => 'cases.step.4a_observacao',
      20 => 'tenants.view',
      21 => 'tenants.activity',
      22 => 'tenants.contact_info',
      23 => 'preferences',
      24 => 'notifications',
      25 => 'school.list',
      26 => 'update.yourself',
    ),
    'tecnico_verificador' => 
    array (
      0 => 'reports.view',
      1 => 'cases.view',
      2 => 'cases.manage',
      3 => 'cases.map',
      4 => 'cases.export.all',
      5 => 'cases.step.alerta',
      6 => 'cases.step.pesquisa',
      7 => 'cases.step.analise_tecnica',
      8 => 'alerts.spawn',
      9 => 'preferences',
      10 => 'notifications',
      11 => 'update.yourself',
    ),
    'agente_comunitario' => 
    array (
      0 => 'alerts.spawn',
      1 => 'update.yourself',
    ),
    'visitante_nacional_1' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'users.view',
      3 => 'cases.view',
      4 => 'cases.step.alerta',
      5 => 'cases.step.pesquisa',
      6 => 'cases.step.analise_tecnica',
      7 => 'cases.step.gestao_do_caso',
      8 => 'cases.step.rematricula',
      9 => 'cases.step.1a_observacao',
      10 => 'cases.step.2a_observacao',
      11 => 'cases.step.3a_observacao',
      12 => 'cases.step.4a_observacao',
      13 => 'update.yourself',
    ),
    'visitante_nacional_2' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'users.view',
      3 => 'update.yourself',
    ),
    'visitante_nacional_3' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'update.yourself',
    ),
    'visitante_nacional_4' => 
    array (
      0 => 'reports.view',
      1 => 'cases.view',
      2 => 'cases.step.alerta',
      3 => 'cases.step.pesquisa',
      4 => 'cases.step.analise_tecnica',
      5 => 'cases.step.gestao_do_caso',
      6 => 'cases.step.rematricula',
      7 => 'cases.step.1a_observacao',
      8 => 'cases.step.2a_observacao',
      9 => 'cases.step.3a_observacao',
      10 => 'cases.step.4a_observacao',
      11 => 'update.yourself',
    ),
    'visitante_estadual_1' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'users.view',
      3 => 'users.export',
      4 => 'update.yourself',
    ),
    'visitante_estadual_2' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'users.view',
      3 => 'users.export',
      4 => 'update.yourself',
    ),
    'visitante_estadual_3' => 
    array (
      0 => 'reports.view',
      1 => 'reports.ufs',
      2 => 'users.view',
      3 => 'users.export',
      4 => 'update.yourself',
    ),
    'visitante_estadual_4' => 
    array (
      0 => 'reports.view',
      1 => 'users.view',
      2 => 'users.export',
      3 => 'update.yourself',
    ),
    'can_manage_types' => 
    array (
      'superuser' => 
      array (
        0 => 'superuser',
        1 => 'gestor_nacional',
        2 => 'coordenador_operacional',
        3 => 'gestor_politico',
        4 => 'supervisor_institucional',
        5 => 'tecnico_verificador',
        6 => 'agente_comunitario',
        7 => 'gestor_estadual',
        8 => 'coordenador_estadual',
        9 => 'supervisor_estadual',
        10 => 'comite_nacional',
        11 => 'comite_estadual',
        12 => 'perfil_visitante',
        13 => 'visitante_nacional_1',
        14 => 'visitante_nacional_2',
        15 => 'visitante_nacional_3',
        16 => 'visitante_nacional_4',
        17 => 'visitante_estadual_1',
        18 => 'visitante_estadual_2',
        19 => 'visitante_estadual_3',
        20 => 'visitante_estadual_4',
      ),
      'gestor_nacional' => 
      array (
        0 => 'gestor_nacional',
        1 => 'coordenador_operacional',
        2 => 'gestor_politico',
        3 => 'supervisor_institucional',
        4 => 'tecnico_verificador',
        5 => 'agente_comunitario',
        6 => 'gestor_estadual',
        7 => 'coordenador_estadual',
        8 => 'supervisor_estadual',
        9 => 'comite_nacional',
        10 => 'comite_estadual',
        11 => 'perfil_visitante',
        12 => 'visitante_nacional_1',
        13 => 'visitante_nacional_2',
        14 => 'visitante_nacional_3',
        15 => 'visitante_nacional_4',
        16 => 'visitante_estadual_1',
        17 => 'visitante_estadual_2',
        18 => 'visitante_estadual_3',
        19 => 'visitante_estadual_4',
      ),
      'gestor_estadual' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'supervisor_estadual',
        3 => 'comite_estadual',
      ),
      'coordenador_estadual' => 
      array (
        0 => 'coordenador_estadual',
        1 => 'supervisor_estadual',
        2 => 'comite_estadual',
      ),
      'supervisor_estadual' => 
      array (
        0 => 'supervisor_estadual',
      ),
      'coordenador_operacional' => 
      array (
        0 => 'coordenador_operacional',
        1 => 'gestor_politico',
        2 => 'supervisor_institucional',
        3 => 'tecnico_verificador',
        4 => 'agente_comunitario',
      ),
      'gestor_politico' => 
      array (
        0 => 'coordenador_operacional',
        1 => 'gestor_politico',
        2 => 'supervisor_institucional',
        3 => 'tecnico_verificador',
        4 => 'agente_comunitario',
      ),
      'supervisor_institucional' => 
      array (
        0 => 'supervisor_institucional',
        1 => 'tecnico_verificador',
        2 => 'agente_comunitario',
      ),
      'tecnico_verificador' => 
      array (
        0 => 'tecnico_verificador',
      ),
      'agente_comunitario' => 
      array (
        0 => 'agente_comunitario',
      ),
    ),
    'can_filter_types' => 
    array (
      'superuser' => 
      array (
        0 => 'superuser',
        1 => 'gestor_nacional',
        2 => 'coordenador_operacional',
        3 => 'gestor_politico',
        4 => 'supervisor_institucional',
        5 => 'tecnico_verificador',
        6 => 'agente_comunitario',
        7 => 'gestor_estadual',
        8 => 'coordenador_estadual',
        9 => 'supervisor_estadual',
        10 => 'comite_nacional',
        11 => 'comite_estadual',
        12 => 'visitante_nacional',
        13 => 'visitante_estadual',
      ),
      'gestor_nacional' => 
      array (
        0 => 'superuser',
        1 => 'gestor_nacional',
        2 => 'coordenador_operacional',
        3 => 'gestor_politico',
        4 => 'supervisor_institucional',
        5 => 'tecnico_verificador',
        6 => 'agente_comunitario',
        7 => 'gestor_estadual',
        8 => 'coordenador_estadual',
        9 => 'supervisor_estadual',
        10 => 'comite_nacional',
        11 => 'comite_estadual',
        12 => 'visitante_nacional',
        13 => 'visitante_estadual',
      ),
      'gestor_estadual' => 
      array (
        0 => 'gestor_estadual',
        1 => 'supervisor_estadual',
        2 => 'comite_estadual',
      ),
      'coordenador_estadual' => 
      array (
        0 => 'gestor_estadual',
        1 => 'supervisor_estadual',
        2 => 'comite_estadual',
      ),
      'supervisor_estadual' => 
      array (
        0 => 'gestor_estadual',
        1 => 'supervisor_estadual',
      ),
      'coordenador_operacional' => 
      array (
        0 => 'coordenador_operacional',
        1 => 'gestor_politico',
        2 => 'supervisor_institucional',
        3 => 'tecnico_verificador',
        4 => 'agente_comunitario',
      ),
      'gestor_politico' => 
      array (
        0 => 'coordenador_operacional',
        1 => 'gestor_politico',
        2 => 'supervisor_institucional',
        3 => 'tecnico_verificador',
        4 => 'agente_comunitario',
      ),
      'supervisor_institucional' => 
      array (
        0 => 'coordenador_operacional',
        1 => 'gestor_politico',
        2 => 'supervisor_institucional',
        3 => 'tecnico_verificador',
        4 => 'agente_comunitario',
      ),
      'tecnico_verificador' => 
      array (
        0 => 'coordenador_operacional',
        1 => 'gestor_politico',
        2 => 'supervisor_institucional',
        3 => 'tecnico_verificador',
        4 => 'agente_comunitario',
      ),
      'agente_comunitario' => 
      array (
      ),
      'visitante_nacional_1' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_nacional_2' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_nacional_3' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_nacional_4' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_estadual_1' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_estadual_2' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_estadual_3' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
      'visitante_estadual_4' => 
      array (
        0 => 'gestor_estadual',
        1 => 'coordenador_estadual',
        2 => 'gestor_politico',
        3 => 'coordenador_operacional',
      ),
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/vagrant/code/busca-ativa-escolar-api/resources/views',
    ),
    'compiled' => '/home/vagrant/code/busca-ativa-escolar-api/storage/framework/views',
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
    ),
    'send_logs_as_events' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 94,
  ),
  'fractal' => 
  array (
    'default_serializer' => '',
    'default_paginator' => '',
    'base_url' => NULL,
    'fractal_class' => 'Spatie\\Fractal\\Fractal',
    'auto_includes' => 
    array (
      'enabled' => true,
      'request_key' => 'include',
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
