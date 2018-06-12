<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
     * @param LotRepository $lotRepository
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

    public function index()
    {
        $user = auth()->user();
        return $this->userRepository->getLots($user->id);
    }

    public function lots(User $user)
    {
        return $this->userRepository->getLots($user->id);
    }

    public function show(Lot $lot)
    {
        return $lot->with(['user','price'])->find($lot->id);
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

        $lot = auth()->user()->lots()->create($data);
        $lot->price()->create([
            'price' => $data['start_price']
        ]);
        return $lot;
    }

    public function update(Lot $lot, LotRequest $request)
    {
        if (auth()->user()->cannot('update', $lot)) {
            return response()->json(['success'=>false],403);
        }
        $data = $request->only([
            'title',
            'description',
            'start_price',
            'step',
            'blitz'
        ]);

        $lot->update($data);

        return response()->json(['success'=>true]);
    }
}
