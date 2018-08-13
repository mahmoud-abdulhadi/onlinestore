<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth ; 

use Session ; 

class SessionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest',['except' => 'destroy']);

    }

    public function create()
    {
        return view('user.login');  
    }

    public function store(Request $request)
    {
            //validate form

            Session::forget('cart');
            
            $this->validate($request,[

                'email' => 'required|email',
                'password' => 'required'
            ]);
            //attempt to login

            if(Auth::attempt(request(['email','password'])))
            {

                if(Auth::user()->admin){

                    return redirect()->route('admin.dashboard');
                }           
                return redirect()->route('user.profile',['user' => Auth::user()->username]);
            }
            return redirect()->back()->withErrors(['message'=>'We couldn\'t verify your credentials.']);
    }

    public function destroy()
    {

        Auth::logout();

        Session::forget('cart'); 

        return redirect()->route('products.index');

    }


}
