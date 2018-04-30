<?php

namespace App\Http\Controllers;

use App\Http\Requests\BetRequest;
use App\Models\Lot;

class BetsController extends Controller
{
    /**
     * @param BetRequest $request
     * @param Lot $lot
     */
    public function bet(BetRequest $request, Lot $lot)
    {
        if ($lot->price()->price >= $request->sum)
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'Sum of bet less than current lots price'
            ]);
        }

        if (
            $lot->bets()->count() > 0
            AND
            $lot->bets()->latest()->first()->better_id == auth()->user()->id)
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'You already bet this lot'
            ]);
        }

        $price = $lot->price()->first();
        $price->price = $request->sum;
        $price->update();

        return $lot->bets()->create([
            'sum' => $request->sum,
            'better_id' => auth()->user()->id
        ]);
    }
}
