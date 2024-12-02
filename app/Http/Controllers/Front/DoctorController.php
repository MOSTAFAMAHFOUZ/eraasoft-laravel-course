<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index(){
        $doctors = User::with('major')->where('role', "doctor")->paginate(20);
        return view('front.doctors.index',compact('doctors'));
    }
}
