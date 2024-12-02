<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class MajorController extends Controller
{
    public function index(){
        // Gate::authorize('viewAll','job');
        $majors = Major::orderBy('id',"DESC")->paginate(20);
        return view('front.majors.index',['majors' => $majors]);
    }


    public function doctors(Major $major){
        $doctors = User::with('major')
        ->where('role',operator: "doctor")
        ->where('major_id',$major->id)
        ->paginate(20);
        return view('front.doctors.index',compact('doctors'));
    }


}
