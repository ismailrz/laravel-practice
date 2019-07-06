<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\brand;
use Image;
use File;


class brandsController extends Controller
{
    public function index(){

      $brands = brand::orderby('id','desc')->get();
      return view('backend.pages.brands.index', compact('brands'));
    }

    public function create(){

      return view('backend.pages.brands.create');
    }

    public function store(Request $request)
    {

    $this->validate($request, [
        'name' => 'required',
        'image' => 'nullable | image',
      ],
      [
        'name.required' => 'Please provide a brand name',
        'image.image' => 'Please provide a valid image with .jpg, .jpeg, .gif, .png extension....',
      ]);

      $brand = new brand();

      $brand->name = $request->name;
      $brand->description = $request->description;
      /// Image insert also


          $image = $request->file('image');
          $img = time().'.'. $image->getClientOriginalExtension();
          $location = public_path('images/brands/'.$img);
          Image::make($image)->save($location);
          $brand->image = $img;

          $brand->save();

          session()->flash('success','A new brand has added successfully!!');
          return redirect()->Route('admin.brands');

      }

      public function edit($id){
        $brand =brand::find($id);
        if(!is_null($brand)) {
            return view('backend.pages.brands.edit',compact('brand'));
          } else{
            return redirect()->Route('admin.brands');
          }
      }
      public function update(Request $request,$id)
      {

      $this->validate($request, [
          'name' => 'required',
          'image' => 'nullable | image',
        ],
        [
          'name.required' => 'Please provide a brand name',
          'image.image' => 'Please provide a valid image with .jpg, .jpeg, .gif, .png extension....',
        ]);

        $brand =brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;
        /// Image insert also

            // Delete old image

            if(File::exists('images/brands/'.$request->image)){
              File::delete('images/brands/'.$request->image);
            }

            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image)->save($location);
            $brand->image = $img;

            $brand->save();

            session()->flash('success','Brand has updated successfully!!');
            return redirect()->Route('admin.brands');

        }

        public function delete($id){

           $brand = brand::find($id);
           // if it is parent brand the it delete all sub brand

           if(!is_null($brand)){

             // delete image brand
             if(File::exists('images/brands/'.$brand->image)){
               File::delete('images/brands/'.$brand->image);
             }
             $brand->delete();
           }

           session()->flash('success','Brand has deleted successfully!!');
           return back();


        }

    }
