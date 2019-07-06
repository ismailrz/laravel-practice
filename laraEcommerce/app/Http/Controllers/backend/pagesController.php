<?php

namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\product_image;
use Image;

class pagesController extends Controller
{
   public function index(){

     return view('backend.pages.index');
   }


}
