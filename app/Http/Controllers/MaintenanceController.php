<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\BuildingSection;
use App\Maintenance;
use App\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\AssetTenantController;

class MaintenanceController extends Controller
{
    public function assetTenant(){
        $tenantAssets = DB::table('tenants')
            ->join('maintenances', 'tenants.id', '=', 'maintenances.tenants_id')
            ->select('tenants.id','tenants.designation','tenants.firstname','tenants.lastname', 'maintenances.id',
                'maintenances.category', 'maintenances.building_section',  'maintenances.reported_date',
                'maintenances.description', 'maintenances.m_status')
            ->get();
        return $tenantAssets;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tenants = Tenant::all();
        //$maintenances = Maintenance::latest('id')->get();
        //$maintenances = $this->assetTenant();
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $maintenances = DB::table('tenants')
            ->select('tenants.lastname','tenants.firstname','maintenances.id','maintenances.m_status','tenants.designation',
                'maintenances.fault','maintenances.building_section','maintenances.category','maintenances.reported_date')
            ->join('maintenances','maintenances.tenants_id','=','tenants.id')->orderBy('maintenances.id', 'desc')
            ->get();
        $categories = Category::all();
        $users = DB::table('maintenances')->simplePaginate(4);
        return view('agent/maintenance_list', compact('maintenances','categories', 'assetTenants', 'tenants',
            'users', 'agentDetails'));
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
        $buildingSections = BuildingSection::all();
        $tenants = Tenant::all();
        return view('agent/add_maintenance', compact('tenants', 'buildingSections', 'categories', 'agentDetails'));
    }
    public function select_asset_ajax(Request $request){
        //SELECT * FROM propertyzone.asset_tenants where tenant_id = 1;
        if ($request->ajax()){
            $assetTenants = DB::table('asset_tenants')->where('tenant_id', $request->tenant_id)->pluck("description",
                "description")->all();
            $data = view('ajax_select_asset', compact('assetTenants'))->render();
            return response()->json(['options'=>$data]);
        }
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
            'tenants_id' => 'required',
            'category' => 'required',
            'building_section' => 'required',
            'fault' => 'required',
            'reported_date' => 'required',
            'm_status' => 'required',
        ));
        //store inside the Database
        $maintenance = New Maintenance();
        $maintenance->tenants_id = $request->tenants_id;
        $maintenance->category = $request->category;
        $maintenance->building_section = $request->building_section;
        $maintenance->fault = $request->fault;
        $maintenance->reported_date = $request->reported_date;
        $maintenance->m_status = $request->m_status;
        $maintenance->save();
        //redirect to list page
        return redirect('agent/maintenance_list');
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
        $tenants =  Tenant::all();
        $maintenance =  Maintenance::find($id);
        $buildingSections = BuildingSection::all();
        return view('agent/edit_maintenance', compact('maintenance', 'tenants', 'buildingSections', 'agentDetails'));
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
        //validate
        $this->validate($request, array(
            'tenants_id' => 'required',
            'category' => 'required',
            'building_section' => 'required',
            'fault' => 'required',
            'reported_date' => 'required',
            'm_status' => 'required',
        ));
        //update inside the Database
        $maintenance = Maintenance::find($id);
        $maintenance->tenants_id = $request->tenants_id;
        $maintenance->category = $request->category;
        $maintenance->building_section = $request->building_section;
        $maintenance->fault = $request->fault;
        $maintenance->reported_date = $request->reported_date;
        $maintenance->m_status = $request->m_status;
        $maintenance->save();
        //redirect to list page
        return redirect('agent/maintenance_list');
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
