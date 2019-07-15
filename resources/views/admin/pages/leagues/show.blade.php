@extends('admin.layouts.admin')
@section('leftMenu')
    @include('admin.partials.leagues.left_menu')
@endsection
@section('content')
    @include('admin.partials.leagues.show')
@stop