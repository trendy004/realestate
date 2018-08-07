<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Category;
use App\RentDue;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Asset;
use App\Maintenance;
use App\Tenant;
use App\AssetTenant;
use Illuminate\Http\Request;
class AssetTenantController extends Controller
{
    public function select_category_ajax(Request $request)
    {
        //SELECT * FROM propertyzone.assets where quantity_left = 0;
        //SELECT * FROM propertyzone.assets where assets.category_id = 2;
        if($request->ajax()){
//            if($assetQuantityCheck){
            $category = DB::table('assets')->where('category_id',$request->category_id)->where('quantity_left', '>', 0)->pluck("id", "description")->all();
//            }
            $data = view('ajax-select-category',compact('category', 'assetQuantityCheck'))->render();
            return response()->json(['options'=>$data]);
        }
    }
    public function select_location_ajax(Request $request)
    {
        //SELECT * FROM propertyzone.assets where assets.description = '6 Bedroom Flats';
        if($request->ajax()){
            $address = DB::table('assets')->where('description',$request->description)->pluck("address","address")
                ->all();
            $data = view('ajax-select-location',compact('address'))->render();
            return response()->json(['options'=>$data]);
        }
    }
    public function select_price_ajax(Request $request)
    {
        //SELECT * FROM propertyzone.assets where assets.address = '6 Bedroom Flats';
        if($request->ajax()){
            $price = DB::table('assets')->where('address',$request->address)->pluck("price")->all();
            $data = view('ajax_select_price',compact('price'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function assetTenant(){
        $tenantAssets = DB::table('asset_tenants')
            ->join('tenants', 'tenants.id', '=', 'asset_tenants.tenant_id')
            ->join('assets', 'assets.id', '=', 'asset_tenants.asset_id')
            ->join('categories', 'categories.id', 'asset_tenants.asset_id')
            ->select('asset_tenants.id','tenants.id','tenants.designation','tenants.firstname','tenants.lastname','categories.name',
                'assets.id','assets.description', 'assets.category_id', 'assets.address','assets.price', 'asset_tenants.occupation_date')
            ->orderBy('asset_tenants.id', 'desc')->get();
        return $tenantAssets;
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
            ->orderBy('assets.id', 'desc')->get()->toArray();

        $assets = Asset::all();
        $tenants = Tenant::all();
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $tenantProperties = AssetTenant::select('asset_tenants.id','tenants.id','tenants.designation','tenants.firstname','tenants.lastname',
            'assets.id','asset_tenants.description', 'assets.category_id', 'asset_tenants.address','asset_tenants.price', 'asset_tenants.occupation_date')
            ->join('tenants', 'tenants.id', '=', 'asset_tenants.tenant_id')
            ->join('assets', 'assets.id', '=', 'asset_tenants.asset_id')
            ->orderBy('asset_tenants.id', 'desc')->get();
        //$tenantProperties = array_merge($tenantAssets, $assetsCategories);
//        dd($tenantProperties);
//       AssetTenant::latest('id')->get();
        $users = DB::table('maintenances')->simplePaginate(15);
        return view('agent/tenantProperty_list', compact('assets', 'tenants', 'tenantProperties', 'users',
            'agentDetails'));
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
        $assets = Asset::all();
        $tenants = Tenant::all();
        return view('agent/add_tenantProperty', compact('assets', 'tenants', 'categories', 'agentDetails'));
    }
    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validation = validator::make($request->all(), [
            'tenant_id' => 'required',
            'asset_id' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required',
            'occupation_date' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect('agent/tenantProperrty')
                ->withErrors($validation)
                ->withInput();
        }
        //create and save new data
        $arr = explode(":", $request->description);
        $checkDuplicate = DB::table('asset_tenants')
            ->where([
                'tenant_id' => $request->tenant_id,
                'description' => $arr[1],
                'address' => $request->address,
                'price' => $request->price,
            ])->first();
        if(! $checkDuplicate){
            $tenantProperty = New AssetTenant();
            $tenantProperty->tenant_id = $request->tenant_id;
            $tenantProperty->asset_id = $arr[0];
            $tenantProperty->description = $arr[1];
            $tenantProperty->address = $request->address;
            $tenantProperty->price = $request->price;
            $tenantProperty->occupation_date = $request->occupation_date;
            $tenantProperty->due_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($request->occupation_date)) . " + 1 year"));
            $tenantProperty->save();
            $request->session()->flash('success', "Apartment Assigned Successfully");
            DB::table('assets')->where('id', $arr[0])->increment('quantity_occupied', 1);
            DB::table('assets')->where('id', $arr[0])->decrement('quantity_left', 1);
            $currentDate = date('Y-m-d');
            $dueDate =  RentDue::orderBy('id', 'DECS')->pluck('due_date', 'id');
                DB::table('asset_tenants')
                ->where('due_date', '<', $currentDate)
                ->update(['rent_dues_status' => 'Violating']);

            $request->session()->flash('success', 'Asset Successfully Added');
            //redirect back to List page
            return redirect('agent/tenantProperty_list');
        }else{
            $request->session()->flash('warning', 'Asset already assigned to Tenant');
            return redirect('agent/add_tenantProperty');
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
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $tenantProperty = AssetTenant::find($id);
        $assets = Asset::all();
        $tenants = Tenant::all();
        if (empty($tenantProperty)) {
            echo "TenantProperty not found";
        }else {
            return view('agent/edit_tenantProperty', compact('tenantProperty', 'assets', 'tenants', 'agentDetails'));
        }
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
        //validation
        $this->validate($request, array(  // Removed `[]` from the array.
            'tenant_id' => 'required',
            'asset_id' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required',
            'occupation_date' => 'required',
        ));
        //edit and save data
        $tenantProperty = AssetTenant::find($id);
        $tenantProperty->tenant_id = $request->tenant_id;
        $tenantProperty->asset_id = $request->asset_id;
        $tenantProperty->description = $request->description;
        $tenantProperty->address = $request->address;
        $tenantProperty->price = $request->price;
        $tenantProperty->occupation_date = $request->occupation_date;
        $tenantProperty->due_date = date($request->occupation_date, strtotime('+1 year'));
        $tenantProperty->save();
        //redirect back to List page
        return redirect('agent/tenantProperty_list');
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
    public function showDebitList(){
        $currentDate = date('Y-m-d');
//        $dueDate =  RentDue::pluck('due_date', 'id');
//        if($dueDate > $currentDate){
            DB::table('rent_dues')
                ->where('due_date', '>', $currentDate)
                ->update(['status' => 'Cooperating']);
//            $rent = RentDue::find($id);
//            $rent->status = 'Cooperating';
//            $rent->save();
//        }else{
//            $rent = RentDue::find($id);
//            $rent->status = 'Violating';
//            $rent->save();
//        }
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $tenantProperties = AssetTenant::all();
        $assetProperties = AssetTenant::select('asset_tenants.occupation_date', 'tenants.id','tenants.designation', 'tenants.firstname','tenants.lastname',
            'asset_tenants.address', 'asset_tenants.description','asset_tenants.rent_dues_status','tenants.state',
            'asset_tenants.price')
            ->join('tenants', 'tenants.id', '=', 'asset_tenants.tenant_id')
            ->orderBy('asset_tenants.id', 'desc')->get();
        return view('agent/debit_list', compact('tenantProperties', 'assetProperties', 'agentDetails'));
    }
    //Report functions
    public function paymentsReport(){

        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $tenantProperties = AssetTenant::select('asset_tenants.due_date', 'tenants.id','tenants.designation', 'tenants.firstname','tenants.lastname',
            'asset_tenants.address', 'asset_tenants.description','asset_tenants.rent_dues_status','asset_tenants.price')
            ->join('tenants', 'tenants.id', '=', 'asset_tenants.tenant_id')
            ->orderBy('asset_tenants.id', 'desc')->get();
        return view('agent/payments_report', compact('tenantProperties', 'agentDetails'));
    }
    public function assetsReport()
    {
        $assets = Asset::select('assets.id', 'assets.category_id', 'assets.description','assets.address', 'assets.quantity_added',
            'assets.quantity_occupied', 'assets.quantity_left','categories.id','categories.name')
        ->join('categories', 'categories.id', '=', 'assets.category_id')
        ->orderBy('assets.id', 'desc')->get();
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        return view('agent/assets_report', compact('tenantProperties', 'assets', 'agentDetails'));
    }
    public function maintenanceReport()
    {
        $maintenances = DB::table('tenants')
            ->join('maintenances','maintenances.tenants_id','=','tenants.id')->orderBy('maintenances.id', 'desc')
            ->select('tenants.lastname','tenants.firstname','maintenances.id','maintenances.m_status','tenants.designation',
            'maintenances.fault','maintenances.building_section','maintenances.category','maintenances.reported_date')
            ->get();
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $tenantProperties = $this->assetTenant();
        return view('agent/maintenance_report', compact('tenantProperties', 'maintenances', 'agentDetails'));
    }
    public function legal()
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $tenantProperties = AssetTenant::select('asset_tenants.occupation_date', 'tenants.id','tenants.designation', 'tenants.firstname','tenants.lastname',
            'asset_tenants.address', 'asset_tenants.description','asset_tenants.rent_dues_status','tenants.state',
            'asset_tenants.price')
            ->join('tenants', 'tenants.id', '=', 'asset_tenants.tenant_id')
            ->orderBy('asset_tenants.id', 'desc')->get();
        return view('agent/legal', compact('tenantProperties',  'agentDetails'));
    }
}