<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("addcar");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        {
            $post = new cars;
            $post->carTitle = $request->carTitle;
            $post->price = $request->price;
            $post->description = $request->description;
            $post->published = $request->published;
            $post->save();
            return "your car title is " . $request->carTitle . "<br> and price is " . $request->price . "<br>  and description is " . $request->description . "<br>  and published is " . $request->published;
        }
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
