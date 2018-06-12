<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImagesController extends Controller
{
    public function getImage()
    {
      return view('upload-images');
    }

    public function postImage(Request $request)
    {
      $this->validate($request,[
        'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
      ]);
      $image_file = $request->file('image_file');
      $imagename = time().'.'.$image_file->getClientOriginalExtension();
      $destinationPath = public_path('/thumbnail_images');
      $thumb_img = Image::make($image_file->getRealPath())->resize(100, 100);
      $thumb_img->save($destinationPath.'/'.$imagename,80);

      $destinationPath = public_path('/images');
      $image_file->move($destinationPath, $imagename);
      // you can add more function to save image into database,
      // see it on the previews video, links will vaillable on desc
      return back()->with('success','Image Upload successful')->with('imagename',$imagename);
    }
}
