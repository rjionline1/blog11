<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all posts in it
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ]);

        // store in database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        // redirect to another page
        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        return view('posts.show')->withPost($post)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a variable
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        //return the view and pass in the variable
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        //Validate the data
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => 'required|min:5|max:255|alpha_dash',
                'category_id' => 'required|integer',
                'body' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
                'category_id' => 'required|integer',
                'body' => 'required'
            ]);
        }


        //Save data to database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        if (isset($request->tags)){

            $post->tags()->sync($request->tags);

        } else {

            $post->tags()->sync(array());

        }

        //Flash success message
        Session::flash('success', 'The blog post was successfully updated!');

        //Redirect to show page
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
        //find the data
        $post = Post::find($id);

        //detatch from tags
        $post->tags()->detach();

        //delete the data
        $post->delete();

        //flash success message
        Session::flash('success', 'The blog post was successfully deleted!');

        //redirect to the index page
        return redirect()->route('posts.index');
    }
}
