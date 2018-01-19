<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;

use Illuminate\Http\Request;

class TagController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('tags.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request,[
            'name' => 'required|max:255'
        ]);

        // store the data
        $tag = new Tag;

        $tag->name = $request->name;
        $tag->save();

        // return success message
        Session::flash('success', 'The new tag has successfully been created!');

        // redirect
        return redirect()->route('tags.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find the data
        $tag = Tag::find($id);

        // display the data
        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the data
        $tag = Tag::find($id);

        // return the view and pass in the variable
        return view('tags.edit')->withTag($tag);
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
        // find the data
        $tag = Tag::find($id);

        // validate the data
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        // update and save data
        $tag->name = $request->input('name');

        $tag->save();

        // success message
        Session::flash('success', 'You have successfully updated the tag!');

        // redirect
        return redirect()->route('tags.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find data
        $tag = Tag::find($id);

        //detatch from posts
        $tag->posts()->detach();

        // delete data
        $tag->delete();

        // success message
        Session::flash('success', 'The tag has been successfully deleted!');

        // redirect
        return redirect()->route('tags.create');
    }
}
