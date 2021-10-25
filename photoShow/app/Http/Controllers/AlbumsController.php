<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');
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
        return $path;
        // then must run php artisan storage:link

    }

}

