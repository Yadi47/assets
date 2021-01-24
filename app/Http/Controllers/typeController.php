<?php

namespace App\Http\Controllers;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type ['type'] = Type::all();
    	return view('type.home', $type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.form');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
 
        $type = new Type();
        $type->name = $request->input('name'); 
        $type->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/type');
            $image->move($destinationPath, $name);
            $type->image = $name;
        } 
        $type->save();
        
        return redirect('type')->with(['create' => 'Data saved successfully!']);
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    DB::transaction(function() use ($id){
        $type = Type::where('id', $id)->delete();
    });
    return redirect('type')->with(['delete' => 'Data delete successfully!']);
    }
}
