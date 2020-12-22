<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/versions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LtpKvWw6FU3PyuGL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9Cl80pa8RvTEQMU9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/classes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'classes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/classes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/frequencies' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Su5PJGGwl2wEK0FC',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/open/schools' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RWI7HG3NrQjYCe5r',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/children/map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T9GEfc7gWAyVOpij',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/children' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'children.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'children.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/children/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'children.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/alerts/mine' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QMvGZB5jJhycgeXC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/alerts/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fk9kbGR0sC0JW60d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cases' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cases.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cases.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cases/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cases.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/requests/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ttZxiTutsFP7VVZ0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ze32lgxpsmPNRI93',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GBfQjLzvlLNGmCop',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ONaKkfTuuocD82VK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/reports/download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BoeCG6rYpdQV6tDn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/reports/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qqFUfqcKlgmLdKIi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/myself' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RyxafVmbYm4rA0Tb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/groups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IvvM0UFkbmcjLBNd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9tqI5DAsd9QSNLBF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/groups/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XilPVEOkD7NTjI18',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/groups/uf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3bwsnuRDrkFkwYtR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mOcwo8wXo2Z0uyXZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T3sLB055XILwqYnd',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings/educacenso/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XyqNV6Wi6afFg94q',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings/educacenso/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ubh5G7cwdS1k9NlF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings/import/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BxfDb7PwmfDf3h2F',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings/import/xls' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ysBXbqqnC3g8AIao',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/maintenance/import_jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5G0mWfPY13xCTOCR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/maintenance/import_jobs/new' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s6OyfnFpBNtv7nw6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/maintenance/sms_conversations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oecsPXKYvv4qLOjw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/maintenance/system_health' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::C5PmqtbBcJIEpxP1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/tenants/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fx1aKs232GPvCZYQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/tenants/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7nauaPIO0t42HTbd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/tenants/complete_setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::z23k5q853VEKJqCw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/state/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6FPZegNDQN9O7edk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xYl4yYLY1n4hjuqB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants/uf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CbcoeT11NPJ8hOBz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JjJn2SCMQYnzwYjT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants/recent_activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::086eOpVEsXo02UbZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants/public/uf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QHA6VqQkxh6fO64M',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/states/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2KH7CvoM7YPeKneb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/states/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1DEMkoUOrM2K2NBZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/schools/educacenso/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0AfyZW4sw73GWyao',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/schools/frequency/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F60ThyzhU3Nat0iq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/schools/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.school.search',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/schools/all_educacenso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r7QRom6Bsd9RbjB4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/notifications/unread' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::h2hALNdLpj3iI9b6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user_preferences' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::q5CYdIF5CA0t4nbl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::olzHJoZwF2VAvd7C',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/children' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AJ9Ab7GLxN1QMj8L',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/tenants' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EaJtKJ3WCJp7H9Yv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/ufs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KQtGQdyNwtB9mtcJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/signups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aOYqcvXpJ5vg93y9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/country_stats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JR9ztEGRIh8Tn17l',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/state_stats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r4dw3H2cF5ZBpGUs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/selo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sbIT5cfvSUZdemx7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/selo/download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oAyhJXIfIAw7GtDV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/selo/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ocxJl5i39qXghFmO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/child' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xnzoTafislj22lot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/child/download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::U9qTyxt4aQh010VD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/child/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2OxiWyDWGNAfy2B4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/city_bar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9rvxVYbFaLaFNhI4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/data_rematricula_daily' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bTcCr4DZXlbmpUMd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/ufs_by_selo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XP6rXaRum4lPeUYe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/tenants_by_selo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::elJ30tnG1fBPPQQx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/reports/data_map_fusion_chart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zgNhlXnM9YzfG9bz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/language.json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tG6JjluSYoajYfUM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/static/static_data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8DIeZJLrLeZI9Eid',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cities/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.cities.search',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cities/check_availability' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HVweoA9L7qV3BaFp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tenants/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/password_reset/begin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MsPqAhdXtoh5ygzc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/password_reset/complete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Raav1TEFYghXM2E2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/support/tickets/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VYglmuhBfIgm7ccp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/tenants/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BLY5kksrhHRMprFt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/tenants/uploadfile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qmZRr6shiY8bXqqo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/state/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1yui6SU1znMrBk6I',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/signups/state/check_if_available' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uBGC7ivigrVkIDMF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/integration/lp/alert_spawn' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lthJPHGWLfUjn39G',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/integration/sms/on_receive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mvjMPC58QbWcOW2S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lp/report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nkaMyrm4urgdd9qu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lp/report/uf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9ViunPVdPZZGE1Je',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lp/report/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uRfq2d867q7qSYeW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lp/report/list/cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UKPjT5aA1E6cYZpe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lp/report/reach' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R7nbjd8V72R0qJ50',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/mailgun/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VGVJogS6rS8TnAfP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AhS6BEN3OfL4H1bW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/proxy.html' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1cGFkwD8jhM0wR2x',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/maintenance/logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Aqa2QfZoByPdVvUU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/maintenance/zenvia_curl' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R6Msi8PBtuOqmCWS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/(?|c(?|lockwork/([^/]++)(*:42)|ache/([^/]++)(?:/([^/]++))?(*:76))|telescope/([^/]++)(*:102))|/api/v1/(?|c(?|lasses/([^/]++)(?|(*:144)|/edit(*:157)|(*:165))|hildren/(?|([^/]++)(?|/(?|alert(*:205)|edit(*:217))|(*:226))|search(*:241)|export(?|(*:258)|ed/([^/]++)(*:277))|([^/]++)/(?|comments(?|(*:309)|/([^/]++)(?|(*:329))|(*:338))|a(?|ttachments(?|(*:364)|/([^/]++)(*:381))|ctivity(*:397))))|ases/([^/]++)(?|/(?|cancel(*:434)|re(?|open(*:451)|quest\\-(?|reopen(*:475)|transfer(*:491)))|transfer(*:509)|edit(*:521))|(*:530))|ities/([^/]++)(?|(*:556)|/edit(*:569)|(*:577)))|frequenc(?|ies/([^/]++)(*:610)|y/([^/]++)(*:628))|a(?|lerts/([^/]++)/(?|accept(*:665)|reject(*:679))|ttachments/download/([^/]++)(*:716))|re(?|quests/([^/]++)/reject(*:752)|ports/exported/([^/]++)(*:783))|user(?|/([^/]++)/(?|update_yourself(*:827)|send_reactivation_mail(*:857))|s/([^/]++)(?|/(?|restore(*:890)|edit(*:902))|(*:911)))|groups/([^/]++)(?|(*:939)|/settings(*:956)|(*:964))|s(?|ettingstenantcase/tenant/([^/]++)(*:1010)|teps/([^/]++)/([^/]++)(?|/(?|complete(*:1056)|assign(?|able_users(*:1084)|_user(*:1098)))|(*:1109))|ignups/(?|tenants/(?|([^/]++)/(?|approve(*:1159)|re(?|ject(*:1177)|send_notification(*:1203))|update_registration_email(*:1238))|via_token/([^/]++)(*:1266)|([^/]++)/(?|complete(*:1295)|accept(*:1310))|mayor/by/cpf/([^/]++)(*:1341))|state/([^/]++)/(?|approve(*:1376)|re(?|ject(*:1394)|send_notification(*:1420))|update_registration_email(*:1455))|users/(?|via_token/([^/]++)(*:1492)|([^/]++)/confirm(*:1517)))|chools/(?|([^/]++)(*:1546)|all(*:1558)))|maintenance/(?|import_jobs/([^/]++)(?|/process(*:1615)|(*:1624))|([^/]++)(*:1642)|test_error_reporting(*:1671))|tenants/([^/]++)(?|/(?|cancel(*:1710)|edit(*:1723))|(*:1733))|notifications/([^/]++)/mark_as_read(*:1778)|integration/forms/([^/]++)(*:1813)))/?$}sDu',
    ),
    3 => 
    array (
      42 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      76 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.telescope',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      144 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classes.show',
          ),
          1 => 
          array (
            0 => 'class',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classes.edit',
          ),
          1 => 
          array (
            0 => 'class',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      165 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classes.update',
          ),
          1 => 
          array (
            0 => 'class',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'classes.destroy',
          ),
          1 => 
          array (
            0 => 'class',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      205 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JXJdCSGUCNzZkA8i',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'children.edit',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      226 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'children.show',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'children.update',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'children.destroy',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RR3fmcXGqJOlv1XR',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      258 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bHmc1PbOAxd3R9nd',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      277 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.children.download_exported',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rt1hz3Kc5yxqf1et',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      329 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PKW0mOp0bBhOMMRk',
          ),
          1 => 
          array (
            0 => 'child',
            1 => 'comment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M3DtI8fGKFr5tw07',
          ),
          1 => 
          array (
            0 => 'child',
            1 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      338 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::67gRde12VWU7nytT',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w0xza2Z5opplmZpp',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      364 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P65Jj9DklXScQWx0',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t2ggDRWlaBjvEaYm',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      381 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gCXY018nLNbCB8IW',
          ),
          1 => 
          array (
            0 => 'child',
            1 => 'attachment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wp1BE82Gabusyp16',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::88mgyYrrB1s5reZf',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      451 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qUHonObJ4ZnpGvoH',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZxQw4SuKUwg1BuiN',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XfsEj02BFByf0GYs',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      509 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RWPNZuuTdI6v4EGP',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      521 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cases.edit',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      530 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cases.show',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cases.update',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'cases.destroy',
          ),
          1 => 
          array (
            0 => 'case',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      556 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cities.show',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cities.edit',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      577 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cities.update',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cities.destroy',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NdfuEV6mEb9sfAxl',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      628 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8imWbJOZW0KE6UiJ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hZaZka33Bk0dP62u',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vqeDPQo4HiXyMBDx',
          ),
          1 => 
          array (
            0 => 'child',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      716 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.attachments.download',
          ),
          1 => 
          array (
            0 => 'attachment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      752 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BfiCz9DGHuS20bt4',
          ),
          1 => 
          array (
            0 => 'request',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      783 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.reports.download_exported',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::npjf8MqXofEVpa0z',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      857 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qYqteXMECuEo4D0q',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      890 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HnOzb1aOpp4Skjeh',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      902 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      911 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      939 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RQKIYthaCJT2tZ0J',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      956 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OVsCLD6IaXJWRxFp',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      964 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BSMyPcnhJ0NcvdFC',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V8AhL60iSfYa55ej',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1010 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GqcmIoNagtRu4yHD',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1056 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cMmGheUWKSr53vyp',
          ),
          1 => 
          array (
            0 => 'step_type',
            1 => 'step_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1084 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BsjDdrEwVzY3DyDY',
          ),
          1 => 
          array (
            0 => 'step_type',
            1 => 'step_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bsREWQ0g7tUkjWRm',
          ),
          1 => 
          array (
            0 => 'step_type',
            1 => 'step_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UIYeM2bG6ak7aZD4',
          ),
          1 => 
          array (
            0 => 'step_type',
            1 => 'step_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QOMLBGE3QWcoCLQg',
          ),
          1 => 
          array (
            0 => 'step_type',
            1 => 'step_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1159 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GFwLFd50rPp8T3aJ',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NrdGAmRneJxckAGK',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PYec6pw5te3uKz72',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1238 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YBMwyi7TbKpAsHaJ',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1266 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KegyTicfvrOUYnXN',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KQnG1aQnnBhzhAPf',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1310 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iUYoXlXWcN47p0vO',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::abInauS498V3MPBK',
          ),
          1 => 
          array (
            0 => 'cpf',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g6Nv5EozpZWPdBCF',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l7d8CmyvEVcnSL6x',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7c5PycXsOY5WIxwD',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9UO4wTVvpqDmjKum',
          ),
          1 => 
          array (
            0 => 'signup',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1492 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::biPypBcbnldq0P7Y',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1517 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fFbpK8dWWKIkpgEk',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1546 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ewqzye0YnXdttGM1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1558 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::L3wvalEx5pVlae1S',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1615 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ge1z9j7ok6nrThoy',
          ),
          1 => 
          array (
            0 => 'job',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gKfVMIlc4UmEv3FD',
          ),
          1 => 
          array (
            0 => 'job',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1642 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6x9ZS3eP4zAzAyQu',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1671 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nZ0griHLhaOXZAzm',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oVkMLIyhq20499am',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1723 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.edit',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1733 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.show',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.update',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'tenants.destroy',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1778 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::99hVf5tOzhzWGPbU',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1813 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TJhaCrCn2xUsSI0D',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'debugbar.telescope' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/telescope/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\TelescopeController@show',
        'as' => 'debugbar.telescope',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\TelescopeController@show',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LtpKvWw6FU3PyuGL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/versions',
      'action' => 
      array (
        'middleware' => 'api',
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":298:{@NEEWC2IDi9zsbLLmaxmMe4DitTCvSooTsWNyWgnwnjA=.a:5:{s:3:"use";a:0:{}s:8:"function";s:75:"function() {
	return \\response()->json([\'available_versions\' => [\'v1\']]);
}";s:5:"scope";s:48:"BuscaAtivaEscolar\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"000000004212daf700000000743c82be";}}',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LtpKvWw6FU3PyuGL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9Cl80pa8RvTEQMU9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/token',
      'action' => 
      array (
        'middleware' => 'api',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@authenticate',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@authenticate',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::9Cl80pa8RvTEQMU9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/classes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.index',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/classes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.create',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@create',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@create',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/classes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.store',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/classes/{class}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.show',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/classes/{class}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.edit',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@edit',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@edit',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/classes/{class}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.update',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'classes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/classes/{class}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'classes.destroy',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::NdfuEV6mEb9sfAxl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/frequencies/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@frequencies',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@frequencies',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::NdfuEV6mEb9sfAxl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8imWbJOZW0KE6UiJ' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/frequency/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@updateFrequency',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@updateFrequency',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::8imWbJOZW0KE6UiJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Su5PJGGwl2wEK0FC' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/frequencies',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@updateFrequencies',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ClasseController@updateFrequencies',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Su5PJGGwl2wEK0FC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RWI7HG3NrQjYCe5r' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/open/schools',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@openSearch',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@openSearch',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::RWI7HG3NrQjYCe5r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::T9GEfc7gWAyVOpij' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/map',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.map',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@getMap',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@getMap',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::T9GEfc7gWAyVOpij',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JXJdCSGUCNzZkA8i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}/alert',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@getAlert',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@getAlert',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::JXJdCSGUCNzZkA8i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.index',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.create',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@create',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@create',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/children',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.store',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.show',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.edit',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@edit',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@edit',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/children/{child}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.update',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'children.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/children/{child}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'as' => 'children.destroy',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RR3fmcXGqJOlv1XR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/children/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@search',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@search',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::RR3fmcXGqJOlv1XR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bHmc1PbOAxd3R9nd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/children/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@export',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@export',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::bHmc1PbOAxd3R9nd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'api.children.download_exported' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/exported/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@download_exported',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@download_exported',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.children.download_exported',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rt1hz3Kc5yxqf1et' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}/comments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@comments',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@comments',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::rt1hz3Kc5yxqf1et',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::PKW0mOp0bBhOMMRk' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/children/{child}/comments/{comment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@removeComment',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@removeComment',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PKW0mOp0bBhOMMRk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::M3DtI8fGKFr5tw07' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}/comments/{comment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@getComment',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@getComment',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::M3DtI8fGKFr5tw07',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::67gRde12VWU7nytT' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/children/{child}/comments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@updateComment',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@updateComment',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::67gRde12VWU7nytT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::P65Jj9DklXScQWx0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}/attachments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@attachments',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@attachments',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::P65Jj9DklXScQWx0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wp1BE82Gabusyp16' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/children/{child}/activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@activityLog',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@activityLog',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::wp1BE82Gabusyp16',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::w0xza2Z5opplmZpp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/children/{child}/comments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@addComment',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@addComment',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::w0xza2Z5opplmZpp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::t2ggDRWlaBjvEaYm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/children/{child}/attachments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@addAttachment',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@addAttachment',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::t2ggDRWlaBjvEaYm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gCXY018nLNbCB8IW' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/children/{child}/attachments/{attachment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@removeAttachment',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@removeAttachment',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::gCXY018nLNbCB8IW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QMvGZB5jJhycgeXC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/alerts/mine',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@get_mine',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@get_mine',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::QMvGZB5jJhycgeXC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fk9kbGR0sC0JW60d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/alerts/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:alerts.pending',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@get_pending',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@get_pending',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::fk9kbGR0sC0JW60d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::hZaZka33Bk0dP62u' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/alerts/{child}/accept',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:alerts.pending',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@accept',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@accept',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::hZaZka33Bk0dP62u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::vqeDPQo4HiXyMBDx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/alerts/{child}/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:alerts.pending',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@reject',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AlertsController@reject',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::vqeDPQo4HiXyMBDx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::88mgyYrrB1s5reZf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cases/{case}/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@cancel',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@cancel',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::88mgyYrrB1s5reZf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qUHonObJ4ZnpGvoH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cases/{case}/reopen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
          4 => 'can:cases.reopen',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@reopen',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@reopen',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qUHonObJ4ZnpGvoH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RWPNZuuTdI6v4EGP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cases/{case}/transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
          4 => 'can:cases.transfer',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@transfer',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@transfer',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::RWPNZuuTdI6v4EGP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZxQw4SuKUwg1BuiN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cases/{case}/request-reopen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
          4 => 'can:cases.request-reopen',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@requestReopen',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@requestReopen',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ZxQw4SuKUwg1BuiN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XfsEj02BFByf0GYs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cases/{case}/request-transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
          4 => 'can:cases.request-transfer',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@requestTransfer',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@requestTransfer',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XfsEj02BFByf0GYs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cases',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.index',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cases/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.create',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@create',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@create',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cases',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.store',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cases/{case}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.show',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cases/{case}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.edit',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@edit',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@edit',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/cases/{case}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.update',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cases.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/cases/{case}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'as' => 'cases.destroy',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CasesController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ttZxiTutsFP7VVZ0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/requests/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:requests.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\RequestsController@all',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\RequestsController@all',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ttZxiTutsFP7VVZ0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BfiCz9DGHuS20bt4' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/requests/{request}/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:requests.reject',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\RequestsController@reject',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\RequestsController@reject',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::BfiCz9DGHuS20bt4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Ze32lgxpsmPNRI93' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/users/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@search',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@search',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Ze32lgxpsmPNRI93',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GBfQjLzvlLNGmCop' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.export',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@export',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@export',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::GBfQjLzvlLNGmCop',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ONaKkfTuuocD82VK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.reports',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@reports',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@reports',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ONaKkfTuuocD82VK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BoeCG6rYpdQV6tDn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/reports/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.reports',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@getReport',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@getReport',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::BoeCG6rYpdQV6tDn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qqFUfqcKlgmLdKIi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/users/reports/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.reports',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@createReport',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@createReport',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qqFUfqcKlgmLdKIi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RyxafVmbYm4rA0Tb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/myself',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@identity',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@identity',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::RyxafVmbYm4rA0Tb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::npjf8MqXofEVpa0z' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/user/{user}/update_yourself',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:update.yourself',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@update_yourself',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@update_yourself',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::npjf8MqXofEVpa0z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qYqteXMECuEo4D0q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/{user_id}/send_reactivation_mail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@send_reactivation_mail',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@send_reactivation_mail',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qYqteXMECuEo4D0q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HnOzb1aOpp4Skjeh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/users/{user_id}/restore',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@restore',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@restore',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::HnOzb1aOpp4Skjeh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.index',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.create',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@create',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@create',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.store',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.show',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.edit',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@edit',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@edit',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.update',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:users.manage',
        ),
        'as' => 'users.destroy',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\UsersController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::IvvM0UFkbmcjLBNd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/groups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::IvvM0UFkbmcjLBNd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XilPVEOkD7NTjI18' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/groups/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@findByTenant',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@findByTenant',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XilPVEOkD7NTjI18',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3bwsnuRDrkFkwYtR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/groups/uf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@findByUf',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@findByUf',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::3bwsnuRDrkFkwYtR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9tqI5DAsd9QSNLBF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/groups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:groups.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9tqI5DAsd9QSNLBF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RQKIYthaCJT2tZ0J' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/groups/{group}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:groups.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::RQKIYthaCJT2tZ0J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OVsCLD6IaXJWRxFp' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/groups/{group}/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:groups.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@update_settings',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@update_settings',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::OVsCLD6IaXJWRxFp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BSMyPcnhJ0NcvdFC' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/groups/{group}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:groups.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::BSMyPcnhJ0NcvdFC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::V8AhL60iSfYa55ej' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/groups/{group}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:groups.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\GroupsController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::V8AhL60iSfYa55ej',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GqcmIoNagtRu4yHD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/settingstenantcase/tenant/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SettingsController@get_tenant_settings_of_case',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SettingsController@get_tenant_settings_of_case',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::GqcmIoNagtRu4yHD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mOcwo8wXo2Z0uyXZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/settings/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SettingsController@get_tenant_settings',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SettingsController@get_tenant_settings',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::mOcwo8wXo2Z0uyXZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::T3sLB055XILwqYnd' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/settings/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SettingsController@update_tenant_settings',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SettingsController@update_tenant_settings',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::T3sLB055XILwqYnd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XyqNV6Wi6afFg94q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/settings/educacenso/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.educacenso',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\EducacensoController@import',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\EducacensoController@import',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XyqNV6Wi6afFg94q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Ubh5G7cwdS1k9NlF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/settings/educacenso/jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.educacenso',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\EducacensoController@list_jobs',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\EducacensoController@list_jobs',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Ubh5G7cwdS1k9NlF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BxfDb7PwmfDf3h2F' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/settings/import/jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.educacenso',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ImportXLSChildrenController@list_jobs',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ImportXLSChildrenController@list_jobs',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::BxfDb7PwmfDf3h2F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ysBXbqqnC3g8AIao' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/settings/import/xls',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.educacenso',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ImportXLSChildrenController@import_xls',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ImportXLSChildrenController@import_xls',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ysBXbqqnC3g8AIao',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5G0mWfPY13xCTOCR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/maintenance/import_jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:maintenance',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::5G0mWfPY13xCTOCR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::s6OyfnFpBNtv7nw6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/maintenance/import_jobs/new',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:maintenance',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@upload_file',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@upload_file',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::s6OyfnFpBNtv7nw6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ge1z9j7ok6nrThoy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/maintenance/import_jobs/{job}/process',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:maintenance',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@process_job',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@process_job',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ge1z9j7ok6nrThoy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gKfVMIlc4UmEv3FD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/maintenance/import_jobs/{job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:maintenance',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@get_job',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\ImportController@get_job',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::gKfVMIlc4UmEv3FD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oecsPXKYvv4qLOjw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/maintenance/sms_conversations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:maintenance',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\SmsStatusController@get_conversations',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\SmsStatusController@get_conversations',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::oecsPXKYvv4qLOjw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::C5PmqtbBcJIEpxP1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/maintenance/system_health',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:maintenance',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\SystemHealthController@get_health',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\SystemHealthController@get_health',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::C5PmqtbBcJIEpxP1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::cMmGheUWKSr53vyp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/steps/{step_type}/{step_id}/complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@complete',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@complete',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::cMmGheUWKSr53vyp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BsjDdrEwVzY3DyDY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/steps/{step_type}/{step_id}/assignable_users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@getAssignableUsers',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@getAssignableUsers',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::BsjDdrEwVzY3DyDY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bsREWQ0g7tUkjWRm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/steps/{step_type}/{step_id}/assign_user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@assignUser',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@assignUser',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::bsREWQ0g7tUkjWRm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UIYeM2bG6ak7aZD4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/steps/{step_type}/{step_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::UIYeM2bG6ak7aZD4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QOMLBGE3QWcoCLQg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/steps/{step_type}/{step_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StepsController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::QOMLBGE3QWcoCLQg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6x9ZS3eP4zAzAyQu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/maintenance/{user_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cases.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\MaintenanceController@assignForAdminUser',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\MaintenanceController@assignForAdminUser',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::6x9ZS3eP4zAzAyQu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fx1aKs232GPvCZYQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/v1/signups/tenants/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@get_pending',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@get_pending',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::fx1aKs232GPvCZYQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7nauaPIO0t42HTbd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/v1/signups/tenants/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.export_signups',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@export_signups',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@export_signups',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::7nauaPIO0t42HTbd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::z23k5q853VEKJqCw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/complete_setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenant.complete_setup',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@completeSetup',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@completeSetup',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::z23k5q853VEKJqCw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GFwLFd50rPp8T3aJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/{signup}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@approve',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@approve',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::GFwLFd50rPp8T3aJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::NrdGAmRneJxckAGK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/{signup}/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@reject',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@reject',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::NrdGAmRneJxckAGK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::YBMwyi7TbKpAsHaJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/{signup}/update_registration_email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@updateRegistrationEmail',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@updateRegistrationEmail',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::YBMwyi7TbKpAsHaJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::PYec6pw5te3uKz72' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/{signup}/resend_notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@resendNotification',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@resendNotification',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PYec6pw5te3uKz72',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6FPZegNDQN9O7edk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/v1/signups/state/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:ufs.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@get_pending',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@get_pending',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::6FPZegNDQN9O7edk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::g6Nv5EozpZWPdBCF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/state/{signup}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:ufs.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@approve',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@approve',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::g6Nv5EozpZWPdBCF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::l7d8CmyvEVcnSL6x' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/state/{signup}/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:ufs.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@reject',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@reject',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::l7d8CmyvEVcnSL6x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9UO4wTVvpqDmjKum' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/state/{signup}/update_registration_email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:ufs.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@updateRegistrationEmail',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@updateRegistrationEmail',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9UO4wTVvpqDmjKum',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7c5PycXsOY5WIxwD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/state/{signup}/resend_notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:ufs.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@resendNotification',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@resendNotification',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::7c5PycXsOY5WIxwD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xYl4yYLY1n4hjuqB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/v1/tenants/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@all',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@all',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::xYl4yYLY1n4hjuqB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::CbcoeT11NPJ8hOBz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/uf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@getByUf',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@getByUf',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::CbcoeT11NPJ8hOBz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JjJn2SCMQYnzwYjT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.export',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@export',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@export',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::JjJn2SCMQYnzwYjT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oVkMLIyhq20499am' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/tenants/{tenant}/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:tenants.manage',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@cancel',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@cancel',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::oVkMLIyhq20499am',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::086eOpVEsXo02UbZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/recent_activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@get_recent_activity',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@get_recent_activity',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::086eOpVEsXo02UbZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QHA6VqQkxh6fO64M' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/public/uf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@getUfWithTenant',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@getUfWithTenant',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::QHA6VqQkxh6fO64M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2KH7CvoM7YPeKneb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/v1/states/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:ufs.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StatesController@all',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StatesController@all',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::2KH7CvoM7YPeKneb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1DEMkoUOrM2K2NBZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/states/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StatesController@export',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StatesController@export',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::1DEMkoUOrM2K2NBZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0AfyZW4sw73GWyao' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/schools/educacenso/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@sendNotificationsEducacensoSchool',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@sendNotificationsEducacensoSchool',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::0AfyZW4sw73GWyao',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::F60ThyzhU3Nat0iq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/schools/frequency/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@sendNotificationsFrequencySchool',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@sendNotificationsFrequencySchool',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::F60ThyzhU3Nat0iq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'api.school.search' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/schools/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@search',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@search',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.school.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::r7QRom6Bsd9RbjB4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/schools/all_educacenso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.educacenso',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@all_educacenso',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@all_educacenso',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::r7QRom6Bsd9RbjB4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Ewqzye0YnXdttGM1' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/schools/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:settings.educacenso',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Ewqzye0YnXdttGM1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::L3wvalEx5pVlae1S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/schools/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:school.list',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@getAll',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\SchoolsController@getAll',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::L3wvalEx5pVlae1S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::h2hALNdLpj3iI9b6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/notifications/unread',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\NotificationsController@getUnread',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\NotificationsController@getUnread',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::h2hALNdLpj3iI9b6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::99hVf5tOzhzWGPbU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/notifications/{id}/mark_as_read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\NotificationsController@markAsRead',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\NotificationsController@markAsRead',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::99hVf5tOzhzWGPbU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::q5CYdIF5CA0t4nbl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user_preferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\PreferencesController@getSettings',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\PreferencesController@getSettings',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::q5CYdIF5CA0t4nbl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::olzHJoZwF2VAvd7C' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user_preferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\PreferencesController@updateSettings',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\PreferencesController@updateSettings',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::olzHJoZwF2VAvd7C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::AJ9Ab7GLxN1QMj8L' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/reports/children',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_children',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_children',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::AJ9Ab7GLxN1QMj8L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::EaJtKJ3WCJp7H9Yv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/reports/tenants',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_tenants',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_tenants',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::EaJtKJ3WCJp7H9Yv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KQtGQdyNwtB9mtcJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/reports/ufs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_ufs',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_ufs',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::KQtGQdyNwtB9mtcJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::aOYqcvXpJ5vg93y9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/reports/signups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_signups',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@query_signups',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::aOYqcvXpJ5vg93y9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JR9ztEGRIh8Tn17l' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/country_stats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@country_stats',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@country_stats',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::JR9ztEGRIh8Tn17l',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::r4dw3H2cF5ZBpGUs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/state_stats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@state_stats',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@state_stats',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::r4dw3H2cF5ZBpGUs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'api.reports.download_exported' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/exported/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@download_exported',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@download_exported',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.reports.download_exported',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sbIT5cfvSUZdemx7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/selo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cities.selo_reports',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@getSeloReports',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@getSeloReports',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::sbIT5cfvSUZdemx7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oAyhJXIfIAw7GtDV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/selo/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cities.selo_reports',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@getSeloReport',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@getSeloReport',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::oAyhJXIfIAw7GtDV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ocxJl5i39qXghFmO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/reports/selo/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:cities.selo_reports',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@createSeloReport',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ReportsController@createSeloReport',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ocxJl5i39qXghFmO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xnzoTafislj22lot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/child',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@list_files_exported',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@list_files_exported',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::xnzoTafislj22lot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::U9qTyxt4aQh010VD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/child/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@get_file_exported',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@get_file_exported',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::U9qTyxt4aQh010VD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2OxiWyDWGNAfy2B4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/reports/child/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
          3 => 'can:reports.view',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@create_report_child',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\ChildrenController@create_report_child',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::2OxiWyDWGNAfy2B4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9rvxVYbFaLaFNhI4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/city_bar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@city_bar',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@city_bar',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9rvxVYbFaLaFNhI4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bTcCr4DZXlbmpUMd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/data_rematricula_daily',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@getDataRematriculaDaily',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@getDataRematriculaDaily',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::bTcCr4DZXlbmpUMd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XP6rXaRum4lPeUYe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/ufs_by_selo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@ufsBySelo',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@ufsBySelo',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XP6rXaRum4lPeUYe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::elJ30tnG1fBPPQQx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/tenants_by_selo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@tenantsBySelo',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@tenantsBySelo',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::elJ30tnG1fBPPQQx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zgNhlXnM9YzfG9bz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/reports/data_map_fusion_chart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
          2 => 'jwt.auth',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@getDataMapFusionChart',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Bar\\ReportsBar@getDataMapFusionChart',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::zgNhlXnM9YzfG9bz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::nZ0griHLhaOXZAzm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/maintenance/test_error_reporting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\SystemHealthController@test_error_reporting',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Maintenance\\SystemHealthController@test_error_reporting',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::nZ0griHLhaOXZAzm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'api.attachments.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/attachments/download/{attachment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AttachmentsController@download',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\AttachmentsController@download',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.attachments.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tG6JjluSYoajYfUM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/language.json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\LanguageController@generateLanguageFile',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\LanguageController@generateLanguageFile',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::tG6JjluSYoajYfUM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8DIeZJLrLeZI9Eid' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/static/static_data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StaticDataController@render',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\StaticDataController@render',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::8DIeZJLrLeZI9Eid',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'api.cities.search' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cities/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@search',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@search',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.cities.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HVweoA9L7qV3BaFp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cities/check_availability',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@check_availability',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@check_availability',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::HVweoA9L7qV3BaFp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.index',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.create',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@create',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@create',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.store',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cities/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.show',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cities/{city}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.edit',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@edit',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@edit',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/cities/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.update',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'cities.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/cities/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'cities.destroy',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Resources\\CitiesController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.index',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@index',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.create',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@create',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@create',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/tenants',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.store',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@store',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@store',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.show',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@show',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@show',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/tenants/{tenant}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.edit',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@edit',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@edit',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/tenants/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.update',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'tenants.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/tenants/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'as' => 'tenants.destroy',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@destroy',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantsController@destroy',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MsPqAhdXtoh5ygzc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/password_reset/begin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@begin_password_reset',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@begin_password_reset',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::MsPqAhdXtoh5ygzc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Raav1TEFYghXM2E2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/password_reset/complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@complete_password_reset',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Auth\\IdentityController@complete_password_reset',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Raav1TEFYghXM2E2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VYglmuhBfIgm7ccp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/support/tickets/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Support\\TicketsController@submit_ticket',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Support\\TicketsController@submit_ticket',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::VYglmuhBfIgm7ccp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BLY5kksrhHRMprFt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@register',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@register',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::BLY5kksrhHRMprFt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KegyTicfvrOUYnXN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/signups/tenants/via_token/{signup}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@get_via_token',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@get_via_token',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::KegyTicfvrOUYnXN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KQnG1aQnnBhzhAPf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/{signup}/complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@complete',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@complete',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::KQnG1aQnnBhzhAPf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qmZRr6shiY8bXqqo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/tenants/uploadfile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@uploadfile',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@uploadfile',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qmZRr6shiY8bXqqo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::iUYoXlXWcN47p0vO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/signups/tenants/{signup}/accept',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@accept',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@accept',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::iUYoXlXWcN47p0vO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::abInauS498V3MPBK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/signups/tenants/mayor/by/cpf/{cpf}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@getMayorByCpf',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@getMayorByCpf',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::abInauS498V3MPBK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::biPypBcbnldq0P7Y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/signups/users/via_token/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@get_user_via_token',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@get_user_via_token',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::biPypBcbnldq0P7Y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fFbpK8dWWKIkpgEk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/users/{user}/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@confirm_user',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\TenantSignupController@confirm_user',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::fFbpK8dWWKIkpgEk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1yui6SU1znMrBk6I' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/state/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@register',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@register',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::1yui6SU1znMrBk6I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uBGC7ivigrVkIDMF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/signups/state/check_if_available',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@checkIfAvailable',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Tenants\\StateSignupController@checkIfAvailable',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::uBGC7ivigrVkIDMF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lthJPHGWLfUjn39G' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/integration/lp/alert_spawn',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\AlertSpawnController@spawn_alert',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\AlertSpawnController@spawn_alert',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::lthJPHGWLfUjn39G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mvjMPC58QbWcOW2S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/v1/integration/sms/on_receive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\SmsConversationController@on_message_received',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\SmsConversationController@on_message_received',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::mvjMPC58QbWcOW2S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TJhaCrCn2xUsSI0D' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/integration/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\FormBuilderController@render_form',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\FormBuilderController@render_form',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::TJhaCrCn2xUsSI0D',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::nkaMyrm4urgdd9qu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/lp/report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@report_country',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@report_country',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::nkaMyrm4urgdd9qu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9ViunPVdPZZGE1Je' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/lp/report/uf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@report_uf',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@report_uf',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9ViunPVdPZZGE1Je',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uRfq2d867q7qSYeW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/lp/report/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@report_city',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@report_city',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::uRfq2d867q7qSYeW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UKPjT5aA1E6cYZpe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/lp/report/list/cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@list_cities',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@list_cities',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::UKPjT5aA1E6cYZpe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::R7nbjd8V72R0qJ50' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/lp/report/reach',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@reach',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\LP\\ReportsLandingPageController@reach',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::R7nbjd8V72R0qJ50',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VGVJogS6rS8TnAfP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/mailgun/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Mailgun\\MailgunController@update',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Mailgun\\MailgunController@update',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::VGVJogS6rS8TnAfP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::AhS6BEN3OfL4H1bW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":291:{@OvwUsyGnJ6H8ptxdP+1S8Pgb7hy07O4WFanLxj34BIg=.a:5:{s:3:"use";a:0:{}s:8:"function";s:68:"function () {
    return \\redirect()->away(\\env(\'APP_PANEL_URL\'));
}";s:5:"scope";s:48:"BuscaAtivaEscolar\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"000000004212daf500000000743c82be";}}',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::AhS6BEN3OfL4H1bW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1cGFkwD8jhM0wR2x' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proxy.html',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":267:{@tOG1HwySsIqJTKoHG+UjeXY6xjDWmDmpq4fOZeFuHj4=.a:5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
	return \\view(\'cors_proxy\');
}";s:5:"scope";s:48:"BuscaAtivaEscolar\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"000000004212d60500000000743c82be";}}',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::1cGFkwD8jhM0wR2x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Aqa2QfZoByPdVvUU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'maintenance/logs',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => '\\Rap2hpoutre\\LaravelLogViewer\\LogViewerController@index',
        'controller' => '\\Rap2hpoutre\\LaravelLogViewer\\LogViewerController@index',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => '/maintenance',
        'where' => 
        array (
        ),
        'as' => 'generated::Aqa2QfZoByPdVvUU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::R6Msi8PBtuOqmCWS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'maintenance/zenvia_curl',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\SmsConversationController@debug_zenvia',
        'controller' => 'BuscaAtivaEscolar\\Http\\Controllers\\Integration\\SmsConversationController@debug_zenvia',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => '/maintenance',
        'where' => 
        array (
        ),
        'as' => 'generated::R6Msi8PBtuOqmCWS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
