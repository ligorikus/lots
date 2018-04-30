<?php

namespace App\Repositories;

use App\Models\Lot;

class LotRepositoryEloquent implements LotRepository
{
    protected $lot;

    public function __construct(Lot $lot)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function findBy($att, $column)
    {
        return $this->user->where($att, $column);
    }
}