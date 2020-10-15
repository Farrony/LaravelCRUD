<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\post;
use App\Rules\Uppercase;
use App\Models\category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data =$request->validated();  //validated will go PostRequest and after validate return
        $result = Post::create($data);
        if($result){
            return redirect('post')->with('success','Data has been saved');
        }
        else{
            return redirect('post')->with('error','Data can not be save');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=  Post::find($id);
        return view('post.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=  Post::find($id);
        $categories = Category::all();
        return view('post.edit',compact('post','id','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,$id)
    {
        $data =$request->validated();  //validated will go PostRequest and after validate return
        $result = Post::find($id)->update($data);
        if($result){
            return redirect('post')->with('success','Data has been updated');
        }
        else{
            return redirect('post')->with('error','Data can not be update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Post::find($id)->delete();
        if($result){
            return redirect('post')->with('success','Data has been deleted');
        }
        else{
            return redirect('post')->with('error','Data can not be delete');
        }
    }
}
