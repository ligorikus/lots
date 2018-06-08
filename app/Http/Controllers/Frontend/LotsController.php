<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LotsController extends Controller
{
    public function index()
    {
        return view('lots.index');
    }

    public function create()
    {
        return view('lots.create');
    }

    public function edit()
    {

    }
}
