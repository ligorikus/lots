<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'lot_id',
        'better_id',
        'sum'
    ];

    public function bets()
    {
        return $this->belongsTo(Lot::class);
    }
}
