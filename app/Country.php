<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name_of_country'];

    public function leagues()
    {
        return $this->belongsToMany(League::class);
    }
}