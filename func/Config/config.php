<?php

return [
    'abacus' => [
        'api_key' => getenv('s2_1d2ce4de792c473ebc0f48a5ef49a25e'),
        'api_endpoint' => getenv('ABACUS_API_ENDPOINT') ?? 'https://api.abacus.ai/v0/inference',
    ],
    'cache' => [
        'directory' => __DIR__ . '/../../cache',
        'duration' => 3600, // 1 hour
    ],
    'logging' => [
        'directory' => __DIR__ . '/../../logs',
        'level' => 'DEBUG',
    ],
];