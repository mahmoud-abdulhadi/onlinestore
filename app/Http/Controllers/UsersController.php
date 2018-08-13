<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ; 
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('guest')->except('show','index');


        $this->middleware('auth')->only('index','show');
    }


    public function index(){


        $users = User::where('admin',0)->latest()->get();


        return view('admin.dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {

        //validate the request 

        $this->validate($request,[
            'name' => 'required', 
            'username' =>'required|unique:users',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:6|confirmed'
            
        ]);

        //create the user 

        $user = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //log the user in 

        Auth::login($user);

        //redirect to home 
            return redirect()->route('user.profile',['user' => $user->username]);
    }
    // display  order on profile user 
    public function show(User $user)
    {
        
        $orders = null ; 

        if(Auth::user()->admin){
            $orders = $user->orders ; 
            $orders->transform(function($order,$key)
           {
         $order->cart =unserialize($order->cart);
         return $order;
         });

        }

       

        if(Auth::user()->username == $user->username){

            $orders = Auth::user()->orders ; 
            $orders->transform(function($order,$key)
        {
         $order->cart =unserialize($order->cart);
        return $order;
         });
        }

        if(! $orders){

            return redirect()->route('user.profile',['user' =>Auth::user()->username]);
        }

     

        return view('user.profile',compact('user','orders'));
    }

   
}
