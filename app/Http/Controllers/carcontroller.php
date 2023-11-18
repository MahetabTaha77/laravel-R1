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

    public function cars(Request $request)
    {
        $post = new cars;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('addcar')->with('status', 'cars Data Has Been inserted');
    }
}
