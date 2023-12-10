<?php

namespace App\Http\Controllers;
use App\Traits\common;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    use common;

    private $columns=[
        'title',
        'ShortDescription',
        'published',
        'price',
        'image',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $Posts = Post::latest()->take(5)->get();
       $Posts = Post::get();
        return view("Post" ,compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("addPost");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //               
         $messages= $this->messages();

        $data = $request->validate(
            [
                'title'=> 'required | string',
                'price'=> 'required | integer',
                'ShortDescription'=> 'required | string|max:100',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]
            , $messages );

            //after added image in validation you must added request image folder
            $imageName=$this->uploadFile($request->image, 'assets/images');
            $data['image'] = $imageName;
            $data['published'] = isset($request['published']);
           

               
            //عشان اطبع في الداتا بيز
            Post::create($data);
                return "your car title is " . $request->title . "<br> and price is " . $request->price . "<br>  and ShortDescription is " . $request->ShortDescription . "<br>  and published is " . $request->published;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $Post=Post::findOrFail($id);
        return view("Showposts",compact('Post'));
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
    public function destroy(string $id):RedirectResponse
    {
        //
        Post::where('id', $id)->delete();
        return redirect('Post');
    }
    public function messages(){
        return [
            'title.required' => 'Title is required',
            'price.required' => 'price is required',
            'ShortDescription.required' => 'ShortDescription is required',
        ];
    }
    public function Delete(string $id)
    {
       //for display form database row values
       Post::where('id', $id)->forceDelete();
       return redirect('Post');
    }
}
