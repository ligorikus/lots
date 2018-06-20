<?php

namespace App\Chains\Bet;

use App\Chains\BaseHandler;
use App\Chains\Handler;

/**
 * Class CheckSum
 * @package App\Chains\Bet
 */
class CheckSum extends BaseHandler implements Handler
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
        // This sum > lot->price
        $validSum = $this->request->sum > $this->request->lot->getPrice();

        if (!$validSum)
        {
            $this->message = response()->json([
                'status' => 'failed',
                'message' => 'Sum of bet less than current lots price'
            ]);
            return false;
        }

        return true;
    }
}