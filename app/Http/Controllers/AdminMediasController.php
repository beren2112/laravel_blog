<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function upload(){
        return view('admin.media.upload');
    }
    public function store(Request $request){
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file'=>$name]);
        Session::flash('uploaded_media','The photo has been uploaded');
        return redirect('admin/media');

    }
    public function destroy($id)
    {
        Photo::findOrFail($id)->delete();
        Session::flash('deleted_media','The photo has been deleted');
        return redirect('admin/media');
    }
    public function deleteMedia(Request $request){
    if(empty($request->checkBoxArray)){
        return redirect()->back();
    }
    else{
        $photos = Photo::findOrFail($request->checkBoxArray);
        foreach($photos as $photo){
            $photo->delete();
        }
        return redirect()->back();
    }

    }
}
