<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\UpdatePostRequest;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with(['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('admin.posts.create')->with([
                'post' => $post, 
                'categories' => Category::all(),
                'tags' => Tag::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        //dd($request);
        $request->uploadImage()->storePost();
        toastr()->success('Post successfully created.');

        return redirect()->route('posts.index');
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
    public function edit(Post $post)
    {
        return view('admin.posts.edit')->with([
                'post' => $post, 
                'categories' => Category::all(),
                'tags' => Tag::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $request->updatePost($post);
        toastr()->success('Post successfully updated.');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        toastr()->success('Post successfully trashed.');

        return back();
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', compact('posts'));
    }

    public function kill($id)
    {
        Post::withTrashed()->where('id', $id)->first()->forceDelete();
        toastr()->success('Post successfully deleted forever.');

        return redirect()->route('posts.trashed');
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->first()->restore();
        toastr()->success('Post successfully restored.');

        return redirect()->route('posts.trashed');
    }
}
