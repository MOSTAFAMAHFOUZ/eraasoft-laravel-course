<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;

class MajorController extends Controller
{

    use UploadImage;
    public function create(){
        return view('admin.majors.create');
    }



    public function store(){

        request()->validate([
            'name'=>"required|string|min:3|max:50",
            "image"=>["required","image"]
        ]
        );

        // $image_name = $this->uploadImage('uploads/majors/');
        $image_name = $this->upload('uploads/majors/');

        Major::create([
            'name'=>request()->name,
            'image'=>$image_name
        ]);

        return back()->with('success',"data added successfully");


    }

    public function edit(Major $major){
        return view('admin.majors.edit',compact('major'));
    }

    public function update(Request $request,Major $major){
        $request->validate([
            'name'=>"required|string|min:3|max:50",
            "image"=>["required","image"]
        ]);


        $image_name = $this->upload('uploads/majors/');

        $major->name = $request->name;
        $major->image = $image_name;
        $major->save();

        return back()->with('success','data updated successfully');
    }


    private function uploadImage($path){
        $image_name = request()->image->getClientOriginalName();
        $image_name = time().rand(1,10000).'_'.$image_name;
        request()->image->move(public_path($path), $image_name);
        return $image_name;
    }

    public function destroy(Major $major){
        $major->delete();
        return back()->with('success','data deleted successfully');
    }
}
