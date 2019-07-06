<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use Image;
use File;


class CategoriesController extends Controller
{
    public function index(){

      $categories = category::orderby('id','desc')->get();
      return view('backend.pages.categories.index', compact('categories'));
    }

    public function create(){
      $main_categories  = category::orderby('name', 'desc')->where('parent_id', NULL)->get();
      return view('backend.pages.categories.create',compact('main_categories'));
    }

    public function store(Request $request)
    {

    $this->validate($request, [
        'name' => 'required',
        'image' => 'nullable | image',
      ],
      [
        'name.required' => 'Please provide a category name',
        'image.image' => 'Please provide a valid image with .jpg, .jpeg, .gif, .png extension....',
      ]);

      $category = new category();

      $category->name = $request->name;
      $category->description = $request->description;
      $category->parent_id = $request->parent_id;
      /// Image insert also


          $image = $request->file('image');
          $img = time().'.'. $image->getClientOriginalExtension();
          $location = public_path('images/categories/'.$img);
          Image::make($image)->save($location);
          $category->image = $img;

          $category->save();

          session()->flash('success','A new category has added successfully!!');
          return redirect()->Route('admin.Categories');

      }

      public function edit($id){
        $category =category::find($id);
       $main_categories  = category::orderby('name', 'desc')->where('parent_id', NULL)->get();
        if(!is_null($category)) {
            return view('backend.pages.categories.edit',compact('category','main_categories'));
          } else{
            return redirect()->Route('admin.categories');
          }
      }
      public function update(Request $request,$id)
      {

      $this->validate($request, [
          'name' => 'required',
          'image' => 'nullable | image',
        ],
        [
          'name.required' => 'Please provide a category name',
          'image.image' => 'Please provide a valid image with .jpg, .jpeg, .gif, .png extension....',
        ]);

        $category =category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        /// Image insert also

            // Delete old image

            if(File::exists('images/categories/'.$request->image)){
              File::delete('images/categories/'.$request->image);
            }

            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);
            Image::make($image)->save($location);
            $category->image = $img;

            $category->save();

            session()->flash('success','Category has updated successfully!!');
            return redirect()->Route('admin.Categories');

        }

        public function delete($id){

           $category = category::find($id);
           // if it is parent category the it delete all sub category
           if ($category->parent_id == NULL) {
             $sub_categories  = category::orderby('name', 'desc')->where('parent_id', $category->id)->get();
             foreach ($sub_categories as $sub) {

               if(File::exists('images/categories/'.$sub->image)){
                 File::delete('images/categories/'.$sub->image);
               }
               $sub->delete();

             }
           }

           if(!is_null($category)){

             // delete image category
             if(File::exists('images/categories/'.$category->image)){
               File::delete('images/categories/'.$category->image);
             }
             $category->delete();
           }

           session()->flash('success','Product has deleted successfully!!');
           return back();


        }

    }
