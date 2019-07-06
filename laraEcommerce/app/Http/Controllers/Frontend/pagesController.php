<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;

class pagesController extends Controller
{

  public function index(){

    $products =product::orderby('id','desc')->paginate(9);
    return view('frontend.pages.index',compact('products'));
  }
  public function contact(){
    return view('frontend.pages.contact');
  }

  public function search(Request $request){

    $search = $request->search;

    $products =product::orWhere('title', 'like', '%'.$search.'%')
    ->orWhere('description', 'like', '%'.$search.'%')
    ->orWhere('slug', 'like', '%'.$search.'%')
    ->orWhere('price', 'like', '%'.$search.'%')
    ->orWhere('quantity', 'like', '%'.$search.'%')
    ->orderby('id','desc')
    ->paginate(9);

    return view('frontend.pages.product.search', compact('search', 'products'));
  }

}
