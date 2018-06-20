<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'slug',
        'name'
    ];

    public function role_user()
    {
        return $this->hasMany(RoleUser::class,'role_id');
    }
}
