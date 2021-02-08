<?php

namespace App\Http\Controllers;
use File;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class unitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit ['unit'] = Unit::all();
    	return view('unit.home', $unit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.form');
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
            'unit_code' => ['required'],
    		'unit_name' => ['required'],
    	]);
 
        $unit = new Type();
        $unit->name = $request->input('unit_code'); 
        $unit->description = $request->input('unit_name');
        $unit->description = $request->input('description');
        $unit->description = $request->input('remarks');
        $unit->description = $request->input('other');


        
        
        $unit->save();
       
        
        return redirect('unit')->with(['create' => 'Data saved successfully!']);
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
        $data['page_title'] = 'Edit unit';
        $data['units'] = Type::findOrFail($id);
        // dd($departement);
        return view('unit.edit', $data);
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
        $request->validate([
            'name' => ['required', "unique:unit,name, $id"],
            
        ]);
          
        $unit = Type::findOrFail($id);
        $unit->unit_code = $request->input('unit_code');
        $unit->unit_name = $request->input('unit_name');
        $unit->description = $request->input('description') ?? "N/A";
        $unit->remarks = $request->input('remarks') ?? "N/A";
        $unit->other = $request->input('other') ?? "N/A";
        $unit->save();

        return redirect('unit')->with(['update' => 'Data updated successfully!']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yadi = Unit::findOrFail($id);
        $yadi->delete();
        
    return redirect('unit')->with(['delete' => 'Data delete successfully!']);
    }
}
