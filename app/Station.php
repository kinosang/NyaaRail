<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'coordinate'];

    public function lines()
    {
        return $this->belongsToMany('App\Line');
    }
}
