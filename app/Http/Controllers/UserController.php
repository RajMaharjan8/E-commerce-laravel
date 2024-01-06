<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if($user || Hash::check($req->password, $user->password)){
            $req->session()->put('user',$user);
            return redirect('/');
           
        }else{
            return response()->json([
                'message'=>'Email and password doesnt match'
            ]);
        }
    }

    public function register(Request $data)
{
    try {
        $data->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        // If necessary, store user in the session
        $user = User::where('email', $data->email)->first();
        $data->session()->put('user', $user);

        // Redirect to the home page
        return redirect('/');
    } catch (ValidationException $e) {
        // If validation fails, redirect back with errors
        return redirect()->back()->withErrors($e->validator->errors())->withInput();
    }
}
    
}
