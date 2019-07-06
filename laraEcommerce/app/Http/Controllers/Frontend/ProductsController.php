<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

  public function index(){

    $products =product::orderby('id','desc')->paginate(9);
    return view('frontend.pages.product.index')->with('products',$products);
  }


  public function show($slug){

    $product =product::where('slug', $slug)->first();

    if(!is_null($product)){


      return view('frontend.pages.product.show', compact('product'));
    }else{

      session()->flash('errors', 'Sorry!! there are no product by the url..');
      return redirect()->Route('/products');
    }

  }

}
