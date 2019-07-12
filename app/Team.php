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
        return $this->hasOne(League::class, 'id');
    }
}