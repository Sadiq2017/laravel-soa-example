<?php

namespace App\Http\Controllers;

use App\Services\JsonRpcClient;
use Illuminate\Http\Request;

class SiteController extends Controller
{



    public function page1(Request $request): string
    {
        return __METHOD__;
    }

    public function page2(Request $request): string
    {
        return __METHOD__;
    }


    public function page3(Request $request): string
    {
        return __METHOD__;
    }


    public function page4(Request $request): string
    {
        return __METHOD__;
    }

    public function page5(Request $request): string
    {
        return __METHOD__;
    }
}
