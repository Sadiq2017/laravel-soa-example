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
    public function activity(Request $request)
    {
        $page=$request->get('page')??1;
        $perPage=$request->get('per-page')??1;
        $response=$this->client->send('getPageTracker',['page'=>$page,'per-page'=>$perPage]);
        $data=$response['result']['original']['data'];
        return view('admin.activity',compact('data'));
    }

}
