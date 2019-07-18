<h2 class="page-header">{{ $teamInfo->team_title }}</h2>
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
            <td>{{ $teamInfo->team_title }}</td>

            @forelse($teamInfo->leagues as $league)
                <td>{{ $teamInfo->leagues[0]->league_title }}</td>
            @empty
                <td><span class="badge badge-warning" style="color: #1b1e21">unknown</span></td>
            @endforelse
            @forelse($leaguesWithCountry as $allCountry)
                @foreach($allCountry->countries as $country)
                    <td>{{ $country->name_of_country }}</td>
                @endforeach
            @empty
                <td><span class="badge badge-warning" style="color: #1b1e21">unknown</span></td>
            @endforelse
            <td>{{ $teamInfo->gp }}</td>
            <td>{{ $teamInfo->win }}</td>
            <td>{{ $teamInfo->draw }}</td>
            <td>{{ $teamInfo->lost }}</td>
            <td>{{ $teamInfo->gf }}</td>
            <td>{{ $teamInfo->ga }}</td>
            <td>{{ $teamInfo->gd }}</td>
            <td>{{ $teamInfo->points }}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{ route('teams.edit', ['id' => $teamInfo->id]) }}" class="btn btn-primary edit">Edit</a>
    <a href="{{ route('teams.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
</div>
<style>
    .page-header {
        text-align: center;
        margin-bottom: 50px;
        margin-top: 20px;
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

    .edit {
        float: right;
    }

    td {
        text-transform: capitalize;
    }
</style>
