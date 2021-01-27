<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category ['category'] = Category::all();
    	return view('category.home', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'name' => ['required'],
            'description' => ['required'],
            
        ]);
        $category = new Category();
        $category->name = $request->input('name'); 
        $category->description = $request->input('description');
        $category->save();
        
        return redirect('category')->with(['create' => 'Data saved successfully!']);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit Type';
        $data['categories'] = Category::findOrFail($id);
        // dd($departement);
        return view('category.edit', $data);
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
        $request->validate([
            'name' => ['required', "unique:category,name, $id"],
            
        ]);
          
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description') ?? "N/A";

        $category->save();

        return redirect('category')->with(['update' => 'Data updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yadi = Category::findOrFail($id);
        $yadi->delete();
        
    return redirect('category')->with(['delete' => 'Data delete successfully!']);
    }
}
