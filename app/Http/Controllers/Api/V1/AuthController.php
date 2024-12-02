<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{

    public function register(RegisterRequest $request){
        // $data = $request->validate([
        //     'name' => ['required','string','max:255'],
        //     'email' => ['required','string','email','max:255','unique:users'],
        //     'password' => ['required','string','min:8','confirmed'],
        // ]);

        // create a new user
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $token = $user->createToken("new name")->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);

    }


    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required','string','email'],
            'password' => ['required','string'],
        ]);

        if(\Auth::attempt($data)){
            $user = User::where('email',$data['email'])->first();
            $token = $user->createToken("new name")->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        }else{
            return response()->json(["error"=>"Your email or password not valid!"], 422);
        }
        // create a new user


    }


    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(["message"=>"Logged out"]);
    }
}
