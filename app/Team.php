<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_title', 'league_id', 'gp', 'win', 'draw', 'lost', 'gf', 'ga', 'gd', 'points'
    ];

    public function leagues()
    {
        return $this->hasMany(League::class, 'id', 'league_id');
    }
}