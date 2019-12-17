<?php return array (
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
    'env' => 'local',
    'debug' => true,
    'url' => 'http://api.busca-ativa-escolar.test',
    'timezone' => 'America/Sao_Paulo',
    'locale' => 'pt_BR',
    'fallback_locale' => 'en',
    'key' => 'base64:rwje8nLR13p0lLEee2d9z+TwtN6fHaTT2MEWezmEn14=',
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
      26 => 'Tymon\\JWTAuth\\Providers\\JWTAuthServiceProvider',
      27 => 'Ixudra\\Curl\\CurlServiceProvider',
      28 => 'Spatie\\Fractal\\FractalServiceProvider',
      29 => 'Barryvdh\\Cors\\ServiceProvider',
      30 => 'Geocoder\\Laravel\\Providers\\GeocoderService',
      31 => 'Rap2hpoutre\\LaravelLogViewer\\LaravelLogViewerServiceProvider',
      32 => 'Jenssegers\\Agent\\AgentServiceProvider',
      33 => 'BuscaAtivaEscolar\\Providers\\AppServiceProvider',
      34 => 'BuscaAtivaEscolar\\Providers\\AuthServiceProvider',
      35 => 'BuscaAtivaEscolar\\Providers\\EventServiceProvider',
      36 => 'BuscaAtivaEscolar\\Providers\\RouteServiceProvider',
      37 => 'BuscaAtivaEscolar\\Providers\\SearchServiceProvider',
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
    'supportsCredentials' => false,
    'allowedOrigins' => 
    array (
      0 => '*',
    ),
    'allowedHeaders' => 
    array (
      0 => '*',
    ),
    'allowedMethods' => 
    array (
      0 => '*',
    ),
    'exposedHeaders' => 
    array (
    ),
    'maxAge' => 0,
    'hosts' => 
    array (
    ),
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
        'host' => '127.0.0.1',
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
        'host' => '127.0.0.1',
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
  ),
  'excel' => 
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
    'cache-duraction' => 999999999,
    'providers' => 
    array (
      'Geocoder\\Provider\\GoogleMaps' => 
      array (
        0 => 'pt',
        1 => 'br',
        2 => true,
        3 => 'AIzaSyBruakwQEe3lKtz5r2D6Tqe64x5fNwLpY0',
      ),
    ),
    'adapter' => 'Ivory\\HttpAdapter\\CurlHttpAdapter',
  ),
  'ide-helper' => 
  array (
    'filename' => '_ide_helper',
    'format' => 'php',
    'meta_filename' => '.phpstorm.meta.php',
    'include_fluent' => false,
    'write_model_magic_where' => true,
    'include_helpers' => false,
    'helper_files' => 
    array (
      0 => '/home/vagrant/code/busca-ativa-escolar-api/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ),
    'model_locations' => 
    array (
      0 => 'app',
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
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'jwt' => 
  array (
    'secret' => 'R5VTWf9L868ySAI3pdpVmofxh746Tkfd',
    'ttl' => 1440,
    'refresh_ttl' => 20160,
    'algo' => 'HS256',
    'user' => 'BuscaAtivaEscolar\\User',
    'identifier' => 'id',
    'required_claims' => 
    array (
      0 => 'iss',
      1 => 'iat',
      2 => 'exp',
      3 => 'nbf',
      4 => 'sub',
      5 => 'jti',
    ),
    'blacklist_enabled' => true,
    'providers' => 
    array (
      'user' => 'Tymon\\JWTAuth\\Providers\\User\\EloquentUserAdapter',
      'jwt' => 'Tymon\\JWTAuth\\Providers\\JWT\\NamshiAdapter',
      'auth' => 'Tymon\\JWTAuth\\Providers\\Auth\\IlluminateAuthAdapter',
      'storage' => 'Tymon\\JWTAuth\\Providers\\Storage\\IlluminateCacheAdapter',
    ),
  ),
  'laravel-fractal' => 
  array (
    'default_serializer' => '',
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailgun.org',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'jj',
      'name' => 'Busca Ativa Escolar',
    ),
    'encryption' => NULL,
    'username' => 'jj',
    'password' => 'jj',
    'sendmail' => '/usr/sbin/sendmail -bs',
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
      'secret' => 'jj',
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
    ),
    'gestor_estadual' => 
    array (
      0 => 'reports.view',
      1 => 'cases.map',
      2 => 'users.view',
      3 => 'users.manage',
      4 => 'users.export',
      5 => 'tenants.view',
      6 => 'tenants.activity',
      7 => 'tenants.contact_info',
      8 => 'tenants.export',
      9 => 'groups.manage',
      10 => 'preferences',
    ),
    'coordenador_estadual' => 
    array (
      0 => 'cases.manage',
      1 => 'cases.assign',
      2 => 'reports.view',
      3 => 'cases.map',
      4 => 'users.view',
      5 => 'users.manage',
      6 => 'users.export',
      7 => 'tenants.view',
      8 => 'tenants.activity',
      9 => 'tenants.contact_info',
      10 => 'tenants.export',
      11 => 'groups.manage',
      12 => 'preferences',
      13 => 'cases.view',
      14 => 'cases.step.alerta',
      15 => 'cases.step.pesquisa',
      16 => 'cases.step.analise_tecnica',
      17 => 'cases.step.gestao_do_caso',
      18 => 'cases.step.rematricula',
      19 => 'cases.step.1a_observacao',
      20 => 'cases.step.2a_observacao',
      21 => 'cases.step.3a_observacao',
      22 => 'cases.step.4a_observacao',
    ),
    'comite_estadual' => 
    array (
      0 => 'reports.view',
      1 => 'cases.map',
      2 => 'tenants.view',
      3 => 'tenants.contact_info',
      4 => 'preferences',
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
      9 => 'cases.map',
      10 => 'cases.step.alerta',
      11 => 'cases.step.pesquisa',
      12 => 'cases.step.analise_tecnica',
      13 => 'cases.step.gestao_do_caso',
      14 => 'cases.step.rematricula',
      15 => 'cases.step.1a_observacao',
      16 => 'cases.step.2a_observacao',
      17 => 'cases.step.3a_observacao',
      18 => 'cases.step.4a_observacao',
      19 => 'alerts.pending',
      20 => 'alerts.spawn',
      21 => 'settings.manage',
      22 => 'settings.educacenso',
      23 => 'tenant.complete_setup',
      24 => 'preferences',
      25 => 'notifications',
      26 => 'groups.manage',
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
      7 => 'cases.reopen',
      8 => 'cases.map',
      9 => 'cases.step.alerta',
      10 => 'cases.step.pesquisa',
      11 => 'cases.step.analise_tecnica',
      12 => 'cases.step.gestao_do_caso',
      13 => 'cases.step.rematricula',
      14 => 'cases.step.1a_observacao',
      15 => 'cases.step.2a_observacao',
      16 => 'cases.step.3a_observacao',
      17 => 'cases.step.4a_observacao',
      18 => 'alerts.pending',
      19 => 'alerts.spawn',
      20 => 'preferences',
      21 => 'notifications',
      22 => 'settings.educacenso',
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
      10 => 'cases.step.alerta',
      11 => 'cases.step.pesquisa',
      12 => 'cases.step.analise_tecnica',
      13 => 'cases.step.gestao_do_caso',
      14 => 'cases.step.rematricula',
      15 => 'cases.step.1a_observacao',
      16 => 'cases.step.2a_observacao',
      17 => 'cases.step.3a_observacao',
      18 => 'cases.step.4a_observacao',
      19 => 'tenants.view',
      20 => 'tenants.activity',
      21 => 'tenants.contact_info',
      22 => 'preferences',
      23 => 'notifications',
    ),
    'tecnico_verificador' => 
    array (
      0 => 'reports.view',
      1 => 'cases.view',
      2 => 'cases.manage',
      3 => 'cases.map',
      4 => 'cases.step.alerta',
      5 => 'cases.step.pesquisa',
      6 => 'cases.step.analise_tecnica',
      7 => 'alerts.spawn',
      8 => 'preferences',
      9 => 'notifications',
    ),
    'agente_comunitario' => 
    array (
      0 => 'alerts.spawn',
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
        0 => 'tecnico_verificador',
        1 => 'agente_comunitario',
      ),
      'tecnico_verificador' => 
      array (
      ),
      'agente_comunitario' => 
      array (
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
);
