<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BetRequest;
use App\Models\Lot;
use App\Services\BetsService;

class BetsController extends Controller
{
    /**
     * @param BetRequest $request
     * @param Lot $lot
     * @param BetsService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function bet(BetRequest $request, Lot $lot, BetsService $service)
    {
        return $service->bet($lot, auth()->user(), $request->sum);
    }
}
