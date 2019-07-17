<h2 class="page-header">Countries</h2>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div style="margin: auto; width: 60%">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Name of country</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allCountries as $countries)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>
                    <a href="{{ route('countries.show', ['id' => $countries->id]) }}">{{ $countries->name_of_country }}</a>
                </td>
                <td class="text-center" id="actions">
                    <div class="edit-button">
                        <a href="{{ route('countries.edit', ['id' => $countries->id]) }}"
                           class="btn btn-primary">Edit</a>
                    </div>
                </td>
                <td>
                    <form action="{{ route('countries.destroy', ['id' => $countries->id]) }}" method="POST">
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
        <a href="{{ route('countries.create') }}" class="btn btn-success" style="float: right">New country</a>
    </div>
    <a href="{{ route('admin') }}" class="btn btn-outline-primary back-to-site">Back</a>
</div>
<style>
    th {
        text-align: center;
        text-transform: uppercase;
    }

    td {
        text-transform: capitalize;
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

    .page-header {
        text-align: center;
        margin-bottom: 50px;
        text-transform: uppercase;
    }
</style>