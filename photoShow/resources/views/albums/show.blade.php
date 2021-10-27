@extends('layout.app')
@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class=" btn btn-secondary">Get back</a>
    <a href="/photos/create/{{$album->id}}" class=" btn btn-primary">Upload Photos To Album</a>
@endsection
