@foreach($leagues as $league)
    <h4>
        {{ $league->team_title }}
        {{ $league->leagues->league_title }}
    </h4>
@endforeach