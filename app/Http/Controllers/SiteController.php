<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class SiteController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }


    public function index() {
        $post = new Post();
        $setting = Setting::first();
        //dd($post->lastTwo());

        return view('index')->with('setting', $setting)
                            ->with('title', $setting->site_name)
                            ->with('categories', Category::take(5)->get())
                            ->with('first_post', $post->last())
                            ->with('second_post', $post->skipFirstPost())
                            ->with('third_post', $post->skipSecondPost());
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();

        $next_id = $post->nextButton();
        $prev_id = $post->prevButton();

        return view('single')->with('post', $post)
                             ->with('title', $post->title)
                             ->with('categories', Category::take(5)->get())
                             ->with('setting', Setting::first())
                             ->with('tags', Tag::all())
                             ->with('next', Post::find($next_id))
                             ->with('prev', Post::find($prev_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function showCategory(Category $category)
    {
        return view('category')->with('category', $category->load('posts'))
                               ->with('title', $category->name)
                               ->with('categories', Category::take(5)->get())
                               ->with('setting', Setting::first());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function showTag(Tag $tag)
    {
        return view('tag')->with('tag', $tag->load('posts'))
                          ->with('title', $tag->tag)
                          ->with('categories', Category::take(5)->get())
                          ->with('setting', Setting::first());
    }

    public function search() {
        $query = request('query');
        $posts = Post::where('title', 'like', '%' . $query . '%')->get();

        return view('results')->with('posts', $posts)
                                        ->with('title', 'Search results: ' . $query)
                                        ->with('categories', Category::take(5)->get())
                                        ->with('setting', Setting::first())
                                        ->with('query', $query);
    }
}
