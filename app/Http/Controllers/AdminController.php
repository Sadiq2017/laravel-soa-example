<?php

namespace App\Http\Controllers;

use App\Services\JsonRpcClient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activity(): array
    {
        $data=$this->client->send('getPageTracker');
        return $data['result'];
    }

}
