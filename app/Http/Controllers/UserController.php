<?php

namespace App\Http\Controllers;

use App\Child;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegisterParent(){
        return view('registerParent');
    }
    public function showRegisterChildren(){
        return view('registerChildren');
    }


    public function registerParent(){

        $this->validate(request(),[
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'fname' => request('fname'),
            'lname' => request('lname'),
            'username' => request('username'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'verified' => 1,
            'role' => 'parent'
        ]);

        return redirect('/login')->with('regSuccess','Successfully Registered');
    }

    public function registerChildren(){

        $this->validate(request(),[
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        Child::create([
            'fname' => request('fname'),
            'lname' => request('lname'),
            'username' => request('username'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'verified' => 1,
            'role' => 'child'
        ]);

        return redirect('/login')->with('regSuccess','Successfully Registered');
    }


    public function showlogin(){
        return view('login');
    }

    public function login(){
        $this->validate(request(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => request('email'), 'password' => request('password'),'verified' => 1])){
            return redirect('/parent/dashboard');
        }elseif (Auth::guard('child')->attempt(['email' => request('email'), 'password' => request('password'),'verified' => 1])){
            return redirect('child/dashboard');
        }else{
            return 'credential does not match';
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }





}
