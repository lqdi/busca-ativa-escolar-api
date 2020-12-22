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
            '_route' => 'generated::zcIwBGdpqR826vxg',
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
            '_route' => 'generated::oeEPYOa0XifHycdI',
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
            '_route' => 'generated::Vhq8KXHVkTMP8OpA',
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
            '_route' => 'generated::aoOfoGbDKwqln9Kj',
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
            '_route' => 'generated::7EJw4qQcHxreEwdt',
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
            '_route' => 'generated::3VqDaMO9vLdOXrzS',
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
            '_route' => 'generated::FTTflhG47zU3AM2q',
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
            '_route' => 'generated::uA1k6VzVOfKMNcYS',
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
            '_route' => 'generated::LnUuArWpPX9ps5jW',
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
            '_route' => 'generated::5zNUXLFVoHNuD7ba',
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
            '_route' => 'generated::s1peLSFNwz5trmVE',
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
            '_route' => 'generated::eMfOIXDfRnwWFxT8',
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
            '_route' => 'generated::qkQdXsmClHG6UV8k',
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
            '_route' => 'generated::kB8mM5pwjyJQgKxK',
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
            '_route' => 'generated::bMKMvedlU0EJaCGU',
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
            '_route' => 'generated::u5trhNiiCzA0dkYr',
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
            '_route' => 'generated::aNsNy8dZOPGqIJsf',
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
            '_route' => 'generated::SP5rFml4FP1xLlAk',
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
            '_route' => 'generated::lli0gMww3Epgo4q7',
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
            '_route' => 'generated::0gZPwVr6PrwZh3ai',
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
            '_route' => 'generated::btTkaK5kBAurhpvL',
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
            '_route' => 'generated::k2R3VbMwIxQmzSbT',
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
            '_route' => 'generated::28GETvaOaE8wmGYK',
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
            '_route' => 'generated::zLmjJ1mVUb15LJQm',
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
            '_route' => 'generated::HtrX7OOI9zolCCTO',
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
            '_route' => 'generated::8gm3lP7mPjSSZlx2',
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
            '_route' => 'generated::sMH35d8hR4U58CSP',
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
            '_route' => 'generated::GaDEzkE6yltjurfa',
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
            '_route' => 'generated::9mQDVAz9ZmIsVHYO',
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
            '_route' => 'generated::ldG38qxxj1bCWofm',
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
            '_route' => 'generated::fzUkAT0tl47MGvRb',
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
            '_route' => 'generated::bC3RyE0AjWlCHvRs',
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
            '_route' => 'generated::fVnMCSaTm7YolUsQ',
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
            '_route' => 'generated::NMTHS6Jbh5zqbky4',
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
            '_route' => 'generated::DyHJSFZ76eNdS7Zz',
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
            '_route' => 'generated::Y0aFmp08anUQ1lQo',
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
            '_route' => 'generated::hoJOKPg2Frpsks5f',
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
            '_route' => 'generated::F6pWmgoFyRPw8GsM',
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
            '_route' => 'generated::dwQOrR3rNP89ogtv',
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
            '_route' => 'generated::uYJ0Q1B5O3meHWVs',
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
            '_route' => 'generated::OPy0U5hIC5eyQaOi',
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
            '_route' => 'generated::onwI0SfBtx6Ls40c',
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
            '_route' => 'generated::veNtVILRhKdkub6j',
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
            '_route' => 'generated::PlO9ysrqr0q151cE',
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
            '_route' => 'generated::Y5RBLx3FAkT5bSLk',
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
            '_route' => 'generated::vk8qK3USo9ZhviF2',
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
            '_route' => 'generated::0veGmbZUGjkFz2Dd',
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
            '_route' => 'generated::gOaIn2WEoGuJDZvp',
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
            '_route' => 'generated::BrVXZwIIXjM7Z9QH',
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
            '_route' => 'generated::jjPsmvAckNPrzasW',
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
            '_route' => 'generated::VOpnRex1mXqSIDcW',
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
            '_route' => 'generated::aFiYBF5w1TU36Icb',
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
            '_route' => 'generated::myqy2cx8e1GL02lR',
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
            '_route' => 'generated::VoZei81yuP8Ny3yx',
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
            '_route' => 'generated::0G5I5iOcWiIkBswq',
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
            '_route' => 'generated::xfNyVCJ74s5ByhbC',
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
            '_route' => 'generated::7fN1X9ckkt8zYYTu',
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
            '_route' => 'generated::1KMz0olByCJ27Wl0',
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
            '_route' => 'generated::4faAcwjYohUqmHog',
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
            '_route' => 'generated::fL12kQ28Ih0WolPj',
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
            '_route' => 'generated::9m0RvAwD0A6Vi7Tf',
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
            '_route' => 'generated::fD1XytBkbmoWBf9F',
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
            '_route' => 'generated::MX022nuKnUu50RP8',
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
            '_route' => 'generated::Vg2Rg9T2O7GCgnGP',
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
            '_route' => 'generated::q0SAxfHYil5ulsfs',
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
            '_route' => 'generated::X5epprtrVlkne2IT',
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
            '_route' => 'generated::MmAkU60i07fG9jHf',
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
            '_route' => 'generated::JwxBwdW4g4h2f9qq',
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
            '_route' => 'generated::qH6YWQmM8w0OVU5a',
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
            '_route' => 'generated::9qaQFbHywR6VdsgJ',
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
            '_route' => 'generated::VBodXYWKYf2TQlHY',
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
            '_route' => 'generated::kfDDTMWyHLyo8aSv',
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
            '_route' => 'generated::662IGJVBczwhAn1c',
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
            '_route' => 'generated::TfuoaExf4tbNRVj6',
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
            '_route' => 'generated::cU83BkHubXkzzBDz',
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
            '_route' => 'generated::tTeYjIeBLQdbOZIf',
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
            '_route' => 'generated::WKQXuJ2ayjLCKDOW',
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
            '_route' => 'generated::UPBn8WnrLJddDVOY',
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
            '_route' => 'generated::DQpXNHQYLHfIe6ZZ',
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
            '_route' => 'generated::UG1D6efc42tmG02Z',
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
            '_route' => 'generated::8pli3xGTsoI9UJWr',
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
            '_route' => 'generated::IcUkQGXxEGSs8Zkd',
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
            '_route' => 'generated::tFe3c3IxNtBDQESA',
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
            '_route' => 'generated::00c72CMJnapvjn1o',
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
            '_route' => 'generated::E0sD1qdWR78rYFpl',
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
            '_route' => 'generated::V4x1Nq8WlpQDly32',
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
            '_route' => 'generated::S82Rlj2IU6NLKrnf',
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
            '_route' => 'generated::eYQlEAP7cxVMDv7n',
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
            '_route' => 'generated::ECEH5i1vDNFSDgnB',
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
            '_route' => 'generated::EIaWAvYUSh6jDj8q',
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
            '_route' => 'generated::Rrzbwq3a5nBHfZ1w',
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
            '_route' => 'generated::0vpAgHF7COjLwoF9',
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
            '_route' => 'generated::kofVlSiUW6MLUMpn',
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
            '_route' => 'generated::jlhjubvsBvPYyvr1',
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
            '_route' => 'generated::Lix4nNeQ9RWFU73B',
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
            '_route' => 'generated::82eXjEAbucey8DMW',
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
            '_route' => 'generated::NfzjNH0hjscZf8t2',
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
            '_route' => 'generated::fgChhkwgWQQtakJC',
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
            '_route' => 'generated::mDbYXRoK5RIiSbgj',
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
            '_route' => 'generated::DUQEm2YdHQF33FLB',
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
            '_route' => 'generated::2WO3CNfe6ORO4E3L',
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
            '_route' => 'generated::zlcr1oS92JrIxEyU',
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
            '_route' => 'generated::NGQqge9FznKea6xP',
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
            '_route' => 'generated::apZqCCftCZ9RndYt',
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
            '_route' => 'generated::07B95afnvupW7xF3',
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
            '_route' => 'generated::L6SOrHQMEoFr4ReI',
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
            '_route' => 'generated::cIGItTgcMoLHgSTJ',
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
            '_route' => 'generated::qAD3CVrtPDBIxg8B',
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
            '_route' => 'generated::4U96mpGyYe3hcaAR',
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
            '_route' => 'generated::BuH6SkwqKlVf2vhr',
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
            '_route' => 'generated::Q69CwNX5bgJ0XW4U',
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
            '_route' => 'generated::jlheIq0VDw5EJGCV',
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
            '_route' => 'generated::BYlhSTkUVghKvoZu',
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
            '_route' => 'generated::MUlzKnSyGTyQ04wn',
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
            '_route' => 'generated::4vrqdFXeOosYjJqW',
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
            '_route' => 'generated::7Uwu94M20wMHPq7k',
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
            '_route' => 'generated::hPcFZ4Imb3ukwRj4',
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
            '_route' => 'generated::6vYuezEJq66yLTVS',
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
            '_route' => 'generated::QcSVra2EHimkUDBu',
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
            '_route' => 'generated::g19OtAWsmBl2jnYf',
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
            '_route' => 'generated::gG58MWYP9s8uPenc',
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
            '_route' => 'generated::assAUCA3iNtVZgiQ',
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
            '_route' => 'generated::cRDCuEhjYeoxqIFW',
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
            '_route' => 'generated::cYcHrfX83lWMqPA0',
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
            '_route' => 'generated::XD3PBko5jkxJ4air',
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
            '_route' => 'generated::umKVcjnRNXpRaZLc',
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
            '_route' => 'generated::Yb5cKPZejIjy2kXJ',
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
            '_route' => 'generated::hh70aaZEh6N2go0B',
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
            '_route' => 'generated::KQVtHOpdSLowpxj2',
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
            '_route' => 'generated::a0nPyrdj3D38ybq4',
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
            '_route' => 'generated::A9DpbIIbZwE1MJ0p',
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
            '_route' => 'generated::BWNYQV2VOh9HkjjK',
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
            '_route' => 'generated::mCs1fZ5OJday5ijZ',
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
            '_route' => 'generated::9qa6txr2U6qCNNM5',
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
            '_route' => 'generated::z0vpcMEb3EiIFlxd',
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
            '_route' => 'generated::bGq2rHLHfyoxho8y',
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
            '_route' => 'generated::57tL7OjDsKCIuX4w',
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
            '_route' => 'generated::NJfHtnwNkXQVfejU',
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
            '_route' => 'generated::arD9TWgglflIBKr9',
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
            '_route' => 'generated::Ctno0788jNi5jDhn',
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
            '_route' => 'generated::TGQFruyMFEameUjj',
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
            '_route' => 'generated::eW8ccxzuDP9m7Alf',
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
    'generated::zcIwBGdpqR826vxg' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":300:{@pxStaF3rSsZil0OhFpOJmGzZJnSM8/gGIkK6m5hHlSg=.a:5:{s:3:"use";a:0:{}s:8:"function";s:77:"function() {
	return \\response()->json([\'available_versions\' => [\'v1\']]);
}";s:5:"scope";s:48:"BuscaAtivaEscolar\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000553575890000000023beabea";}}',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zcIwBGdpqR826vxg',
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
    'generated::oeEPYOa0XifHycdI' => 
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
        'as' => 'generated::oeEPYOa0XifHycdI',
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
    'generated::zlcr1oS92JrIxEyU' => 
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
        'as' => 'generated::zlcr1oS92JrIxEyU',
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
    'generated::NGQqge9FznKea6xP' => 
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
        'as' => 'generated::NGQqge9FznKea6xP',
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
    'generated::Vhq8KXHVkTMP8OpA' => 
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
        'as' => 'generated::Vhq8KXHVkTMP8OpA',
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
    'generated::aoOfoGbDKwqln9Kj' => 
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
        'as' => 'generated::aoOfoGbDKwqln9Kj',
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
    'generated::7EJw4qQcHxreEwdt' => 
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
        'as' => 'generated::7EJw4qQcHxreEwdt',
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
    'generated::E0sD1qdWR78rYFpl' => 
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
        'as' => 'generated::E0sD1qdWR78rYFpl',
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
    'generated::V4x1Nq8WlpQDly32' => 
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
        'as' => 'generated::V4x1Nq8WlpQDly32',
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
    'generated::S82Rlj2IU6NLKrnf' => 
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
        'as' => 'generated::S82Rlj2IU6NLKrnf',
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
    'generated::eYQlEAP7cxVMDv7n' => 
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
        'as' => 'generated::eYQlEAP7cxVMDv7n',
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
    'generated::ECEH5i1vDNFSDgnB' => 
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
        'as' => 'generated::ECEH5i1vDNFSDgnB',
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
    'generated::EIaWAvYUSh6jDj8q' => 
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
        'as' => 'generated::EIaWAvYUSh6jDj8q',
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
    'generated::Rrzbwq3a5nBHfZ1w' => 
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
        'as' => 'generated::Rrzbwq3a5nBHfZ1w',
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
    'generated::kofVlSiUW6MLUMpn' => 
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
        'as' => 'generated::kofVlSiUW6MLUMpn',
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
    'generated::82eXjEAbucey8DMW' => 
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
        'as' => 'generated::82eXjEAbucey8DMW',
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
    'generated::0vpAgHF7COjLwoF9' => 
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
        'as' => 'generated::0vpAgHF7COjLwoF9',
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
    'generated::jlhjubvsBvPYyvr1' => 
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
        'as' => 'generated::jlhjubvsBvPYyvr1',
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
    'generated::Lix4nNeQ9RWFU73B' => 
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
        'as' => 'generated::Lix4nNeQ9RWFU73B',
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
    'generated::3VqDaMO9vLdOXrzS' => 
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
        'as' => 'generated::3VqDaMO9vLdOXrzS',
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
    'generated::FTTflhG47zU3AM2q' => 
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
        'as' => 'generated::FTTflhG47zU3AM2q',
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
    'generated::apZqCCftCZ9RndYt' => 
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
        'as' => 'generated::apZqCCftCZ9RndYt',
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
    'generated::07B95afnvupW7xF3' => 
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
        'as' => 'generated::07B95afnvupW7xF3',
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
    'generated::NfzjNH0hjscZf8t2' => 
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
        'as' => 'generated::NfzjNH0hjscZf8t2',
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
    'generated::fgChhkwgWQQtakJC' => 
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
        'as' => 'generated::fgChhkwgWQQtakJC',
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
    'generated::2WO3CNfe6ORO4E3L' => 
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
        'as' => 'generated::2WO3CNfe6ORO4E3L',
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
    'generated::mDbYXRoK5RIiSbgj' => 
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
        'as' => 'generated::mDbYXRoK5RIiSbgj',
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
    'generated::DUQEm2YdHQF33FLB' => 
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
        'as' => 'generated::DUQEm2YdHQF33FLB',
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
    'generated::uA1k6VzVOfKMNcYS' => 
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
        'as' => 'generated::uA1k6VzVOfKMNcYS',
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
    'generated::L6SOrHQMEoFr4ReI' => 
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
        'as' => 'generated::L6SOrHQMEoFr4ReI',
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
    'generated::LnUuArWpPX9ps5jW' => 
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
        'as' => 'generated::LnUuArWpPX9ps5jW',
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
    'generated::5zNUXLFVoHNuD7ba' => 
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
        'as' => 'generated::5zNUXLFVoHNuD7ba',
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
    'generated::s1peLSFNwz5trmVE' => 
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
        'as' => 'generated::s1peLSFNwz5trmVE',
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
    'generated::eMfOIXDfRnwWFxT8' => 
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
        'as' => 'generated::eMfOIXDfRnwWFxT8',
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
    'generated::qkQdXsmClHG6UV8k' => 
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
        'as' => 'generated::qkQdXsmClHG6UV8k',
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
    'generated::kB8mM5pwjyJQgKxK' => 
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
        'as' => 'generated::kB8mM5pwjyJQgKxK',
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
    'generated::cIGItTgcMoLHgSTJ' => 
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
        'as' => 'generated::cIGItTgcMoLHgSTJ',
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
    'generated::qAD3CVrtPDBIxg8B' => 
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
        'as' => 'generated::qAD3CVrtPDBIxg8B',
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
    'generated::4U96mpGyYe3hcaAR' => 
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
        'as' => 'generated::4U96mpGyYe3hcaAR',
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
    'generated::bMKMvedlU0EJaCGU' => 
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
        'as' => 'generated::bMKMvedlU0EJaCGU',
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
    'generated::aNsNy8dZOPGqIJsf' => 
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
        'as' => 'generated::aNsNy8dZOPGqIJsf',
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
    'generated::SP5rFml4FP1xLlAk' => 
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
        'as' => 'generated::SP5rFml4FP1xLlAk',
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
    'generated::u5trhNiiCzA0dkYr' => 
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
        'as' => 'generated::u5trhNiiCzA0dkYr',
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
    'generated::BuH6SkwqKlVf2vhr' => 
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
        'as' => 'generated::BuH6SkwqKlVf2vhr',
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
    'generated::Q69CwNX5bgJ0XW4U' => 
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
        'as' => 'generated::Q69CwNX5bgJ0XW4U',
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
    'generated::jlheIq0VDw5EJGCV' => 
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
        'as' => 'generated::jlheIq0VDw5EJGCV',
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
    'generated::BYlhSTkUVghKvoZu' => 
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
        'as' => 'generated::BYlhSTkUVghKvoZu',
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
    'generated::MUlzKnSyGTyQ04wn' => 
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
        'as' => 'generated::MUlzKnSyGTyQ04wn',
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
    'generated::lli0gMww3Epgo4q7' => 
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
        'as' => 'generated::lli0gMww3Epgo4q7',
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
    'generated::0gZPwVr6PrwZh3ai' => 
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
        'as' => 'generated::0gZPwVr6PrwZh3ai',
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
    'generated::btTkaK5kBAurhpvL' => 
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
        'as' => 'generated::btTkaK5kBAurhpvL',
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
    'generated::k2R3VbMwIxQmzSbT' => 
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
        'as' => 'generated::k2R3VbMwIxQmzSbT',
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
    'generated::28GETvaOaE8wmGYK' => 
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
        'as' => 'generated::28GETvaOaE8wmGYK',
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
    'generated::zLmjJ1mVUb15LJQm' => 
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
        'as' => 'generated::zLmjJ1mVUb15LJQm',
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
    'generated::HtrX7OOI9zolCCTO' => 
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
        'as' => 'generated::HtrX7OOI9zolCCTO',
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
    'generated::8gm3lP7mPjSSZlx2' => 
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
        'as' => 'generated::8gm3lP7mPjSSZlx2',
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
    'generated::bGq2rHLHfyoxho8y' => 
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
        'as' => 'generated::bGq2rHLHfyoxho8y',
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
    'generated::57tL7OjDsKCIuX4w' => 
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
        'as' => 'generated::57tL7OjDsKCIuX4w',
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
    'generated::sMH35d8hR4U58CSP' => 
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
        'as' => 'generated::sMH35d8hR4U58CSP',
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
    'generated::GaDEzkE6yltjurfa' => 
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
        'as' => 'generated::GaDEzkE6yltjurfa',
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
    'generated::4vrqdFXeOosYjJqW' => 
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
        'as' => 'generated::4vrqdFXeOosYjJqW',
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
    'generated::7Uwu94M20wMHPq7k' => 
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
        'as' => 'generated::7Uwu94M20wMHPq7k',
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
    'generated::hPcFZ4Imb3ukwRj4' => 
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
        'as' => 'generated::hPcFZ4Imb3ukwRj4',
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
    'generated::6vYuezEJq66yLTVS' => 
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
        'as' => 'generated::6vYuezEJq66yLTVS',
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
    'generated::QcSVra2EHimkUDBu' => 
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
        'as' => 'generated::QcSVra2EHimkUDBu',
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
    'generated::NJfHtnwNkXQVfejU' => 
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
        'as' => 'generated::NJfHtnwNkXQVfejU',
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
    'generated::9mQDVAz9ZmIsVHYO' => 
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
        'as' => 'generated::9mQDVAz9ZmIsVHYO',
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
    'generated::ldG38qxxj1bCWofm' => 
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
        'as' => 'generated::ldG38qxxj1bCWofm',
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
    'generated::fzUkAT0tl47MGvRb' => 
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
        'as' => 'generated::fzUkAT0tl47MGvRb',
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
    'generated::g19OtAWsmBl2jnYf' => 
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
        'as' => 'generated::g19OtAWsmBl2jnYf',
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
    'generated::gG58MWYP9s8uPenc' => 
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
        'as' => 'generated::gG58MWYP9s8uPenc',
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
    'generated::cRDCuEhjYeoxqIFW' => 
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
        'as' => 'generated::cRDCuEhjYeoxqIFW',
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
    'generated::assAUCA3iNtVZgiQ' => 
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
        'as' => 'generated::assAUCA3iNtVZgiQ',
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
    'generated::bC3RyE0AjWlCHvRs' => 
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
        'as' => 'generated::bC3RyE0AjWlCHvRs',
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
    'generated::hh70aaZEh6N2go0B' => 
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
        'as' => 'generated::hh70aaZEh6N2go0B',
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
    'generated::KQVtHOpdSLowpxj2' => 
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
        'as' => 'generated::KQVtHOpdSLowpxj2',
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
    'generated::A9DpbIIbZwE1MJ0p' => 
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
        'as' => 'generated::A9DpbIIbZwE1MJ0p',
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
    'generated::a0nPyrdj3D38ybq4' => 
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
        'as' => 'generated::a0nPyrdj3D38ybq4',
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
    'generated::fVnMCSaTm7YolUsQ' => 
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
        'as' => 'generated::fVnMCSaTm7YolUsQ',
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
    'generated::NMTHS6Jbh5zqbky4' => 
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
        'as' => 'generated::NMTHS6Jbh5zqbky4',
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
    'generated::DyHJSFZ76eNdS7Zz' => 
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
        'as' => 'generated::DyHJSFZ76eNdS7Zz',
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
    'generated::Ctno0788jNi5jDhn' => 
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
        'as' => 'generated::Ctno0788jNi5jDhn',
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
    'generated::Y0aFmp08anUQ1lQo' => 
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
        'as' => 'generated::Y0aFmp08anUQ1lQo',
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
    'generated::hoJOKPg2Frpsks5f' => 
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
        'as' => 'generated::hoJOKPg2Frpsks5f',
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
    'generated::F6pWmgoFyRPw8GsM' => 
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
        'as' => 'generated::F6pWmgoFyRPw8GsM',
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
    'generated::dwQOrR3rNP89ogtv' => 
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
        'as' => 'generated::dwQOrR3rNP89ogtv',
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
    'generated::uYJ0Q1B5O3meHWVs' => 
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
        'as' => 'generated::uYJ0Q1B5O3meHWVs',
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
    'generated::OPy0U5hIC5eyQaOi' => 
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
        'as' => 'generated::OPy0U5hIC5eyQaOi',
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
    'generated::onwI0SfBtx6Ls40c' => 
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
        'as' => 'generated::onwI0SfBtx6Ls40c',
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
    'generated::9qa6txr2U6qCNNM5' => 
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
        'as' => 'generated::9qa6txr2U6qCNNM5',
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
    'generated::z0vpcMEb3EiIFlxd' => 
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
        'as' => 'generated::z0vpcMEb3EiIFlxd',
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
    'generated::veNtVILRhKdkub6j' => 
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
        'as' => 'generated::veNtVILRhKdkub6j',
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
    'generated::TGQFruyMFEameUjj' => 
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
        'as' => 'generated::TGQFruyMFEameUjj',
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
    'generated::PlO9ysrqr0q151cE' => 
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
        'as' => 'generated::PlO9ysrqr0q151cE',
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
    'generated::Y5RBLx3FAkT5bSLk' => 
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
        'as' => 'generated::Y5RBLx3FAkT5bSLk',
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
    'generated::vk8qK3USo9ZhviF2' => 
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
        'as' => 'generated::vk8qK3USo9ZhviF2',
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
    'generated::0veGmbZUGjkFz2Dd' => 
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
        'as' => 'generated::0veGmbZUGjkFz2Dd',
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
    'generated::gOaIn2WEoGuJDZvp' => 
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
        'as' => 'generated::gOaIn2WEoGuJDZvp',
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
    'generated::BrVXZwIIXjM7Z9QH' => 
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
        'as' => 'generated::BrVXZwIIXjM7Z9QH',
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
    'generated::jjPsmvAckNPrzasW' => 
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
        'as' => 'generated::jjPsmvAckNPrzasW',
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
    'generated::VOpnRex1mXqSIDcW' => 
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
        'as' => 'generated::VOpnRex1mXqSIDcW',
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
    'generated::aFiYBF5w1TU36Icb' => 
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
        'as' => 'generated::aFiYBF5w1TU36Icb',
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
    'generated::myqy2cx8e1GL02lR' => 
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
        'as' => 'generated::myqy2cx8e1GL02lR',
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
    'generated::VoZei81yuP8Ny3yx' => 
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
        'as' => 'generated::VoZei81yuP8Ny3yx',
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
    'generated::0G5I5iOcWiIkBswq' => 
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
        'as' => 'generated::0G5I5iOcWiIkBswq',
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
    'generated::xfNyVCJ74s5ByhbC' => 
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
        'as' => 'generated::xfNyVCJ74s5ByhbC',
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
    'generated::7fN1X9ckkt8zYYTu' => 
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
        'as' => 'generated::7fN1X9ckkt8zYYTu',
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
    'generated::1KMz0olByCJ27Wl0' => 
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
        'as' => 'generated::1KMz0olByCJ27Wl0',
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
    'generated::4faAcwjYohUqmHog' => 
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
        'as' => 'generated::4faAcwjYohUqmHog',
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
    'generated::fL12kQ28Ih0WolPj' => 
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
        'as' => 'generated::fL12kQ28Ih0WolPj',
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
    'generated::9m0RvAwD0A6Vi7Tf' => 
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
        'as' => 'generated::9m0RvAwD0A6Vi7Tf',
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
    'generated::fD1XytBkbmoWBf9F' => 
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
        'as' => 'generated::fD1XytBkbmoWBf9F',
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
    'generated::arD9TWgglflIBKr9' => 
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
        'as' => 'generated::arD9TWgglflIBKr9',
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
    'generated::MX022nuKnUu50RP8' => 
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
        'as' => 'generated::MX022nuKnUu50RP8',
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
    'generated::Vg2Rg9T2O7GCgnGP' => 
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
        'as' => 'generated::Vg2Rg9T2O7GCgnGP',
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
    'generated::q0SAxfHYil5ulsfs' => 
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
        'as' => 'generated::q0SAxfHYil5ulsfs',
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
    'generated::X5epprtrVlkne2IT' => 
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
        'as' => 'generated::X5epprtrVlkne2IT',
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
    'generated::MmAkU60i07fG9jHf' => 
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
        'as' => 'generated::MmAkU60i07fG9jHf',
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
    'generated::JwxBwdW4g4h2f9qq' => 
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
        'as' => 'generated::JwxBwdW4g4h2f9qq',
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
    'generated::qH6YWQmM8w0OVU5a' => 
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
        'as' => 'generated::qH6YWQmM8w0OVU5a',
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
    'generated::cYcHrfX83lWMqPA0' => 
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
        'as' => 'generated::cYcHrfX83lWMqPA0',
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
    'generated::XD3PBko5jkxJ4air' => 
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
        'as' => 'generated::XD3PBko5jkxJ4air',
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
    'generated::9qaQFbHywR6VdsgJ' => 
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
        'as' => 'generated::9qaQFbHywR6VdsgJ',
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
    'generated::umKVcjnRNXpRaZLc' => 
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
        'as' => 'generated::umKVcjnRNXpRaZLc',
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
    'generated::Yb5cKPZejIjy2kXJ' => 
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
        'as' => 'generated::Yb5cKPZejIjy2kXJ',
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
    'generated::BWNYQV2VOh9HkjjK' => 
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
        'as' => 'generated::BWNYQV2VOh9HkjjK',
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
    'generated::mCs1fZ5OJday5ijZ' => 
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
        'as' => 'generated::mCs1fZ5OJday5ijZ',
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
    'generated::VBodXYWKYf2TQlHY' => 
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
        'as' => 'generated::VBodXYWKYf2TQlHY',
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
    'generated::kfDDTMWyHLyo8aSv' => 
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
        'as' => 'generated::kfDDTMWyHLyo8aSv',
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
    'generated::662IGJVBczwhAn1c' => 
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
        'as' => 'generated::662IGJVBczwhAn1c',
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
    'generated::TfuoaExf4tbNRVj6' => 
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
        'as' => 'generated::TfuoaExf4tbNRVj6',
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
    'generated::eW8ccxzuDP9m7Alf' => 
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
        'as' => 'generated::eW8ccxzuDP9m7Alf',
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
    'generated::cU83BkHubXkzzBDz' => 
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
        'as' => 'generated::cU83BkHubXkzzBDz',
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
    'generated::tTeYjIeBLQdbOZIf' => 
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
        'as' => 'generated::tTeYjIeBLQdbOZIf',
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
    'generated::WKQXuJ2ayjLCKDOW' => 
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
        'as' => 'generated::WKQXuJ2ayjLCKDOW',
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
    'generated::UPBn8WnrLJddDVOY' => 
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
        'as' => 'generated::UPBn8WnrLJddDVOY',
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
    'generated::DQpXNHQYLHfIe6ZZ' => 
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
        'as' => 'generated::DQpXNHQYLHfIe6ZZ',
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
    'generated::UG1D6efc42tmG02Z' => 
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
        'as' => 'generated::UG1D6efc42tmG02Z',
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
    'generated::8pli3xGTsoI9UJWr' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":293:{@jZgSHJ6Oc0t8MiJQX3MnCIvV7PIdrJmNojjc3oKvquY=.a:5:{s:3:"use";a:0:{}s:8:"function";s:70:"function () {
    return \\redirect()->away(\\env(\'APP_PANEL_URL\'));
}";s:5:"scope";s:48:"BuscaAtivaEscolar\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000553575870000000023beabea";}}',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::8pli3xGTsoI9UJWr',
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
    'generated::IcUkQGXxEGSs8Zkd' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":269:{@m5GvV2T/WnjTUuGKlf/4w4YMqB20JwaYYPwnejF5QJs=.a:5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
	return \\view(\'cors_proxy\');
}";s:5:"scope";s:48:"BuscaAtivaEscolar\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"000000005535744d0000000023beabea";}}',
        'namespace' => 'BuscaAtivaEscolar\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::IcUkQGXxEGSs8Zkd',
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
    'generated::tFe3c3IxNtBDQESA' => 
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
        'as' => 'generated::tFe3c3IxNtBDQESA',
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
    'generated::00c72CMJnapvjn1o' => 
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
        'as' => 'generated::00c72CMJnapvjn1o',
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
