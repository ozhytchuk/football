<h2>Leagues</h2>
<div style="width: 50%; margin: auto;">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>League</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allLeagues as $leagues)
            <tr>
                <td>{{ $counter++ }}</td>
                <td><a href="{{ route('leagues.show', ['id' => $leagues->id]) }}">{{ $leagues->league_title }}</a></td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger" onclick="var result = confirm('Are you sure?'); if (result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">
                        Delete
                    </a>
                    <form id="delete-form" action="#" method="post"
                          style="display: none">
                        @csrf
                        @method('DELETE')

                    </form>
                </td>
        @endforeach
        </tbody>
    </table>
    <div class="new-book">
        <a href="#" class="btn btn-success" style="float: right">Add new league</a>
    </div>
    {{--<div class="pag" style="margin-top: 15%;">
        <div class="pagination-page">
            {{ $tags->links() }}
        </div>
    </div>--}}
</div>