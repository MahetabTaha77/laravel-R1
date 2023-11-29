<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\cars;

class CarController extends Controller
{
    private $columns=[
        'carTitle',
        'description',
        'published',
        'price',
    ];
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
            // $cars = new cars;

            // $cars->carTitle = $request->carTitle;
            // $cars->price = $request->price;
            // $cars->description = $request->description;
            // if(isset($request->published)){
            //     $cars->published = true;
            // }else{
            //     $cars->published = false;
            // }
            // $cars->save();
            // return "your car title is " . $request->carTitle . "<br> and price is " . $request->price . "<br>  and description is " . $request->description . "<br>  and published is " . $request->published;


            //-------------
            // $published = $request->published;
            // if($published){
            //     $cars->published = 1;
            // }
            // else{
            //     $cars->published = 0;
            // }

            //validaion
            $data = ($request->only($this->columns));
            $data['published'] = isset($data['published'])? true:false;

            $request-> validate(
                [
                    'carTitle'=> 'required | string',
                    'price'=> 'required | integer',
                    'description'=> 'required | string|max:100',
                    // 'published'=> 'required | boolean',

                ]
                );
                cars::create($data);
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
        $cars=cars::findOrFail($id);
        return view("Showcars",compact('cars'));
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
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;
        cars::where('id', $id)->update($data);

        // cars::where('id' ,$id)->update($request->only($this->columns));
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        cars::where('id', $id)->delete();
        return redirect('cars');
    }
    public function trashed()
    {
       //for display form database row values
       $cars=cars::onlyTrashed()->get();
       return view("trashedCar",compact('cars'));
    }
    public function restore(string $id)
    {
       //for display form database row values
       cars::where('id',$id)->restore();
       return redirect('cars');
    }
    public function Delete(string $id)
    {
       //for display form database row values
       cars::where('id', $id)->forceDelete();
       return redirect('cars');
    }

}
