<?php

namespace App\Services;

use App\Chains\Bet\CheckSum;
use App\Chains\Bet\CheckUser;
use App\Chains\Bet\PlaceBet;
use App\Models\Lot;
use App\Models\User;
use App\Repositories\LotRepository;

class BetsService
{
    /**
     * @var CheckSum
     */
    protected $checkSum;

    /**
     * @var CheckUser
     */
    protected $checkUser;

    /**
     * @var PlaceBet
     */
    protected $placeBet;

    /**
     * @var LotRepository
     */
    protected $lotRepository;

    /**
     * BetsService constructor.
     * @param CheckSum $checkSum
     * @param CheckUser $checkUser
     * @param PlaceBet $placeBet
     * @param LotRepository $lotRepository
     */
    public function __construct(CheckSum $checkSum, CheckUser $checkUser, PlaceBet $placeBet, LotRepository $lotRepository)
    {
        $this->lotRepository = $lotRepository;

        $this->checkSum  = $checkSum;
        $this->checkUser = $checkUser;
        $this->placeBet  = $placeBet;

        $checkSum->setNext($checkUser);
        $checkUser->setNext($placeBet);
    }

    /**
     * @param Lot $lot
     * @param User $user
     * @param $sum
     * @return mixed
     */
    public function bet(Lot $lot, User $user, $sum)
    {
        //Create Bet Model for Chain
        $bet = new \App\Chains\Bet\Bet($lot, $user, $sum, $this->lotRepository);

        //Run Chain
        $message = $this->checkSum->next($bet);

        return $message;
    }
}