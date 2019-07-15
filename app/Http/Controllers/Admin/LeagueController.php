<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\CountryLeague;
use App\Http\Requests\LeagueRequest;
use App\League;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.leagues.index', [
            'allLeagues' => League::with('countries')->get(),
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
        return view('admin.pages.leagues.create', [
            'countries' => Country::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeagueRequest $request)
    {
        $model = League::create(['league_title' => $request->input('league')]);
        CountryLeague::create([
            'league_id' => $model->id,
            'country_id' => $request->input('country_id'),
        ]);

        return redirect(route('leagues.index'))->with('success',
            'Your record has been successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pages.leagues.show', [
            'teamsAtLeague' => Team::with('leagues')->where('league_id', '=', $id)->orderBy('team_title')->paginate(10),
            'league' => League::find($id),
            'counter' => 1,
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
        $league = League::find($id);

        if (!$league) {
            return abort(404);
        }

        return view('admin.pages.leagues.edit', [
            'league' => $league,
            'countries' => Country::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeagueRequest $request, $id)
    {
        $league = League::find($id);
        $country = CountryLeague::all()->where('league_id', '=', $id);

        if (!$league) {
            return back()->with('error', 'Something went wrong');
        }

        $league->league_title = $request->input('league');
        foreach ($country as $c) {
            $c->league_id = $league->id;
            $c->country_id = $request->input('country_id');
        }

        $league->save();
        $c->save();

        return redirect(route('leagues.index'))->with('success',
            'Changes have been successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $league = League::find($id);

        $league->delete();

        return redirect(route('leagues.index'))->with('success', 'Record has been successfully deleted');
    }
}
