<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Image;
  use App\storage;
class ImageController extends Controller
{
    //

    public function index()
    {
      // code...
      return view('welcome');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
        'title' => 'required',
        'image' => 'nullable | image'
        ]);

      $image = new Image;
      $image->title = $request->title;
      //$image->image = $request->image;

      if ($request->hasFile('image')) {
        // code...
        $image->image = $request->image->store('public/images');

      }
       $image->save();
      //
       return redirect()->Route('view');

    }

    public function view()
    {
      $var = Image::All();

      return view('view')->with('images',$var);
    }
}
