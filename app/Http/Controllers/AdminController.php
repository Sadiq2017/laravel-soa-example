<?php

declare(strict_types=1);

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
    public function activity(Request $request)
    {
        $page = $request->get('page') ?? 1;

        $response = $this->client->send('getPageTracker', ['page' => $page]);

        $data = $response['result']['original']['data'];

        $pageCount = $response['result']['original']['pageCount'];

        return view('admin.activity', compact('data', 'pageCount', 'page'));
    }

}
