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
        $cars = cars::get();
        return view("cars" ,compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("addcar");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        {
            $cars = new cars;

            $cars->carTitle = $request->carTitle;
            $cars->price = $request->price;
            $cars->description = $request->description;
            // $published = $request->published;
            // if($published){
            //     $cars->published = 1;
            // }
            // else{
            //     $cars->published = 0;
            // }
            if(isset($request->published)){
                $cars->published = true;
            }else{
                $cars->published = false;
            }
            
            $cars->save();
            return "your car title is " . $request->carTitle . "<br> and price is " . $request->price . "<br>  and description is " . $request->description . "<br>  and published is " . $request->published;

            // $car = new cars;
            // $car->carTitle = "BMW";
            // $car->price = 10000;
            // $car->description = "This is a BMW";
            // $car->published = 1;
            // $car->save();
            // return "cars added successfully";
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
       //for display form database row values
       $cars=cars::findOrFail($id);
       return view("updatecar",compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
