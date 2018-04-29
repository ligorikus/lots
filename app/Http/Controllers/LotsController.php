<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class LotsController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * LotsController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return Lot::all();
    }

    public function lots(User $user)
    {
        return $this->userRepository->getLots($user->id);
    }
}
