<?php declare(strict_types=1);

return [
    /*
     *  Automatic registration of routes will only happen if this setting is `true`
     */
    'enabled' => true,

    /*
     * Controllers in these directories that have routing attributes
     * will automatically be registered.
     *
     * Optionally, you can specify group configuration by using key/values
     */
    'directories' => [
        base_path('src/Common/User/Presentation/Controller/Api/V1/Index') => [
            'namespace' => 'Core\Common\User\Presentation\Controller\Api\V1\Index\\',
            'prefix' => 'api',
            'middleware' => 'api',
            'patterns' => ['*Action.php']
        ],
        base_path('src/Common/User/Presentation/Controller/Api/V1/Show') => [
            'namespace' => 'Core\Common\User\Presentation\Controller\Api\V1\Show\\',
            'prefix' => 'api',
            'middleware' => 'api',
            'patterns' => ['*Action.php']
        ],
        base_path('src/Common/User/Presentation/Controller/Api/V1/Store') => [
            'namespace' => 'Core\Common\User\Presentation\Controller\Api\V1\Store\\',
            'prefix' => 'api',
            'middleware' => 'api',
            'patterns' => ['*Action.php']
        ],
        base_path('src/Common/User/Presentation/Controller/Api/V1/Update') => [
            'namespace' => 'Core\Common\User\Presentation\Controller\Api\V1\Update\\',
            'prefix' => 'api',
            'middleware' => 'api',
            'patterns' => ['*Action.php']
        ],
        base_path('src/Common/User/Presentation/Controller/Api/V1/Destroy') => [
            'namespace' => 'Core\Common\User\Presentation\Controller\Api\V1\Destroy\\',
            'prefix' => 'api',
            'middleware' => 'api',
            'patterns' => ['*Action.php']
        ],
    ],

    /*
     * This middleware will be applied to all routes.
     */
    'middleware' => [
        \Illuminate\Routing\Middleware\SubstituteBindings::class
    ],

    /*
     * When enabled, implicitly scoped bindings will be enabled by default.
     * You can override this behaviour by using the `ScopeBindings` attribute, and passing `false` to it.
     *
     * Possible values:
     *  - null: use the default behaviour
     *  - true: enable implicitly scoped bindings for all routes
     *  - false: disable implicitly scoped bindings for all routes
     */
    'scope-bindings' => null,
];
