<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.min.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('admin') }}">Dashboard</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="my-id">Help</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="to-center">
        <div class="line_block">
            <div class="on-div"><a href="{{ route('leagues.index') }}">Leagues</a></div>
        </div>
        <div class="line_block">
            <div class="on-div"><a href="{{ route('teams.index') }}">Teams</a></div>
        </div>
        <div class="line_block">
            <div class="on-div"><a href="#">Players</a></div>
        </div>

        <div class="line_block">
            <div class="on-div"><a href="#">upcoming matches</a></div>
        </div>
        <div class="line_block">
            <div class="on-div"><a href="#">results</a></div>
        </div>
        <div class="line_block">
            <div class="on-div"><a href="#">archive</a></div>
        </div>

        <div class="line_block">
            <div class="on-div"><a href="#">countries</a></div>
        </div>
        <div class="line_block">
            <div class="on-div">DIV 8</div>
        </div>
        <div class="line_block">
            <div class="on-div">DIV 9</div>
        </div>
    </div>

</div>
<!-- ---------- вставим блоки на страницу --------- -->


</body>
<style>
    .on-div {
        margin: 0 auto;
        text-transform: uppercase;
    }

    #line_block {
        display: flex;
        align-items: center;
        width: 300px;
        height: 200px;
        background: #f1f1f1;
        float: left;
        margin: 0 25px 25px 0;
    }

    .to-center {
        display: flex;
        flex-wrap: wrap;
        margin: 10% auto 0 auto;
        justify-content: center;
    }

    .line_block {
        display: flex;
        align-items: center;
        width: 31.30%;
        border: 1px solid black;
        margin: 1%;
        height: 200px;
        background: #f1f1f1;
    }
</style>
</html>