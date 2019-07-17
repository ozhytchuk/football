<h2 class="page-header">{{ $team->team_title }}</h2>
<div class="container">
    <form action="{{ route('teams.update', ['id' => $team->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="team_title">team title</label>
            <input id="team_title" type="text" class="form-control" name="team_title" value="{{ $team->team_title }}">
        </div>
        <div class="form-group">
            <label for="league_id">Select a league</label>
            <select class="form-control" name="league_id" id="league_id">
                @foreach($allLeagues as $leagues)
                    <option value="{{ $leagues->id }}">{{ $leagues->league_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gp">games played</label>
            <input id="gp" type="text" class="form-control" name="gp" value="{{ $team->gp }}">
        </div>
        <div class="form-group">
            <label for="win">win</label>
            <input id="win" type="text" class="form-control" name="win" value="{{ $team->win }}">
        </div>
        <div class="form-group">
            <label for="draw">win</label>
            <input id="draw" type="text" class="form-control" name="draw" value="{{ $team->draw }}">
        </div>
        <div class="form-group">
            <label for="lost">lost</label>
            <input id="lost" type="text" class="form-control" name="lost" value="{{ $team->lost }}">
        </div>
        <div class="form-group">
            <label for="gf">goals for</label>
            <input id="gf" type="text" class="form-control" name="gf" value="{{ $team->gf }}">
        </div>
        <div class="form-group">
            <label for="ga">goals against</label>
            <input id="ga" type="text" class="form-control" name="ga" value="{{ $team->ga }}">
        </div>

        <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
            Save
        </button>
        <a href="{{ route('teams.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
    </form>
</div>
<style>
    .page-header {
        text-align: center;
        margin-bottom: 50px;
        margin-top: 20px;
        color: #007bff;
        font-family: Montserrat, sans-serif;
    }

    .back-to-site {
        float: right;
        margin-right: 20px;
    }

    label {
        text-transform: uppercase;
    }
</style>