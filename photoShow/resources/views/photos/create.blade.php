@extends('layout.app')
@section('content')
    <h2 class="font-weight-bold mb-4">Upload Photo</h2>


    {!!Form::open(['action' => 'App\Http\Controllers\PhotosController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{ Form::bsText('title') }}
    {{ Form::bsTextarea('Description') }}
    {{ Form::hidden('album_id', $album_id) }}
    {{Form::file('photo',['class'=>'form-control-file'])}}
    {{ Form::bsSubmit('Submit','submit' ,['class'=>'btn btn-primary mt-4']) }}
    {!! Form::close() !!}


@endsection


