<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\SendEmail;
class EmailController extends Controller
{
    //

    public function index()
    {
      $email = User::All();

      return view('index')->with('emails',$email);
    }


    public function send($request)
    {
        $user = User::find($request);

        $user->notify(new SendEmail());

        return redirect('/');


    }
}
