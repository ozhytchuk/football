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
            'allTeams' => Team::with('leagues')->paginate(10),
            'leaguesWithCountry' => League::with('countries')->get(),
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
        return view('admin.pages.teams.create', [
            'leagues' => League::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $goalsDifference = ($request->input('gf') - $request->input('ga'));
        $points = (($request->input('win') * 3) + ($request->input('draw') * 1));

        $team = Team::create([
            'team_title' => $request->input('team_title'),
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

        return redirect(route('teams.show', ['id' => $team->id]))->with('status',
            'Your record has been successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $teams = Team::with('leagues')->find($team->getAttribute('id'));

        return view('admin.pages.teams.show', [
            'teamInfo' => $teams,
            'leaguesWithCountry' => League::with('countries')->where('id', '=', $teams->league_id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.teams.edit',
            [
                'team' => Team::with('leagues')->find($id),
                'allLeagues' => League::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        $teamInfo = Team::find($id);

        $goalsDifference = ($request->input('gf') - $request->input('ga'));
        $points = (($request->input('win') * 3) + ($request->input('draw') * 1));

        $teamInfo->fill($request->all());
        $teamInfo->gd = $goalsDifference;
        $teamInfo->points = $points;

        $teamInfo->save();

        return redirect(route('teams.show', ['id' => $teamInfo->id]))->with('status', 'Changes have been successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);

        $team->delete();

        return redirect(route('teams.index'))->with('status', 'Record has been successfully deleted');
    }
}
