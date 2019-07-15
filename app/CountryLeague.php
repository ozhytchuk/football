<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryLeague extends Model
{
    protected $table = 'country_league';

    protected $fillable = ['country_id', 'league_id'];
}