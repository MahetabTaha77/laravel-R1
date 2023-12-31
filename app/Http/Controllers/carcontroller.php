<?php

namespace App\Http\Controllers;
use App\Traits\common;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\cars;
use App\Models\Category;

class CarController extends Controller
{    //you must calling common method to get upload image code App\Traits\common;
    use common;

    private $columns=[
        'carTitle',
        'description',
        'published',
        'price',
        'image',
        'category_id',
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
        $categories = Category::select('id','categoryName')->get();
        return view("addcar",compact('categories'));
        
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

                //for Replace Laravel Image to News error message
                $messages= $this->messages();

            //validation 
          $data = $request->validate(
            [
                'carTitle'=> 'required | string',
                'price'=> 'required | integer',
                'price'=> 'required | integer',
                'description'=> 'required | string|max:100',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'category_id'=> 'required | integer',
                
            ]
            , $messages );

            //after added image in validation you must added request image folder
            $imageName=$this->uploadFile($request->image, 'assets/images');
            $data['image'] = $imageName;
            $data['published'] = isset($request['published']);
           

               
            //عشان اطبع في الداتا بيز
                cars::create($data);
                return "your car title is " . $request->carTitle . "<br> and price is " . $request->price . "<br>  and description is " . $request->description . "<br>  and published is " . $request->published . "<br>  and Category is " . $request->category_id;

            
             //validaion
            // $data = ($request->only($this->columns));

            // $request-> validate(
            //     [
            //         'carTitle'=> 'required | string',
            //         'price'=> 'required | integer',
            //         'description'=> 'required | string|max:100',
            //         // 'published'=> 'required | boolean',

            //     ]
            //     );

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
        $categories = Category::select('id', 'categoryName')->get();
        return view("updatecar",compact('cars','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //upload code by validation
        $messages= $this->messages();

        $data = $request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string',
            'price' => 'required|string',
            'category_id' => 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
       
        $data['published'] = isset($request->published);

        // update image if new file selected
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image']= $fileName;
        }

        //return dd($data);
        cars::where('id', $id)->update($data);
        return redirect('cars');

        // $data['image'] =$this->uploadFile($request->image, 'assets/images');
        // $data = $request->only($this->columns);
        // $data['published'] = isset($data['published']);
        // cars::where('id', $id)->update($data);

        // // cars::where('id' ,$id)->update($request->only($this->columns));
        // return redirect('cars');


    }

    /**
     *  Message method 
     */

  public function messages(){
        return [
            'carTitle.required' => __('addcar.titleRequiredMsg'),
            'price.required' =>  __('addcar.priceRequiredMsg'),
            'description.required' =>  __('addcar.descriptionRequiredMsg'),
        ];
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
