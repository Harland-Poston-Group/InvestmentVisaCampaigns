<?php


    use DeepL\Translator;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Cache;
    use GuzzleHttp\Client;

    /**
     * Translate text using DeepL API.
     *
     * @param string $text The text to translate.
     * @param string $targetLang The target language code (e.g., 'FR' for French).
     * @param string|null $sourceLang The source language code, or null to auto-detect.
     * @return string|null The translated text or null on failure.
     */
    function translate(string $text, string $targetLang, bool $strip_tags = false, ?string $sourceLang = null, int $cacheDuration = 6): ?string
    {

        if( $targetLang === 'en' ){

            return $text;

        }else{

            if( $targetLang === 'pt' ){
                $targetLang = 'pt-PT';
            }

            // Strip HTML tags from the text before translation
            // EDIT: Commented this as I've found the tag_handling option in the DeepL API Documentation which allows us
            // to translate text within HTML tags and reinserted the translated contexted text within the HTML tags
            // Will enable this for testing purposes to see how well it works
            if( $strip_tags ){
                $text = strip_tags($text);
            }

            // Generate a unique cache key for this text and language
            $cacheKey = "translation_{$targetLang}_" . md5($text);

            // Check if the translation is already cached
            return Cache::remember($cacheKey, now()->addWeeks($cacheDuration), function () use ($text, $targetLang, $sourceLang) {
                try {
                    $apiKey = config('deepl.api_key');
                    $translator = new Translator($apiKey);

                    $options = [
                        'tag_handling'  =>  'html',
                    ];

                    // Perform the translation
                    $result = $translator->translateText($text, $sourceLang, $targetLang, $options);

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

    /**
     * ZeroBounce - Verify credibility of an email address to spoof BOT submissions
     *
     * @param string $lang The language to check.
     * @return bool True if the language is supported, false otherwise.
     */
    function verify($email){

        // Call ZeroBounce API to verify email
        $client = new Client();
        $response = $client->get("https://api.zerobounce.net/v2/validate?api_key=" . env('ZEROBOUNCE_API_KEY') . "&email={$email}");
        $data = json_decode($response->getBody(), true);


        if( $data['status'] == 'invalid' ){

            // Evaluate the sub_status and return response according to that
            switch ( $data['sub_status'] ) {
                case 'possible_typo':
                    # code...
                    return response()->json(['email_verification_error' => 'Incorrect email, did you mean ' . $data['did_you_mean'] . '?'], 400);
                    break;
                case 'mailbox_not_found':
                    return response()->json(['email_verification_error' => 'Mailbox not found. Please insert a valid email address'], 400);
                    break;
                default:
                    return response()->json(['email_verification_error' => 'Invalid email'], 400);
                    # code...
                    break;
            }

        }

        if( $data['status'] == 'abuse' ){

            switch ($data['sub_status']) {
                case 'PLACEHOLDER':
                    return response()->json(['email_verification_error' => 'Email Address labelled for spam.'], 400);
                    break;
                default:
                    return response()->json(['email_verification_error' => 'Email Address labelled for spam.'], 400);
                    # code...
                    break;
            }


        }

        // return true;
        return response()->json(['message' => 'Valid email'], 200);
        // return $next($request);
    }

    // Compile blocked emails by ZeroBounce
    function writeBlockedEmail(string $email, string $reason): void
    {
        $filePath = storage_path('logs/blocked_emails.json');

        // If the file doesn't exist, create it with an empty array
        if (! file_exists($filePath)) {
            file_put_contents($filePath, json_encode([]));
        }

        // Read and decode the existing JSON; fallback to empty array if it's invalid
        $content = file_get_contents($filePath);
        $blockedEmails = json_decode($content, true);
        if (! is_array($blockedEmails)) {
            $blockedEmails = [];
        }

        // Check if this email is already in the file
        foreach ($blockedEmails as $item) {
            if (isset($item['email']) && $item['email'] === $email) {
                // If it's already there, do nothing and return
                return;
            }
        }

        // Append the new blocked email
        $blockedEmails[] = [
            'email'      => $email,
            'reason'     => $reason,
            'blocked_at' => now()->toDateTimeString(),
        ];

        // Write the updated array back to the file
        file_put_contents($filePath, json_encode($blockedEmails, JSON_PRETTY_PRINT));
    }

    // Block specific domains in submitted email addresses
    function isBlockedEmailDomain($email)
    {

        // Define blocked domains
        $blockedDomains = ['th.com', 'armyspy.com', 'teleworm.us', 'dayrep.com', 'isorax.com'];

        // Extract domain from email
        $emailDomain = substr(strrchr($email, "@"), 1);

        return in_array($emailDomain, $blockedDomains);
    }