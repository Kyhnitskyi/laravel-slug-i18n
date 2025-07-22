<?php

namespace Developvi\LaravelSlugI18n;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SlugI18nServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/slug-i18n.php' => config_path('slug-i18n.php'),
        ], 'slug-i18n-config');

        // Extend Str with slugI18n macro
        Str::macro('slugI18n', function ($title, $separator = '-', $language = 'en', $dictionary = ['@' => 'at'], $forceSkip = false) {
            return SlugI18n::slug($title, $separator, $language, $dictionary, $forceSkip);
        });
    }

    public function register()
    {
        // Merge package config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/slug-i18n.php',
            'slug-i18n'
        );
    }
}
