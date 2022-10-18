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
    function LoginPage()
    {
        return view('admin.register.signin');
    }

    function SignupPage()
    {
        return view('admin.register.signup');
    }

    function userAccountPage()
    {
        return view('admin.useraccount.users');
    }

    function authenticate(Request $req)
    {
        
        $authenticated = Auth::attempt([
            'username' => $req->username,
            'password' => $req->password
        ]);

        if ($authenticated) {
            return redirect()->intended('/');
        } else {
            auth()->logout();
            return redirect()->back()->with('flash_error', 'Wrong username/password')->withInput($req->all());
        }
    }

    function store(Request $req)
    {
        $validator = Validator::make($req->all(), [

            'name' => 'required|max:60',
            'username' => 'required|max:25',
            'password' => array('required', 'regex:/([a-z])([0-9])/i', 'min:8', 'confirmed'),
            'email' => 'required|unique:users,email'
        ], [
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be 8 characters'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            DB::beginTransaction();
            Log::info($req);
            User::create([
                'username' => $req->username,
                'password' => Hash::make($req->password),
                'name' => $req->name,
                'email' => $req->email
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);

            return redirect()
                ->route('signup')
                ->with('flash_error', 'Something went wrong, Please try again later');
        }

        return redirect()
            ->route('signin')
            ->with('flasg_success', 'Successfully added "' . trim($req->name) . '"');
    }
        function logout()
        {
            if (Auth::check()) {
                auth()->logout();
                return redirect('/signin')->with('flash_success', 'Logged out');
            }
            return redirect()->back()->with('flash_error', 'Something went wrong. Please try again');
        }

    }

