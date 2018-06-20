<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $lot_id
 * @property integer $better_id
 * @property integer $sum
 */
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
