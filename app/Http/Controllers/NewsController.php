<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;


class NewsController extends Controller
{

    private $columns=[
        'title',
        'content',
        'published',
        'author',
    ];
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $news = news::get();
        return view("news" ,compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("addnews");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $news = new news;

        $news->title = $request->title;
        $news->content = $request->content;
        if(isset($request->published))
        {
            $news->published = true;
        }
        else{
            $news->published = false;
        }
        $news->author = $request->author;
        $news->save();
        return "your News title is " . $request->title . "<br> and content is " . $request->content . "<br>  and published is " . $request->published  . "<br>  and author is " . $request->author ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $news=news::findOrFail($id);
        return view("shownews",compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $news=news::findOrFail($id);
        return view("updatenews",compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;
        news::where('id', $id)->update($data);
    //    news::where('id', $id)->update($request->only($this->columns));
        // return 'updated';
        return redirect('news');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        news::where('id', $id)->delete();
        return redirect('news');
    }
}
