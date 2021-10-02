<?php

declare(strict_types=1);

namespace App\Utility;

use ReallySimpleJWT\Token;

class GenerationToken implements GenerationTokenInterface
{

    /**
     * @return string
     */
    public static function generate(): string
    {

        $secret = config('services.page_tracker.secret_key');

        $payload = [
            'iat' => time(),
            'access_key' => config('services.page_tracker.access_key'),
            'exp' => time() + config('services.page_tracker.expire_time'),
            'iss' => 'localhost'
        ];

        return Token::customPayload($payload, $secret);
    }
}
