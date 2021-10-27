<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create ($album_id){
        return view('photos.create')->with('album_id',$album_id);

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required|image|max:1999'
        ]);
        // get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        // create new filename
        $newFileName = $filename . '' . time() . '.' . $extension;

        // Upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $newFileName);

        // then must run php artisan storage:link
        // upload photo
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('Description');
        $photo->size = $request->file('photo')->getSize();
        $photo->photo = $newFileName;
        $photo->save();
        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }
    public function show ($id){
        $photo=Photo::find($id);
        return view('photos.show')->with('photo',$photo );
    }
}
