<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;

class carcontroller extends Controller
{
    //
    public function addcar()
    {
        return view("addcar");
    }

    public function carsform(Request $request)
    {
        $post = new cars;
        $post->carTitle = $request->carTitle;
        $post->price = $request->price;
        $post->description = $request->description;
        $post->published = $request->published;
        $post->save();
        return redirect('cars-form')->with('status', 'cars Data Has Been inserted');
    }
 
}
