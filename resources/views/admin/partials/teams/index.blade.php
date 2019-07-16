<h2 class="page-header">Teams</h2>
<div class="teams-table" style="margin: auto; width: 80%">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Team</th>
            <th>League</th>
            <th>Country</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allTeams as $teams)
            <tr>
                <td>{{ $counter++ }}</td>
                <td><a href="{{ route('teams.show', ['team' => $teams->id]) }}">{{ $teams->team_title }}</a></td>

                @foreach($teams->leagues as $league)
                    <td>{{ $league->league_title }}</td>
                @endforeach

                @foreach($leaguesWithCountry as $item)
                    @foreach($item->countries as $country)
                        <td>{{ $country->name_of_country }}</td>
                    @endforeach
                @endforeach
                <td class="text-center" id="actions">
                    <div class="edit-button">
                        <a href="#" class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </td>
                <td>
                    <form action="#" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="delete-button">
                            <button class="btn btn-danger delete">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="create-new">
        <a href="{{ route('teams.create') }}" class="btn btn-success" style="float: right">Create new team</a>
    </div>
    <a href="{{ route('admin') }}" class="btn btn-outline-primary back-to-site">Back</a>
</div>
<style>
    th {
        text-align: center;
    }

    .delete-button {
        float: left;
    }

    .edit-button {
        float: right;
    }

    .back-to-site {
        float: right;
        margin-right: 20px;
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }
</style>