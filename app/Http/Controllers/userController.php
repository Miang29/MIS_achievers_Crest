<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;
use Log;
use Validator;
use Hash;

class userController extends Controller
{
    function LoginPage() {
        return view('admin.register.signin');
    }

    function SignupPage() {
        return view('admin.register.signup');
    }
    
    
    function authenticate(Request $req) 
    {
          $authenticated = Auth::attempt([
              'username' => $req->username,
              'password' => $req->password
          ]);

          if ($authenticated) {
              return redirect()->intended('/');
          }
         else {
              auth()->logout();
              return redirect()->back()->with('flash_error','Wrong username/password')->withInput($req->all());
         }
      }  

}
