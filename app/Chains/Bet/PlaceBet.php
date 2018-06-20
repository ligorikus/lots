<?php

namespace App\Chains\Bet;

use App\Chains\BaseHandler;
use App\Chains\Handler;

/**
 * Class PlaceBet
 * @package App\Chains\Bet
 */
class PlaceBet extends BaseHandler implements Handler
{
    /**
     * @var \App\Models\User
     */
    protected $user;

    function handle()
    {
        $price = $this->request->lot->getLot()->price();
        $price->update(['price' => $this->request->sum]);

        $this->message = $this->request->lot->getLot()->bets()->create([
            'sum' => $this->request->sum,
            'better_id' => $this->request->user->id
        ], 200);

        return true;
    }
}