<?php

declare(strict_types=1);

use App\Models\User;

return [

    'driver' => env('SCOUT_DRIVER', 'meilisearch'),

    'prefix' => env('SCOUT_PREFIX', ''),

    'queue' => env('SCOUT_QUEUE', false),

    'after_commit' => false,

    'chunk' => [
        'searchable' => 500,
        'unsearchable' => 500,
    ],

    'soft_delete' => false,

    'identify' => env('SCOUT_IDENTIFY', false),

    // -----------------------------------------------------------------------------------------------------------------
    // Meilisearch Configuration
    // See: https://www.meilisearch.com/docs/learn/configuration/instance_options#all-instance-options
    // -----------------------------------------------------------------------------------------------------------------

    'meilisearch' => [
        'host' => env('MEILISEARCH_HOST', 'http://localhost:7700'),
        'key' => env('MEILISEARCH_KEY'),
        'index-settings' => [
            User::class => [
                'filterableAttributes' => ['id', 'name', 'email'],
                'sortableAttributes' => ['created_at', "name"],
            ],
        ],
    ],
];
