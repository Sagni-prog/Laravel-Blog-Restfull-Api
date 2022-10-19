<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function loginUser(Request $request){
           $user = User::where('email','=',$request->email)->first();

           if(Hash::check($request->password, $user->password)){
               return 'right';
           }else{
               return 'wromg';
           }
        }
}
