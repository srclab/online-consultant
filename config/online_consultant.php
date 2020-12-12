<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Используемый онлайн-консультант
     |--------------------------------------------------------------------------
     |
     | talkme, webim
     |
     */
    'online_consultant' => 'talk_me',

    /*
     |--------------------------------------------------------------------------
     | Настройки подключений к сторонним api мессенджеров
     |--------------------------------------------------------------------------
     |
     |
     */
    'accounts' => [

        'talk_me' => [
            'api_token' => env('SRCLAB_ONLINE_CONSULTANT_TALK_ME_API_TOKEN', ''),
            'webhook_secret' => env('SRCLAB_ONLINE_CONSULTANT_TALK_ME_WEBHOOK_SECRET', ''),
            'default_operator' => env('SRCLAB_ONLINE_CONSULTANT_TALK_ME_DEFAULT_OPERATOR', ''),
        ],
        'webim' => [
            'api_token' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_API_TOKEN', ''),
            'subdomain' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_SUBDOMAIN', ''),
            'login' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_LOGIN', ''),
            'password' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_PASSWORD', ''),
            'webhook_secret' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_WEBHOOK_SECRET', ''),
            'bot_operator_name' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_BOT_OPERATOR_NAME', ''),
            'bot_operator_id' => env('SRCLAB_ONLINE_CONSULTANT_WEBIM_BOT_OPERATOR_ID', ''),
        ],

    ],

];