<?php

namespace App\Chains\Bet;

use App\Chains\BaseHandler;
use App\Chains\Handler;

/**
 * Class CheckUser
 * @package App\Chains\Bet
 */
class CheckUser extends BaseHandler implements Handler
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @return bool
     */
    public function handle()
    {
        //This lot have bets?
        $haveBets = $this->request->lot->countBets() > 0;

        if (!$haveBets)
        {
            return true;
        }

        //Getting last bet in this lot
        $lastBet = $this->request->lot->lastBet();
        $currentUser = $this->request->user->id == $lastBet->better_id;

        if ($currentUser)
        {
            $message = $this->message = response()->json([
                'status' => 'failed',
                'message' => 'You already bet this lot'
            ]);
            return false;
        }

        return true;
    }
}