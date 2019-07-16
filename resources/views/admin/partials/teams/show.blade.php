@forelse($teamInfo as $team)
    <h2 class="page-header">{{ $team->team_title }}</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <table class="table table-striped text-center">
            <thead>
            <tr>
                <th>Team</th>
                <th>League</th>
                <th>Country</th>
                <th>Games played</th>
                <th>Win</th>
                <th>Draw</th>
                <th>Lost</th>
                <th>Goals for</th>
                <th>Goals against</th>
                <th>Goals difference</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $team->team_title }}</td>

                @foreach($team->leagues as $league)
                    <td>{{ $league->league_title }}</td>
                @endforeach

                @foreach($leaguesWithCountry as $item)
                    @foreach($item->countries as $country)
                        <td>{{ $country->name_of_country }}</td>
                    @endforeach
                @endforeach

                <td>{{ $team->gp }}</td>
                <td>{{ $team->win }}</td>
                <td>{{ $team->draw }}</td>
                <td>{{ $team->lost }}</td>
                <td>{{ $team->gf }}</td>
                <td>{{ $team->ga }}</td>
                <td>{{ $team->gd }}</td>
                <td>{{ $team->points }}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('teams.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
        <br/><br/>
        <h2 class="page-header">Players</h2>
        .....................................
    </div>
@empty
    <div class="alert alert-warning">
        No results.
    </div>
@endforelse
<style>
    .page-header {
        text-align: center;
        margin-bottom: 50px;
        color: #007bff;
        font-family: Montserrat, sans-serif;
    }

    th {
        text-align: center;
    }

    .back-to-site {
        float: right;
        margin-right: 20px;
    }
</style>
