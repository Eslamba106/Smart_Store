<?php 

use Illuminate\Http\Request;

function uploadImage(Request $request , $file_name)
{

        $file = $request->file('image');
        $path = $file->store($file_name, [
            'disk' => 'public',
        ]);
        return $path;
    
}

function auth_name(){
    return  auth()->user()->name;
}

function auth_image(){
    return  auth()->user()->image;
}