<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('accueil', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StorePost $request)
    {
        $path = $request->file('image')->store('public/images');
        $post = new Post;
        $post->titre = $request->titre;
        $post->description = $request->description;
        $post->imageUrl = $path;
        $post->save();
        return redirect('/admin/accueil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $path = $request->file('image');
        $post = Post::find($id);
        $post->titre = $request->titre;
        $post->description = $request->description;
        if($path != null) {
            Storage::delete($post->imageUrl);
            $post->imageUrl = $request->file('image')->store('public/images');
        }else{
            $post->imageUrl = $post->imageUrl;
        }
        
        $post->save();
        return view('update', compact('post'));    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Storage::delete($post->imageUrl);
        return redirect('/admin/accueil');
    }
}
