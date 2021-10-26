<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {   $albums = Album::with('photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|image|max:1999'
        ]);
        // get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // create new filename
        $newFileName = $filename . '' . time() . '.' . $extension;

        // Upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers',$newFileName);

        // then must run php artisan storage:link

        $album = new Album ;
        $album->name = $request->input('name');
        $album->description = $request->input('Description');
        $album->cover_image = $newFileName;
        $album->save();
        return redirect('/albums')->with('success', 'Album Created');

    }

}

