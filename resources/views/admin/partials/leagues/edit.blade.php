<h2>{{ $league->league_title }}</h2>
<div class="container">
    <form action="{{ route('leagues.update', ['id' => $league->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="league">LEAGUE TITLE</label>
            <input id="league" type="text" class="form-control" name="league" value="{{ $league->league_title }}">
        </div>
        <div class="form-group">
            <label for="country_id">Select a country</label>
            <select class="form-control" name="country_id" id="country_id" required>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name_of_country }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
            Save
        </button>
        <a href="{{ route('leagues.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
    </form>
</div>
<style>
    .back-to-site {
        float: right;
        margin-right: 10px;
    }
</style>