<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Email Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi email untuk notifikasi admin
    |
    */

    'email' => env('ADMIN_EMAIL', 'ardykaaw26@gmail.com'),
    'name' => env('ADMIN_NAME', 'Admin Desa Timbala'),
    
    /*
    |--------------------------------------------------------------------------
    | Notification Settings
    |--------------------------------------------------------------------------
    |
    | Pengaturan notifikasi untuk berbagai event
    |
    */
    
    'notifications' => [
        'service_created' => env('NOTIFY_SERVICE_CREATED', true),
        'service_updated' => env('NOTIFY_SERVICE_UPDATED', false),
        'service_deleted' => env('NOTIFY_SERVICE_DELETED', true),
        'news_created' => env('NOTIFY_NEWS_CREATED', true),
        'publication_created' => env('NOTIFY_PUBLICATION_CREATED', true),
    ],
];
