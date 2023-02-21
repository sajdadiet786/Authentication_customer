<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    //
    public function show_auth_user(Request $request){
        // return Auth::user()->name;
        // return Auth::id();
        return $request->user();
    }
    public function check_auth_user(){
        // return Auth::user()->name;
        // return Auth::id();
       if (Auth::check()){
        return 'you are Authenticated user';
       }  
       return 'Unauthenticated user';
      }
}
