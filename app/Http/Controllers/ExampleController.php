<?php

namespace App\Http\Controllers;
use App\Traits\common;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    use common;
    //
    public function test1()
    {
        return view("");
    }
    public function showupload()
    {
        //
        return view("upload");
    }
    public function uploadImages(Request $request)
    {
        //
        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_extension;
        // $path = 'assets/images';
        // $request->image->move($path, $file_name);
        // return 'Uploaded';

        $imageName=$this->uploadFile($request->image, 'assets/images');
        return $imageName;
    }

    // public function uploadImages(Request $request)
    // {
    //     //
    //     $file_extension = $request->image->getClientOriginalExtension();
    //     $file_name = time() . '.' . $file_extension;
    //     $path = 'assets/images';
    //     $request->image->move($path, $file_name);
    //     return 'Uploaded';
    // }
    
    
}
