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
            <th>Actions</th>
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
                <td class="text-center">
                    <a href="{{ route('leagues.edit', ['id' => $leagues->id]) }}" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger" id="edit-icon" onclick="var result = confirm('Are you sure?'); if (result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">
                        Delete
                    </a>
                    <?=$leagues->id?>
                    <form id="delete-form" action="{{ route('leagues.destroy', ['id' => $leagues->id]) }}" method="post"
                          style="display: none">
                        @csrf
                        @method('DELETE')

                    </form>
                </td>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin') }}" class="btn btn-outline-primary back-to-site">Back</a>
</div>
<style>
    th {
        text-align: center;
    }

    .back-to-site {
        float: right;
    }
</style>