<?php

namespace App\Chains\Bet;

use App\Models\Lot;
use App\Models\User;
use App\Repositories\LotRepository;

class Bet
{
    /**
     * @var \App\Repositories\LotRepository
     */
    public $lot;

    /**
     * @var User
     */
    public $user;

    /**
     * @var integer
     */
    public $sum;

    /**
     * Bet constructor.
     * @param Lot $lot
     * @param User $user
     * @param $sum
     * @param LotRepository $lotRepository
     */
    public function __construct(Lot $lot, User $user, $sum, LotRepository $lotRepository)
    {
        $this->lot = $lotRepository->setLot($lot);
        $this->user = $user;
        $this->sum  = $sum;
    }
}