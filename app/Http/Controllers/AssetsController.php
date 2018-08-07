<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Asset;
use App\AssetTenant;
use App\Category;
use App\Notification;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AssetsController extends Controller
{
    //Display pages

    public function addAssets(){
        return view('agent/add_assets');
    }
    public function editAssets(){
        return view('agent/edit_assets');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $assetsCategories = DB::table('assets')
        ->join('categories', 'assets.category_id', '=', 'categories.id')
        ->select('assets.id', 'assets.quantity_added','assets.address', 'categories.name', 'assets.description',
            'assets.price')
        ->orderBy('assets.id', 'desc')->get();
       $assets = Asset::latest('id')->get()->toArray();
       $categories = Category::all()->toArray();
//      $assetsCategories  = array_merge($assets, $categories);
//       dd($assetsCategories);
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $notifications = Notification::where('for_id','=',\Auth::user()->id)->where('status','=','unread')->get();
        $title = "assets";
        return view('/agent/assets_list', compact('assets', 'agentDetails','notifications','title', 'categories', 'assetsCategories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $categories = Category::all();
        return view('agent/add_assets', compact('categories', 'agentDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate
        $this->validate($request, array(
            'description' => 'required',
            'category_id' => 'required',
            'quantity_added' => 'required',
            'price' => 'required',
            'address' => 'required',
        ));
        $checkForDuplicate = DB::table('assets')
            ->where([
                'description' => $request->description,
                'address' => $request->address,
                'price' => $request->price,
            ])->first();
        //store inside the Database
        if(! $checkForDuplicate){
            $asset = New Asset();
            $asset->description = $request->description;
            $asset->category_id = $request->category_id;
            $asset->quantity_added = $request->quantity_added;
            //select the last value of quantity_left
    //        $old_quantity = Asset::sum('quantity_added');
    //        $new_quantity = $request->quantity_added;
            //add it up with the new quantity_added value
            $asset->quantity_left = $request->quantity_added;
            $asset->price = $request->price;
            $asset->address = $request->address;
            $asset->save();
            $request->session()->flash('success', 'Asset Successfully Added');
            //redirect to list page
            return redirect('agent/assets_list');
        }else{
            $request->session()->flash('warning', 'Asset already exist');
            return redirect('agent/add_assets');
        }
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
        $categories = Category::all();
        //get the category_id using the concerned asset id
        //SELECT category_id FROM propertyzone.assets where id = 43;
        $assetCat = Asset::where('id', '=', $id)->value('category_id');
        //dd($assetCat);
        //use $assetCat to get the names of the category_id
        //SELECT name FROM propertyzone.categories where id = 3;
        $assetCategory = Category::where('id', '=', $assetCat)->pluck('name')->first();
        //dd($assetCategory);
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $asset = Asset::find($id);
        return view('agent/edit_assets', compact('asset', 'agentDetails', 'categories', 'assetCategory'));
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

//        return $request->all();
            //validate
            $this->validate($request, array(
                'description' => 'required',
                'category_id' => 'required',
                'quantity_added' => 'required',
                'price' => 'required',
                'address' => 'required',
            ));

            //store inside the Database
        $asset = Asset::find($id);
        $asset->description = $request->description;
        $asset->category_id = $request->category_id;
        $asset->quantity_added = $request->quantity_added;
        //select the last value of quantity_left
        $old_quantity = Asset::sum('quantity_added');
        $new_quantity = $request->quantity_added;
        //add it up with the new quantity_added value
        $asset->quantity_left = collect([$old_quantity, $new_quantity])->sum();
        $asset->price = $request->price;
        $asset->address = $request->address;
        $asset->save();
        //flash message
        $request->session()->flash('success', 'Asset Successfully Added');
        //redirect to list page
        return redirect('agent/assets_list');
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