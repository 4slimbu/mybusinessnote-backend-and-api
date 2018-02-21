<?php
return [
    'admin' => [
        'settings' => [
            'pagination' => [
                'value' => 15,
                'desc' => 'This sets the no of items to display in admin area listing.'
            ]
        ],
    ],
    'main_app_url' => env('MAIN_APP_URL'),
    'codes' => [
        'TOKEN_NOT_PROVIDED' => 'TOKEN_NOT_PROVIDED',
        'TOKEN_INVALID' => 'TOKEN_INVALID',
    ]
];