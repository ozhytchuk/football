@extends('admin.layouts.admin')
@section('leftMenu')
    @include('admin.partials.leagues.left_menu')
@endsection
@section('content')
    @include('admin.layouts.errors')
    @include('admin.partials.leagues.edit')
@stop