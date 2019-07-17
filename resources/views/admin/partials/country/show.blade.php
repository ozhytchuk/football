<h2 class="page-header">{{ $leaguesInCountry[0]->name_of_country }}</h2>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container" style="width: 50%">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>Leagues in {{ $leaguesInCountry[0]->name_of_country }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($leaguesInCountry as $leagues)
            @foreach($leagues->leagues as $league)
                <tr>
                    <td>
                        <a href="{{ route('leagues.show', ['id' => $league->id]) }}">{{ $league->league_title }}</a>
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
    <a href="#" class="btn btn-primary edit">Edit</a>
    <a href="{{ route('countries.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
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
        text-transform: uppercase;
    }

    .back-to-site {
        float: right;
        margin-right: 20px;
    }

    .edit {
        float: right;
    }
</style>
