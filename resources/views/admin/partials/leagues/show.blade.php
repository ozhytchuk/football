<h2>{{ $league->league_title }}</h2>
<div style="width: 50%; margin: auto;">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Team title</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teamsAtLeague as $teams)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $teams->team_title }}</td>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('leagues.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
    <div class="paginate">
        {{ $teamsAtLeague->links() }}
    </div>
</div>
<style>
    th {
        text-align: center;
    }

    .back-to-site {
        float: right;
    }
</style>