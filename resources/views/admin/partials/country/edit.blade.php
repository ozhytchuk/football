<h2 class="page-header">{{ $country->name_of_country }}</h2>
<div class="container">
    <form action="{{ route('countries.update', ['id' => $country->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name_of_country">name of country</label>
            <input id="name_of_country" type="text" class="form-control" name="name_of_country"
                   value="{{ $country->name_of_country }}">
        </div>

        <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
            Save
        </button>
        <a href="{{ route('countries.index') }}" class="btn btn-outline-primary back-to-site">Back</a>
    </form>
</div>
<style>
    .back-to-site {
        float: right;
        margin-right: 10px;
    }

    label {
        text-transform: uppercase;
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
        text-transform: uppercase;
    }
</style>