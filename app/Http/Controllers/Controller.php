<?php

namespace App\Http\Controllers;

abstract class Controller
{

    public function apiResponse($data=[],$status=200){
        return response()->json($data,$status);
    }
}
