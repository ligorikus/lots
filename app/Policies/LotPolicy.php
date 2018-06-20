<?php

namespace App\Policies;

use App\Models\Lot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LotPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(User $user, $ability)
    {
        if ($user->role()->first()->role_id == 1) {
            return true;
        }
    }

    public function update(User $user, Lot $lot)
    {
        return $user->id === $lot->owner_id;
    }
}
