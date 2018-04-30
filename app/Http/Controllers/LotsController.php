<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotRequest;
use App\Models\Lot;
use App\Models\User;
use App\Repositories\UserRepository;

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

    public function all()
    {
        return Lot::with('user')->get();
    }

    public function index(User $user = null)
    {
        if($user == null)
        {
            $user = auth()->user();
        }

        return $this->userRepository->getLots($user->id);
    }

    public function show(Lot $lot)
    {
        return $lot;
    }

    /**
     * @param LotRequest $request
     * @return mixed
     */
    public function store(LotRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
            'start_price',
            'step',
            'blitz'
        ]);
        $data['status'] = 0;

        return auth()->user()->lots()->create($data);
    }
}
