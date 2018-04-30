<?php

namespace App\Repositories;

use App\Models\Lot;

class LotRepositoryEloquent implements LotRepository
{
    protected $lot;

    public function __construct(Lot $lot)
    {
        $this->lot = $lot;
    }

    public function all()
    {
        return $this->lot->with('user')->get();
    }

    public function find($id)
    {
        return $this->lot->find($id);
    }

    public function findBy($att, $column)
    {
        return $this->lot->where($att, $column);
    }
}