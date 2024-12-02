<?php

namespace App\Http\Controllers\CustomAuth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(){
        return view('auth.register');
    }
    public function store(Request $request){
        // validations
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
        ]);

        // create a new user
        $user = User::create($data);

        // log the user in
        Auth::login($user);

        // redirect to home page
        return redirect()->route('home');
    }


    public function login(){
        return view('auth.login');
    }



    public function doLogin(Request $request){
        // validations
        $data = $request->validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string'],
        ]);

        // create a new user
        // $user = User::create($data);

        if(Auth::attempt($data)){
            $user = User::where('email',$data['email'])->first();
            // Auth::login($user);
        }else{
            return redirect()->back()->withErrors(["email_not_correct"=>"Your email or password not valid !"]);;
        }
        return redirect()->route('home');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
