<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Calibration;
use App\CategoryAsset;
use App\Category;
use App\Location;
use App\Type; 
use Illuminate\Http\Request;

class all_assetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTree()
    {
        $assets = Asset::get();
        $tree = array();

        foreach($assets as $asset){
            if (isset($asset->parent->id)) {
                $parent = $asset->parent->id;
            } else {
                $parent = "#";
            }

            $selected = false;
            $opened = false;
            // if($asset->id == 2){
                // $selected = true;
                // $opened = true;
            // } 
            
            $tree[] = array(
                "id" => $asset->id,
                "parent" => $parent,
                "text" => $asset->name . " (" . (isset($asset->assetType->name) ? $asset->assetType->name : '') . " - " . (isset($asset->assetCategory->name) ? $asset->assetCategory->name : '') . ")",
                "icon" => asset($asset->image ?? 'backend/images/noimage.jpg'),
                'a_attr'=> array(
                    'show'=> "assets/".$asset->id,
                    'edit'=> "assets/".$asset->id.'/edit'
                ),
                "state" => array("selected" => $selected,"opened"=>$opened)
            );
        }

        return json_encode($tree); 
     
    }
        public function index()
        {
            $data[''] = 'Assets';
            $data['asset'] = Asset::all();
    
            $data[''] = 'Calibration';
            $data['calibration'] = Calibration::all();
            return view('all_assets.home', $data);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['types'] = Type::all();
        $data['locations'] = Location::all();
        $data['assets'] = Asset::all();
        return view('all_assets.create', $data);
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
        //
    }
}
