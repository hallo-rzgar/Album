@extends('layout.app')
@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class=" btn btn-secondary">Get back</a>
    <a href="/photos/create/{{$album->id}}" class=" btn  btn-primary">Upload Photos To Album</a>
    @if(count($album->photos) > 0)
        <?php
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div id="photos">
            <div class="row text-center mt-4">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class=' col-sm-6 col-md-4  col-lg-3   '>
                            <a href="/photos/{{$photo->id}}">
                                <img class="img-thumbnail" style="height: 200px; width: 200px" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>
                            @else
                                <div class=' col-sm-6 col-md-4 col-lg-3  '>
                                    <a href="/photos/{{$photo->id}}">
                                        <img class="img-thumbnail" style="height: 200px; width: 200px" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                                    </a>
                                    <br>
                                    <h4>{{$photo->title}}</h4>
                                    @endif
                                    @if($i % 4 == 0)
                                </div></div><div class="row text-center">
                            @else
                        </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <h4 class="mt-5">No Photos To Display</h4>
    @endif

@endsection
