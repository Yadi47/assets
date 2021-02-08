<?php

namespace App\Http\Controllers;
use File;
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
                "icon" => asset($asset->image ?? 'images/noimage.jpg'),
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
            $data['asset'] = Asset::all();
    
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
        // dd($request->all());
        $request->validate([
            'code' => ['required', 'string', 'unique:assets,code','min:2'],
            'name' => ['required', 'string','min:3'],
            'purchase_at' => ['required','date_format:Y-m-d'],
            'purchase_price' => ['required','regex:/^\d+(\.\d{1,2})?$/','numeric'],
            'description' => ['nullable'],
            'status' => ['required','in:1,0'],
            'model' => ['required','min:3'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand' => ['required','min:3'],
            'category_id' => ['required'],
            'type_id' => ['required'],
            'location_id' => ['required'],
            'asset_part_of' => ['nullable'],
            'file_name.*'=>['mimes:pdf,word,docx,ppt,pptx,csv,xlsx,jpeg,png,jpg,gif,svg', 'max:15000'],
            'bom_id'=>['nullable'],
        ]);

        $data['code'] = $request->get('code');
        $data['name'] = $request->get('name');
        $data['purchase_at'] = $request->get('purchase_at');
        $data['purchase_price'] = $request->get('purchase_price');
        $data['description'] = $request->get('description');
        $data['status'] = $request->get('status');
        $data['model'] = $request->get('model');
        $data['brand'] = $request->get('brand');
        $data['category_id'] = $request->get('category_id');
        $data['type_id'] = $request->get('type_id');
        $data['location_id'] = $request->get('location_id');
        $data['asset_part_of'] = ($request->get('asset_part_of')==0?null:$request->get('asset_part_of'));

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/assets');
            $image->move($destinationPath, $name);
            $data['image'] =$name;
        }
        $assets = Asset::create($data);
        $assets->boms()->attach($request->get('bom_id'));
       
        $assetCalibrations = [];
        // $assets->save();

        if($request->hasfile('file_name')){
            $z = 0;
            foreach($request->file('file_name') as $file){
                $name = $file->getClientOriginalName();

                $i = 1;
                while(file_exists('backend/images/asset-calibrations/'.$name)){
                    $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)."($i).".$file->getClientOriginalExtension();
                    $i++;
                }
                $destinationPath = public_path('backend/images/asset-calibrations/');
                $file->move($destinationPath, $name);

                $assetCalibrations[] = [
                    'file_name' => $name,
                    'asset_id' => $assets->id
                ];

                $z++;
            }   
            $assets->assetCalibrations()->insert($assetCalibrations);
        }
       

    return redirect()->route('all_assets.index')->with(['create' => 'Data saved successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['all_assets'] = Assets::findOrFail($id);
        $data['page_title'] = 'Assets';
        $data['locations'] = Location::all();
        $data['boms'] = bom::all();
        // $data['privileges'] = $data['departement']->privilege($id)->get();
        return view('all_assets.detail', $data);
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
