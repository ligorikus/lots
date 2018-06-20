<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotPrice extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'lot_id',
        'price'
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }
}
