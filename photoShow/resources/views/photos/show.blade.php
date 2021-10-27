@extends('layout.app')
@section('content')
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a class="btn btn-secondary btn-sm" href="/albums/{{$photo->album_id}}">Back To Gallery</a>
    <hr>
    <img  style="width:500px; height: auto;margin-top:15px" src="/storage/photos/{{$photo->album_id}}\{{$photo->photo}}" alt="{{$photo->title}}">
    <br><br>
    {!!Form::open(['action' => ['App\Http\Controllers\PhotosController@destroy', $photo->id],'method' => 'POST'])!!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::bsSubmit('delete photo','delete' ,['class'=>'btn btn-danger mt-1']) }}
    {!! Form::close() !!}



@endsection
