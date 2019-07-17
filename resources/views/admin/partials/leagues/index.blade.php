<h2>Leagues</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div style="width: 50%; margin: auto;">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>League</th>
            <th>Country</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allLeagues as $leagues)
            <tr>
                <td>{{ $counter++ }}</td>
                <td><a href="{{ route('leagues.show', ['id' => $leagues->id]) }}">{{ $leagues->league_title }}</a></td>
                @foreach($leagues->countries as $country)
                    <td>{{ $country->name_of_country }}</td>
                @endforeach
                <td class="text-center" id="actions">
                    <div class="edit-button">
                        <a href="{{ route('leagues.edit', ['id' => $leagues->id]) }}" class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </td>
                <td>
                    <form action="{{ route('leagues.destroy', ['id' => $leagues->id]) }}" method="POST">
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
        <a href="{{ route('leagues.create') }}" class="btn btn-success" style="float: right">Create new league</a>
    </div>
    <a href="{{ route('admin') }}" class="btn btn-outline-primary back-to-site">Back</a>
</div>
<style>
    th {
        text-align: center;
    }

    .back-to-site {
        float: right;
        margin-right: 20px;
    }

    .edit-button {
        float: right;
    }

    .delete-button {
        float: left;
    }
</style>