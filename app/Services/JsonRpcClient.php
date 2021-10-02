<?php

declare(strict_types=1);

namespace App\Services;

use App\Utility\GenerationToken;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'page-tracker';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Token' => GenerationToken::generate()
            ],
            'base_uri' => config('services.page_tracker.url')
        ]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(string $method, array $params = array()): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => null,
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        $result = json_decode($response, true);

        if ($result['status'] != 200) {
            abort($result['status']);
        }

        return json_decode($response, true);
    }
}
