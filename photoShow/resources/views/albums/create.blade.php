@extends('layout.app')
@section('content')
    <h2 class="font-weight-bold mb-4">Create Albums</h2>


    {!!Form::open(['action' => 'App\Http\Controllers\AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        {{ Form::bsText('name','',['placeholder'=>'Photos Title']) }}
        {{ Form::bsTextarea('Description') }}
        {{Form::file('cover_image',['class'=>'form-control-file'])}}
        {{ Form::bsSubmit('Submit','submit' ,['class'=>'btn btn-primary mt-4']) }}
        {!! Form::close() !!}


@endsection


