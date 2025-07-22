<?php

namespace Developvi\LaravelSlugI18n;

use Illuminate\Support\Str;

class SlugI18n
{
    /**
     * Generate a multilingual slug, skipping transliteration for certain locales.
     *
     * @param string $title
     * @param string $separator
     * @param string $language
     * @param array  $dictionary
     * @param bool   $forceSkip Force skip transliteration regardless of config
     * @return string
     */
    public static function slug($title, $separator = '-', $language = 'en', $dictionary = ['@' => 'at'], $forceSkip = false)
    {
        // Check if the feature is enabled from config
        $enabled = config('slug-i18n.enabled', true);
        $skipLocales = config('slug-i18n.skip_locales', []);

        // Determine if we should skip transliteration
        if ($forceSkip === true || ($enabled && in_array($language, $skipLocales))) {
            $language = ''; // Skip transliteration
        }


        // Call Laravel's original Str::slug() with all params
        return Str::slug(
            $title,
            $separator,
            $language,
            $dictionary
        );
    }
}
