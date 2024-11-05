<?php

namespace App\Http\Controllers\Front;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    public function index(){
        $majors = Major::orderBy('id',"DESC")->paginate(20);
        return view('front.majors.index',['majors' => $majors]);
    }
}
