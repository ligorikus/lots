<?php

namespace App\Repositories;


use App\Models\User;

class UserRepositoryEloquent implements UserRepository
{
    protected $user;

    public function __construct(User $user)
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

    public function getLots($user_id)
    {
        return $this->find($user_id)->lots()->get();
    }
}