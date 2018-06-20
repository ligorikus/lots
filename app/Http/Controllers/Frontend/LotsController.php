<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lot;
use App\Http\Controllers\Controller;

class LotsController extends Controller
{
    public function index()
    {
        return view('lots.user_lots');
    }

    public function all()
    {
        return view('lots.index');
    }

    public function create()
    {
        return view('lots.create');
    }

    public function edit(Lot $lot)
    {
        return view('lots.edit',compact('lot'));
    }

    public function show(Lot $lot)
    {
        return view('lots.show',compact('lot'));
    }
}
