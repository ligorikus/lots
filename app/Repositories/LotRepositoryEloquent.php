<?php

namespace App\Repositories;

use App\Models\Lot;

class LotRepositoryEloquent implements LotRepository
{
    /**
     * @var Lot
     */
    protected $lot;

    /**
     * LotRepositoryEloquent constructor.
     * @param Lot $lot
     */
    public function __construct(Lot $lot)
    {
        $this->lot = $lot;
    }

    /**
     * @return Lot[]Collection
     */
    public function all()
    {
        return $this->lot->with(['user', 'price'])->get();
    }

    /**
     * @param $id
     * @return Lot
     */
    public function find($id)
    {
        return $this->lot->find($id);
    }

    /**
     * @param $att
     * @param $column
     * @return Lot
     */
    public function findBy($att, $column)
    {
        return $this->lot->where($att, $column);
    }

    /**
     * @return \App\Models\Bet
     */
    public function lastBet()
    {
        return $this->lot->bets()->latest()->first();
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->lot->price()->first()->price;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function bets()
    {
        return $this->lot->bets()->get();
    }

    /**
     * @return integer
     */
    public function countBets()
    {
        return $this->lot->bets()->count();
    }

    /**
     * @return Lot
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * @param Lot $lot
     * @return LotRepository
     */
    public function setLot(Lot $lot)
    {
        $this->lot = $lot;
        return $this;
    }
}