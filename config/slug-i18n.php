<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enable Slug I18n
    |--------------------------------------------------------------------------
    |
    | Set SLUG_I18N_ENABLED=true in your .env file to enable this feature.
    |
    */
    'enabled' => env('SLUG_I18N_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Skip Transliteration Locales
    |--------------------------------------------------------------------------
    |
    | Set SLUG_I18N_SKIP_LOCALES in your .env file as a comma-separated list.
    | Example: SLUG_I18N_SKIP_LOCALES=ar,fa,ur
    |
    */
    'skip_locales' =>  [
        ...array_filter(
            explode(',', (string) env('SLUG_I18N_SKIP_LOCALES', ''))
        ),
    ],
];
