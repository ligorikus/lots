<?php

namespace App\Repositories;


interface UserRepository
{
    public function all();

    public function find($id);

    public function findBy($att, $column);

    public function getLots($user_id);
}