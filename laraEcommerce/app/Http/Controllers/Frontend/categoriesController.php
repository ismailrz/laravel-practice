
<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\category;

class categoriesController extends Controller
{

    public function index()
    {
        //
    }

    public function show($id)
    {
        $category = category::find($id);
        if (!is_null($category)) {
          return view('frontend.pages.categories.show', compact('category'));
        }else {
          session()->flash('errors', 'Sorry !! There is no category by this ID');
          return redirect('/');
        }
    }

}
