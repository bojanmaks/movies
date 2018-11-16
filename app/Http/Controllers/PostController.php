<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id','desc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
        //
        $this->validate($request, array(
            'featured_image'=> 'sometimes|image'
        ));

        $post = new Post;
        $post->movie = $request->movie;
        $post->genre = $request->genre;
        $post->plot  = $request->plot;
        $post->director = $request->director;
        $post->writer = $request->writer;
        $post->actors = $request->actors;
        $post->rating = $request->rating;
        $post->votes = $request->votes;
        $post->runtime = $request->runtime;

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        }
        $post->save();

        Session::flash('success','The blog post was successfully saved');

        return redirect()->route('posts.show',$post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        return view('posts.show')->withPost($post);
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
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
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
        $post = Post::find($id);


        $this->validate($request, [
            'featured_image'=>'image'
        ]);

        $post = Post::find($id);

        $post->movie = $request['movie'];
        $post->genre = $request['genre'];
        $post->plot  = $request->plot;
        $post->director = $request['director'];
        $post->writer = $request['writer'];
        $post->actors = $request['actors'];
        $post->rating = $request['rating'];
        $post->votes = $request['votes'];
        $post->runtime = $request['runtime'];

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->image;
            $post->image = $filename;
            Storage::delete('$oldFilename');

        }
        $post->save();

        Session::flash('success','This post was successfully saved');

        return redirect()->route('posts.show', $post->id);

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
        $post = Post::find($id);

        Storage::delete($post->image);

        $post->delete();

        Session::flash('success','Post successfully deleted');

        return redirect()->route('posts.index');
    }
}
