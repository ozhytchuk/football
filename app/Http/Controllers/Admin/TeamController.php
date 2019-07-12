<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeamRequest;
use App\League;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.teams.index', [
            'allLeagues' => League::all(),
            'counter' => 1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teams.create' , [
            'leagues' => League::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $goalsDifference = ($request->input('gf') - $request->input('ga'));
        $points = (($request->input('win')*3) + ($request->input('draw')*1));

        Team::create([
            'team_title' => $request->input('team'),
            'league_id' => $request->input('league_id'),
            'gp' => $request->input('gp'),
            'win' => $request->input('win'),
            'draw' => $request->input('draw'),
            'lost' => $request->input('lost'),
            'gf' => $request->input('gf'),
            'ga' => $request->input('ga'),
            'gd' => $goalsDifference,
            'points' => $points,
        ]);

        return redirect(route('teams.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
