<?php
namespace App\Http\Traits;



trait UploadImage{

    public function upload($path){
        $image_name = request()->image->getClientOriginalName();
        $image_name = time().rand(1,10000).'_'.$image_name;
        request()->image->move(public_path($path), $image_name);
        return $image_name;
    }

    public function delete(){

    }
}
