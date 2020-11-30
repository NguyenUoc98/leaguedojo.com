<?php return array (
  'admin' => 
  array (
    'operation_log' => 
    array (
      'enable' => false,
      'allowed_methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'DELETE',
        5 => 'CONNECT',
        6 => 'OPTIONS',
        7 => 'TRACE',
        8 => 'PATCH',
      ),
      'except' => 
      array (
        0 => 'admin/operation-logs*',
        1 => 'admin/logs*',
        2 => 'admin/bread*',
        3 => 'admin/menu*',
        4 => 'admin/database*',
        5 => 'admin/compass*',
        6 => 'admin/settings*',
        7 => 'broadcasting*',
        8 => 'admin/voyager-assets*',
      ),
    ),
  ),
  'apidoc' => 
  array (
    'type' => 'static',
    'output_folder' => 'public/docs',
    'laravel' => 
    array (
      'autoload' => false,
      'docs_url' => '/doc',
      'middleware' => 
      array (
      ),
    ),
    'router' => 'laravel',
    'storage' => 'local',
    'base_url' => NULL,
    'postman' => 
    array (
      'enabled' => true,
      'name' => NULL,
      'description' => NULL,
      'auth' => NULL,
    ),
    'routes' => 
    array (
      0 => 
      array (
        'match' => 
        array (
          'domains' => 
          array (
            0 => '*',
          ),
          'prefixes' => 
          array (
            0 => '*',
          ),
          'versions' => 
          array (
            0 => 'v1',
          ),
        ),
        'include' => 
        array (
        ),
        'exclude' => 
        array (
        ),
        'apply' => 
        array (
          'headers' => 
          array (
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
          ),
          'response_calls' => 
          array (
            'methods' => 
            array (
              0 => 'GET',
            ),
            'config' => 
            array (
              'app.env' => 'documentation',
              'app.debug' => false,
            ),
            'cookies' => 
            array (
            ),
            'queryParams' => 
            array (
            ),
            'bodyParams' => 
            array (
            ),
          ),
        ),
      ),
    ),
    'strategies' => 
    array (
      'metadata' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Metadata\\GetFromDocBlocks',
      ),
      'urlParameters' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamTag',
      ),
      'queryParameters' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamTag',
      ),
      'headers' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\RequestHeaders\\GetFromRouteRules',
      ),
      'bodyParameters' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamTag',
      ),
      'responses' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseTransformerTags',
        1 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseResponseTag',
        2 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseResponseFileTag',
        3 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseApiResourceTags',
        4 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls',
      ),
    ),
    'logo' => '/var/www/leaguedojo.com/public/img/core-img/logoAPIDoc.png',
    'default_group' => 'Khác',
    'example_languages' => 
    array (
      0 => 'bash',
      1 => 'javascript',
    ),
    'fractal' => 
    array (
      'serializer' => NULL,
    ),
    'faker_seed' => NULL,
    'routeMatcher' => 'Mpociot\\ApiDoc\\Matching\\RouteMatcher',
  ),
  'app' => 
  array (
    'name' => 'LeagueDojo',
    'env' => 'production',
    'debug' => true,
    'url' => 'https://leaguedojo.com',
    'asset_url' => NULL,
    'timezone' => 'Asia/Ho_Chi_Minh',
    'locale' => 'vi',
    'fallback_locale' => 'en',
    'faker_locale' => 'vi_VN',
    'key' => 'base64:Y2tDYDkcKJy2iD1/N9eo3fYYMppuG2dvdNB2xxJE6Ss=',
    'cipher' => 'AES-256-CBC',
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
      22 => 'CyrildeWit\\EloquentViewable\\EloquentViewableServiceProvider',
      23 => 'Alaouy\\Youtube\\YoutubeServiceProvider',
      24 => 'Intervention\\Image\\ImageServiceProvider',
      25 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
      26 => 'Intervention\\Image\\ImageServiceProvider',
      27 => 'Mpociot\\ApiDoc\\ApiDocGeneratorServiceProvider',
      28 => 'App\\Providers\\AppServiceProvider',
      29 => 'App\\Providers\\AuthServiceProvider',
      30 => 'App\\Providers\\BroadcastServiceProvider',
      31 => 'App\\Providers\\EventServiceProvider',
      32 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
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
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Youtube' => 'Alaouy\\Youtube\\Facades\\Youtube',
      'TimeYoutube' => 'App\\Facades\\TimeYoutubeFacade',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'DNS1D' => 'Milon\\Barcode\\Facades\\DNS1DFacade',
      'DNS2D' => 'Milon\\Barcode\\Facades\\DNS2DFacade',
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
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'pusher',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '249890bf51a69cc1c117',
        'secret' => 'aaf5c52e6176a4a4bbf9',
        'app_id' => '879823',
        'options' => 
        array (
          'cluster' => 'ap1',
          'useTLS' => true,
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
    'default' => 'file',
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
        'path' => '/var/www/leaguedojo.com/storage/framework/cache/data',
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
        'connection' => 'cache',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
    ),
    'prefix' => 'leaguedojo_cache',
  ),
  'comments' => 
  array (
    'model' => 'Laravelista\\Comments\\Comment',
    'permissions' => 
    array (
      'create-comment' => 'App\\Policies\\CommentPolicy@create',
      'delete-comment' => 'App\\Policies\\CommentPolicy@delete',
      'edit-comment' => 'App\\Policies\\CommentPolicy@update',
      'reply-to-comment' => 'App\\Policies\\CommentPolicy@reply',
      'like-comment' => 'App\\Policies\\CommentPolicy@like',
      'unlike-comment' => 'App\\Policies\\CommentPolicy@unLike',
    ),
    'controller' => 'App\\Http\\Controllers\\Site\\CommentController',
    'routes' => true,
    'approval_required' => false,
    'guest_commenting' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'leaguedojo',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'leaguedojo',
        'username' => 'padmin',
        'password' => 'uocnv1998',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'leaguedojo',
        'username' => 'padmin',
        'password' => 'uocnv1998',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'leaguedojo',
        'username' => 'padmin',
        'password' => 'uocnv1998',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'leaguedojo_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
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
    ),
    'imports' => 
    array (
      'read_only' => true,
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
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => '/tmp',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
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
        'root' => '/var/www/leaguedojo.com/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/leaguedojo.com/storage/app/public',
        'url' => 'https://leaguedojo.com/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'hooks' => 
  array (
    'enabled' => true,
  ),
  'image' => 
  array (
    'driver' => 'gd',
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
          0 => 'daily',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/leaguedojo.com/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/leaguedojo.com/storage/logs/laravel.log',
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
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => '465',
    'from' => 
    array (
      'address' => 'karateleaguedojo@gmail.com',
      'name' => 'Karate League Dojo',
    ),
    'encryption' => 'ssl',
    'username' => 'karateleaguedojo@gmail.com',
    'password' => '0942332444',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/leaguedojo.com/resources/views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'payment' => 
  array (
    'partnerCode' => 'MOMORNJP20200518',
    'accessKey' => 'b2UbojK1aF3JKcFD',
    'secretKey' => 'f0gs568JSsW34BFhOjkAVW1hOZ8bRzlI',
  ),
  'queue' => 
  array (
    'default' => 'sync',
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
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
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
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/leaguedojo.com/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'leaguedojo_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/leaguedojo.com/resources/views',
    ),
    'compiled' => '/var/www/leaguedojo.com/storage/framework/views',
  ),
  'voyager' => 
  array (
    'user' => 
    array (
      'add_default_role_on_register' => true,
      'default_role' => 'user',
      'default_avatar' => 'users/default.png',
      'redirect' => '/admin',
    ),
    'controllers' => 
    array (
      'namespace' => 'App\\Http\\Controllers\\Admin\\Voyager',
    ),
    'models' => 
    array (
    ),
    'storage' => 
    array (
      'disk' => 'public',
    ),
    'hidden_files' => false,
    'database' => 
    array (
      'tables' => 
      array (
        'hidden' => 
        array (
          0 => 'migrations',
          1 => 'data_rows',
          2 => 'data_types',
          3 => 'menu_items',
          4 => 'password_resets',
          5 => 'permission_role',
          6 => 'settings',
        ),
      ),
      'autoload_migrations' => true,
    ),
    'multilingual' => 
    array (
      'enabled' => false,
      'default' => 'vi',
      'locales' => 
      array (
        0 => 'vi',
        1 => 'en',
      ),
    ),
    'dashboard' => 
    array (
      'navbar_items' => 
      array (
        'voyager::generic.profile' => 
        array (
          'route' => 'voyager.profile',
          'classes' => 'class-full-of-rum',
          'icon_class' => 'voyager-person',
        ),
        'voyager::generic.home' => 
        array (
          'route' => '/',
          'icon_class' => 'voyager-home',
          'target_blank' => true,
        ),
        'voyager::generic.logout' => 
        array (
          'route' => 'voyager.logout',
          'icon_class' => 'voyager-power',
        ),
      ),
      'widgets' => 
      array (
        0 => 'App\\Widgets\\PostDimmer',
        1 => 'App\\Widgets\\VideoDimmer',
        2 => 'App\\Widgets\\DocumentDimmer',
        3 => 'App\\Widgets\\UserDimmer',
        4 => 'App\\Widgets\\StudentDimmer',
        5 => 'App\\Widgets\\WorkoutDimmer',
        6 => 'App\\Widgets\\TransferDimmer',
        7 => 'App\\Widgets\\AttendDimmer',
      ),
    ),
    'bread' => 
    array (
      'add_menu_item' => true,
      'default_menu' => 'admin',
      'add_permission' => true,
      'default_role' => 'admin',
    ),
    'primary_color' => '#4caf50',
    'show_dev_tips' => true,
    'additional_css' => 
    array (
      0 => 'css/custom.css',
      1 => 'css/custom-control.css',
      2 => 'css/home/font-awesome.min.css',
    ),
    'additional_js' => 
    array (
      0 => 'js/axios.min.js',
      1 => '/js/jquery.PrintArea.js',
      2 => '/js/dom-to-image.min.js',
    ),
    'googlemaps' => 
    array (
      'key' => '',
      'center' => 
      array (
        'lat' => '32.715738',
        'lng' => '-117.161084',
      ),
      'zoom' => 11,
    ),
    'settings' => 
    array (
      'cache' => false,
    ),
    'compass_in_production' => true,
    'media' => 
    array (
      'allowed_mimetypes' => '*',
      'path' => '/',
      'expanded' => true,
      'show_toolbar' => true,
      'show_folders' => true,
      'allow_upload' => true,
      'allow_move' => true,
      'allow_delete' => true,
      'allow_create_folder' => true,
      'allow_rename' => true,
      'watermark' => 
      array (
        'source' => 'settings/December2019/VDBG5mCN2X2S9haYGvDN.jpg',
        'position' => 'bottom-left',
        'x' => 10,
        'y' => 10,
        'size' => 8,
      ),
    ),
  ),
  'voyager-hooks' => 
  array (
    'enabled' => true,
    'add-route' => true,
    'add-hook-menu-item' => true,
    'add-hook-permissions' => true,
    'publish-vendor-files' => true,
  ),
  'youtube' => 
  array (
    'key' => 'AIzaSyDRmM1M2OISorppX37xV5BmixCmsi2vluY',
  ),
  'laravel-widgets' => 
  array (
    'use_jquery_for_ajax_calls' => false,
    'route_middleware' => 
    array (
      0 => 'web',
    ),
    'widget_stub' => 'vendor/arrilot/laravel-widgets/src/Console/stubs/widget.stub',
    'widget_plain_stub' => 'vendor/arrilot/laravel-widgets/src/Console/stubs/widget_plain.stub',
  ),
  'eloquent-viewable' => 
  array (
    'models' => 
    array (
      'view' => 
      array (
        'table_name' => 'views',
        'connection' => 'mysql',
      ),
    ),
    'cache' => 
    array (
      'key' => 'cyrildewit.eloquent-viewable.cache',
      'store' => 'file',
      'lifetime_in_minutes' => 60,
    ),
    'session' => 
    array (
      'key' => 'cyrildewit.eloquent-viewable.session',
    ),
    'ignore_bots' => true,
    'honor_dnt' => false,
    'visitor_cookie_key' => 'eloquent_viewable',
    'ignored_ip_addresses' => 
    array (
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => true,
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
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'honeypot' => 
  array (
    'name_field_name' => 'my_name',
    'randomize_name_field_name' => true,
    'valid_from_field_name' => 'valid_from',
    'amount_of_seconds' => 1,
    'respond_to_spam_with' => 'Spatie\\Honeypot\\SpamResponder\\BlankPageResponder',
    'enabled' => true,
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
