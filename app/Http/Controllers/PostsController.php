<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->title;
       Post::create(['title'=>$request->title, 'body'=>$request->body]);
       
       //alter way of creatind

       // $post = new Post;
        // $post->title = $request->title;
        // $post->body = $request->body;
        // echo $post->save();

        return redirect('abc',);
      //  echo route('/abc');
        //echo route('posts.index');
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     return "this is show method receiving id: ".$id;
    // }
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::whereId($id)->update(['title'=>$request->title, 'body'=>$request->body]);
        
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::whereId($id)->delete();
        return redirect(route('posts.index'));

    }
    public function contact(){
        $name = null;
        $people = ['1', '2', '3', '4', '5', '6'];
        //$people = "string";
        return view('contact', compact('people', 'name'));
    }
    public function show_post($id, $name, $password = null){
        return view('post', compact('id', 'name', 'password'));
    }
    public function abc(){
        return redirect(route('myxyz', ['id'=>'1', 'name'=>'umer']));
    }
}
