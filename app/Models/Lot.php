<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'description',
        'start_price',
        'step',
        'blitz',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }

    public function price()
    {
        return $this->hasOne( LotPrice::class)->first();
    }
}
