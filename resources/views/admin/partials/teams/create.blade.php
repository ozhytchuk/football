<h2>Add team</h2>
<div class="container">
    <form action="{{ route('teams.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="team">TEAM</label>
            <input id="team" type="text" class="form-control" name="team">
        </div>
        <div class="form-group">
            <label for="league_id">Select a league</label>
            <select class="form-control" name="league_id" id="league_id" required>
                @foreach($leagues as $league)
                    <option value="{{ $league->id }}">{{ $league->league_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gp">GAMES PLAYED</label>
            <input id="gp" type="text" class="form-control" name="gp">
        </div>
        <div class="form-group">
            <label for="win">WIN</label>
            <input id="win" type="text" class="form-control" name="win">
        </div>
        <div class="form-group">
            <label for="draw">DRAW</label>
            <input id="draw" type="text" class="form-control" name="draw">
        </div>
        <div class="form-group">
            <label for="lost">LOST</label>
            <input id="lost" type="text" class="form-control" name="lost">
        </div>
        <div class="form-group">
            <label for="gf">GOALS FOR</label>
            <input id="gf" type="text" class="form-control" name="gf">
        </div>
        <div class="form-group">
            <label for="ga">GOALS AGAINST</label>
            <input id="ga" type="text" class="form-control" name="ga">
        </div>
        <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
            Save
        </button>
    </form>
</div>