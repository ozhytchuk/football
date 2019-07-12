<?php

namespace App\Http\Controllers;

use App\League;
use App\Team;

class SiteController extends Controller
{
    public function index()
    {
        return view('test', [
            'leagues' => Team::with('leagues')->get(),
        ]);
    }
}