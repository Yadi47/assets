<?php

namespace App\Http\Controllers;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class locationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location ['location'] = Location::all();
    	return view('location.home', $location);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.form');
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
    		'country' => ['required', 'min:3'], 
            'province' => ['required', 'min:3'],
            'city' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'postal_code' => ['required', 'min:2'],
            'longtitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric']
        ]);
        
        $location = new Location();
        $location->country = $request->input('country');
        $location->province = $request->input('province');
        $location->city = $request->input('city');
        $location->address = $request->input('address');
        $location->postal_code = $request->input('postal_code');
        $location->longtitude = $request->input('longtitude');
        $location->latitude = $request->input('latitude');
        $location->save();

        return redirect('location')->with(['create' => 'Data saved successfully!']);

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
        $data['locations'] = Location::findOrFail($id);
        // dd($departement);
        return view('location.edit', $data);
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
            'country' => ['required', "unique:location,country, $id"],
        ]);
          
        $location = Location::findOrFail($id);

        $location->country = $request->input('country');
        $location->province = $request->input('province');
        $location->city = $request->input('city');
        $location->address = $request->input('address');
        $location->postal_code = $request->input('postal_code');
        $location->longtitude = $request->input('longtitude');
        $location->latitude = $request->input('latitude');
        $location->save();

        return redirect('location')->with(['update' => 'Data updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        
    return redirect('location')->with(['delete' => 'Data delete successfully!']);
    }
}
