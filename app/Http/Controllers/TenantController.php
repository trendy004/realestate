<?php

namespace App\Http\Controllers;

use App\Asset;
use App\BuildingSection;
use App\Category;
use App\Maintenance;
use App\RentDue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Guarantor;
use App\NextOfKin;
use App\Tenant;
use App\Notification;
use function redirect;
use App\AssetTenant;
use App\User;
use Image;

class TenantController extends Controller
{
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
    public function checkValidTenant($tenant_id){
        $check = NextOfKin::where('tenant_id', '=', $tenant_id)->get('tenant_id');
        return $check;
    }
    public function select_category_ajax(Request $request)
    {
        //SELECT * FROM propertyzone.assets where assets.category_id = 2;
        if($request->ajax()){
            $category = DB::table('assets')->where('category_id',$request->category_id)->where('quantity_left', '>', 0)->pluck("description",
                "description")->all();
            $data = view('ajax-select-category',compact('category'))->render();
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
    public function profile()
    {
        //get user login id
//        $id = \Auth::user()->id;
//        $tenantDetails  = Tenant::find($id)->get();
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();
        $photo =  Tenant::where('user_id', '=', \Auth::user()->id)->pluck('photo');
    	return view('/tenant/profile', compact('tenantDetails', 'photo'));
    }
    Public function tenantRegistration(){
        $assets = Asset::all();
        $categories = Category::all();
        return view('register_tenant', compact('assets', 'categories'));
    }
    Public function addtenantRegistration(Request $request){
    $request->validate([
        'designation' => 'required',
        'email' => 'required|email|unique:users',
        'firstname' => 'required',
        'lastname' => 'required',
        'dateofbirth' => 'required',
        'gender' => 'required',
        'occupation' => 'required',
        'address' => 'required',
        'state' => 'required',
        'phone' => 'required',
        'password' => 'required|min:5',
        'category_id' => 'required',
        'asset_description' => 'required',
        'asset_address' => 'required',
        'price' => 'required',
    ]);
    if($request->file('photo')){
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path('xyzwerphoto');
        $thumb_img = Image::make($photo->getRealPath())->resize(130, 130);
        $thumb_img->save($destinationPath. "\\".$imagename,80);
    }
    $user =  User::create([
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'tenant',
        'status' => true
    ]);
    // $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
    $row = Tenant::orderBy('id','DESC')->limit(1)->first();
    //return $row;
    $n = 0;
    if (!empty($row)) {
        $n = $row->id;
    }
    $number = str_pad($n + 1, 5 , 0 ,STR_PAD_LEFT);
    $referral_code = substr('Property',0,2). substr('Property', -2).$number;
        Tenant::create([
        'designation' => $request->designation,
        'gender' => $request->gender,
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'date_of_birth' => $request->dateofbirth,
        'occupation' => $request->occupation,
        'address' => $request->address,
        'state' => $request->state,
        'phone' => $request->phone,
        'photo' => $imagename,
        'user_id' => $user->id,
        'category_id' => $request->category_id,
        'asset_description' => $request->asset_description,
        'asset_address' => $request->asset_address,
        'price' => $request->price,
        'referral_code' =>$referral_code,
    ]);
        //Flash Message
        $request->session()->flash('success', 'Tenant successfully Added');
        //redirect to page
        return redirect('/tenant/profile');
}

    public function storeProfile(Request $request){
        //validate Tenant profile data
        $request->validate([
            'k_firstname' => 'required',
            'k_lastname' => 'required',
            'k_address' => 'required',
            'k_phone' => 'required',
            'g_designation' => 'required',
            'g_occupation' => 'required',
            'g_firstname' => 'required',
            'g_lastname' => 'required',
            'g_address' => 'required',
            'g_phone' => 'required'
        ]);
        NextOfKin::create([
            'firstname' => $request->k_firstname,
            'lastname' => $request->k_lastname,
            'address' => $request->k_address,
            'phone' => $request->k_phone,
            'tenant_id' => \Auth::user()->id,
        ]);
        Guarantor::create([
            'designation' => $request->g_designation,
            'occupation' => $request->g_occupation,
            'firstname' => $request->g_firstname,
            'lastname' => $request->g_lastname,
            'address' => $request->g_address,
            'phone' => $request->g_phone,
            'tenant_id' => \Auth::user()->id,
        ]);
        //Flash Message
        $request->session()->flash('success', 'Tenant Profile Updated Successfully');
        //redirect to page
        return redirect('/tenant/profile');
    }
    public function rent(Request $request)
    {
//        if($this->checkValidTenant(\Auth::user()->id)){
            $rents = RentDue::where('tenant_id', '=', \Auth::user()->id)->get();
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();
            return view('/tenant/rent', compact('rents', 'tenantDetails'));
//        }else{
//            return redirect()->route('tenant/profile');
//        }
    }
    public function referrals(Request $request)
    {
//        if($this->checkValidTenant(\Auth::user()->id)){
        $user_id = Tenant::select('user_id')->first();
        $user = \Auth::user()->id;
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();

        return view('/tenant/referrals', compact('tenantDetails'));
//    }
//      else{
//        $request->session()->flash('warning', "Next of Kin and Guarantor's details must be updated");
//        return redirect('tenant/profile');
//        }
    }
    public function payment()
    {
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();
        return view('/tenant/payment', compact('tenantDetails'));
    }
    public function maintenance(Request $request)
    {
//      if($this->checkValidTenant(\Auth::user()->id)){
        //SELECT * FROM propertyzone.tenants where user_id = 19;
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();
        $tenants = Tenant::where('user_id', '=', \Auth::user()->id)->pluck('id');
        $maintenances = Maintenance::where('tenants_id', '=', $tenants)->get();
            return view('/tenant/maintenance', compact('maintenances', 'tenantDetails'));
//        }else{
//
//            $request->session()->flash('warning', "Next of Kin and Guarantor's details must be updated");
//            return redirect('tenant/profile');
//        }
    }
    public function addMaintenance()
    {
        $buildingSections = BuildingSection::all();
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();
        return view('/tenant/addMaintenance', compact('buildingSections', 'tenantDetails'));
    }
    public function storeMaintenance(Request $request){
        //validate maintenance data
        $this->validate($request, array(
            'building_section' => 'required',
            'reported_date' => 'required',
            'fault' => 'required',
            'm_status' => 'required',
        ));
        $maintenance = New Maintenance();
        $maintenance->tenants_id = \Auth::user()->id;
        $maintenance->category = AssetTenant::where('description', '=', $maintenance->category);
        $maintenance->building_section = $request->building_section;
        $maintenance->reported_date = $request->reported_date;
        $maintenance->fault = $request->fault;
        $maintenance->m_status = $request->m_status;
//        return $request->all();
        //Flash Message
        $request->session()->flash('success', "Tenant's complain successfully added");
        //redirect
        return back();
    }
    public function notification(Request $request)
    {
//        if($this->checkValidTenant(\Auth::user()->id)) {
        $tenantDetails = Tenant::where('user_id','=',\Auth::user()->id)->first();
            return view('/tenant/notification', compact('tenantDetails'));
//        }else{
//            $request->session()->flash('warning', "Next of Kin and Guarantor's details must be updated");
//            return redirect('tenant/profile');
//            }
    }
}