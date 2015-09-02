<?php

return [

    'database' => [
        'tables' => [
            'event_log'           => 'event_log',
            'event_stream'        => 'event_stream',
            'projectors'    => 'projectors',
            'workflows'     => 'workflows',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Projections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'projections' => [

        'core' => [
            \BoundedContext\Projection\AggregateCollections\Projection::class =>
                \BoundedContext\Laravel\Illuminate\Projection\AggregateCollections::class,
        ],

        'domain' => [
            \Domain\Test\Projection\ActiveEmails\Projection::class =>
                \Infrastructure\Domain\Projection\ActiveEmails::class,

            \Domain\Test\Projection\ActiveUsernames\Projection::class =>
                \Infrastructure\Domain\Projection\ActiveUsernames::class,
        ],

        'app' => [
            \App\Projections\Users\Projection::class =>
                \Infrastructure\App\Projection\Users::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Workflows
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'workflows' => [

        'app' => [
            \App\Workflows\Greeting::class
            /*
            \App\Workflow\User::class,
            \App\Workflow\Another::class,
            */
        ],

        'domain' => [
            /*
            \Domain\Test\Workflow\User::class,
            \Domain\Test\Workflow\Another::class,
            */
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Commands
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'commands' => [

        '5225203f-3ff0-44aa-9142-4da277e6c009' =>
            \Domain\Test\Aggregate\User\Command\Create::class,

        '6cdac48b-a73f-458b-9224-766810458c0b' =>
            \Domain\Test\Aggregate\User\Command\ChangeUsername::class,

        '3f48bd5d-e02b-456a-9989-8f839386411b' =>
            \Domain\Test\Aggregate\User\Command\Delete::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'events' => [

        'cfd9ef79-2cf3-4ee6-805f-619f72352921' =>
            \Domain\Test\Aggregate\User\Event\Created::class,

        'a55e6792-1136-4f79-b6dd-021238e9b615' =>
            \Domain\Test\Aggregate\User\Event\UsernameChanged::class,

        'fb1685e5-c751-4dd2-a318-40e75f234e4d' =>
            \Domain\Test\Aggregate\User\Event\Deleted::class,

    ],
];