<?php
/**
 * Created by PhpStorm.
 * User: ligo
 * Date: 30.04.18
 * Time: 12:32
 */

namespace App\Repositories;

interface LotRepository
{
    /**
     * @return \App\Models\Lot[]Collection
     */
    public function all();

    /**
     * @param $id
     * @return \App\Models\Lot
     */
    public function find($id);

    /**
     * @param $att
     * @param $column
     * @return \App\Models\Lot
     */
    public function findBy($att, $column);

    /**
     * @return \App\Models\Bet
     */
    public function lastBet();

    /**
     * @return integer
     */
    public function getPrice();

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function bets();

    /**
     * @return integer
     */
    public function countBets();

    /**
     * @return \App\Models\Lot;
     */
    public function getLot();

    /**
     * @param \App\Models\Lot $lot
     * @return LotRepository
     */
    public function setLot(\App\Models\Lot $lot);
}