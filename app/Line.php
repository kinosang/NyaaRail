<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = ['name', 'station_neighbours'];

    public function stations()
    {
        return $this->belongsToMany('App\Station')->orderBy('station_no');
    }
}
