<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
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
        // find all data to display index
        $categories = Category::all();

        // return view
        return view('categories.create')->withCategories($categories);
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
            'name' => 'required|max:255'
        ]);

        // store data
        $category = new Category;

        $category->name = $request->name;

        // return success message
        Session::flash('success', 'The new category has been successfully created!');
        $category->save();

        // redirect
        return redirect()->route('categories.create');
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
        $category = Category::find($id);

        // display the data
        return view('categories.show')->withCategory($category);
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
        $category = Category::find($id);

        // return the view and pass in the variable
        return view('categories.edit')->withCategory($category);
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
        // set variable
        $category = Category::find($id);

        // validate the data
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        // save data to the database
        $category->name = $request->input('name');

        $category->save();

        // success message
        Session::flash('success', 'The category has been successfully updated');

        // redirect
        return redirect()->route('categories.create');
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
        $category = Category::find($id);

        // delete data
        $category->delete();

        // success message
        Session::flash('success', 'The category was successfully deleted');

        // redirect to another page
        return redirect()->route('categories.create');
    }
}
