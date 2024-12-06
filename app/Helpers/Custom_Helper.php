<?php


    use DeepL\Translator;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Cache;

    /**
     * Translate text using DeepL API.
     *
     * @param string $text The text to translate.
     * @param string $targetLang The target language code (e.g., 'FR' for French).
     * @param string|null $sourceLang The source language code, or null to auto-detect.
     * @return string|null The translated text or null on failure.
     */
    function translate(string $text, string $targetLang, ?string $sourceLang = null, int $cacheDuration = 6): ?string
    {

        if( $targetLang === 'en' ){

            return $text;

        }else{

            if( $targetLang === 'pt' ){
                $targetLang = 'pt-PT';
            }

            // Generate a unique cache key for this text and language
            $cacheKey = "translation_{$targetLang}_" . md5($text);
        
            // Check if the translation is already cached
            return Cache::remember($cacheKey, now()->addHours($cacheDuration), function () use ($text, $targetLang, $sourceLang) {
                try {
                    $apiKey = config('deepl.api_key');
                    $translator = new Translator($apiKey);
        
                    // Perform the translation
                    $result = $translator->translateText($text, $sourceLang, $targetLang);
        
                    return $result->text;
                } catch (\Exception $e) {
                    Log::error('Translation failed: ' . $e->getMessage());
                    return null; // Fallback to null if translation fails
                }
            });

        }
    }

    /**
     * Check if a language belongs in the list of supported locales.
     *
     * @param string $lang The language to check.
     * @return bool True if the language is supported, false otherwise.
     */
    function check_supported_locale(string $lang): bool
    {
        // Retrieve the array of supported locales from the config
        $supported_locales = config('localization.supported_locales', []);

        // Check if the language is in the supported locales array
        return in_array($lang, $supported_locales);
    }