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
    public function all();

    public function find($id);

    public function findBy($att, $column);
}