
@extends('layout.app')

@section('content')
    @if(count($albums) > 0)
        <?php
        $colcount = count($albums);
        $i = 1;
        ?>
        <div id="albums">
            <div class="row text-center">
                @foreach($albums as $album)
                    @if($i == $colcount)
                        <div class=' col-sm-6 col-md-4  col-lg-3   '>
                            <a href="/albums/{{$album->id}}">
                                <img class="img-thumbnail" style="height: 200px; width: 200px" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                            </a>
                            <br>
                            <h4>{{$album->name}}</h4>
                            @else
                                <div class=' col-sm-6 col-md-4 col-lg-3  '>
                                    <a href="/albums/{{$album->id}}">
                                        <img class="img-thumbnail  " style="height: 200px; width: 200px" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                                    </a>
                                    <br>
                                    <h4>{{$album->name}}</h4>
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
        <h4 class="mt-5">No Albums To Display</h4>
    @endif

@endsection
