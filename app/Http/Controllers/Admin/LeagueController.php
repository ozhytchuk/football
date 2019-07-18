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
            'allCountries' => Country::all()->sortBy('name_of_country'),
            'currentCountry' => CountryLeague::with('hasCountry')->where('league_id', $id)->get(),
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
        $first = $country->first();

        if (!empty($first)) {
            $first->league_id = $league->id;
            $first->country_id = $request->input('country_id');
            $first->save();
        } else {
            CountryLeague::create([
                'league_id' => $league->id,
                'country_id' => $request->input('country_id'),
            ]);
        }
        $league->league_title = $request->input('league');
        $league->save();

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
        $league = League::find($id);
        CountryLeague::where('league_id', '=', $id)->delete();

        $league->delete();

        return redirect(route('leagues.index'))->with('success', 'Record has been successfully deleted');
    }
}
