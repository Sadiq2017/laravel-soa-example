<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\JsonRpcClient;
use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Http\Request;


class PageTracker
{

    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(Request $request, Closure $next)
    {
        $this->client->send('setPageTracker',
            [
                'url' => $request->url(),
                'visit_date' => CarbonImmutable::now()->format('Y-m-d H:i:s')
            ]
        );

        return $next($request);
    }
}
