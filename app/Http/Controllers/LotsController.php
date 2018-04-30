<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotRequest;
use App\Models\Lot;
use App\Models\User;
use App\Repositories\LotRepository;
use App\Repositories\UserRepository;

class LotsController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var LotRepository
     */
    protected $lotRepository;

    /**
     * LotsController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, LotRepository $lotRepository)
    {
        $this->userRepository = $userRepository;
        $this->lotRepository = $lotRepository;
    }

    public function all()
    {
        return $this->lotRepository->all();
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
