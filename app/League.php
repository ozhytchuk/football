<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['league_title'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}