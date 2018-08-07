<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use function redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Agent;
use App\Tenant;
use App\Asset;
use App\BankPayment;
use App\Guarantor;
use App\Maintenance;
use App\NextOfKin;
use App\Notification;
use App\RentDue;
use App\TenantReferral;
use App\TenantRent;
use App\User;
use Image;
use Beautymail;

class AgentController extends Controller
{
    public function dashboard()
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $notifications = Notification::where('for_id','=',\Auth::user()->id)->where('status','=','unread')->get();
        $title = "dashboard";
        return view('/agent/index', compact('agentDetails','notifications','title'));
    }
    public function tenants()
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $notifications = Notification::where('for_id','=',\Auth::user()->id)->where('status','=','unread')->get();
        $title = "tenants";
        $tenants = Tenant::select('tenants.id','tenants.designation','tenants.firstname','tenants.lastname','tenants.phone',
            'tenants.occupation',
            'users.email')->join('users','tenants.user_id','=','users.id')->get();
//        $tenant = Tenant::select('tenants.id','designation','firstname','lastname','email','phone','occupation',
//            'users.status')->join('users','tenants.user_id','=','users.id')->where('agent_id','=', $agentDetails->id)->get();
        //return $tenants;
        return view('/agent/tenant_list', compact('agentDetails','notifications','title','tenants'));
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
    public function tenantForm()
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $notifications = Notification::where('for_id','=',\Auth::user()->id)->where('status','=','unread')->get();
        $title = "tenants";
        $categories = Category::all();
        return view('/agent/add_tenants', compact('agentDetails','notifications','title', 'categories'));
    }
    public function addTenant(Request $request)
    {
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
        'photo' => 'required|mimes:jpeg,png,jpg,JPG,PNG,JPEG|max:2048',
        'asset_id' => 'required',
        'asset_description' => 'required',
        'asset_address' => 'required',
        'price' => 'required',
      ]);

        $photo = $request->file('photo');
            $imagename = time().'.'.$photo->getClientOriginalExtension();

            $destinationPath = public_path('xyzwerphoto');
            $thumb_img = Image::make($photo->getRealPath())->resize(130, 130);
            $thumb_img->save($destinationPath. "\\".$imagename,80);
      $user =  User::create([
         'email' => $request->email,
         'password' => bcrypt($request->password),
         'role' => 'tenant',
         'status' => true
         ]);
       $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
       $row = Tenant::orderBy('id','DESC')->limit(1)->first();
        //return $row;
        $n = 0;
        if (!empty($row)) {
          $n = $row->id;
        }
        $number = str_pad($n + 1, 5 , 0 ,STR_PAD_LEFT);
        $referral_code = substr('Property',0,2). substr('Property', -2).$number;
        $tenant =  Tenant::create([
            'designation' => $request->designation,
            'gender' => $request->gender,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->dateofbirth,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'state' => $request->state,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'photo' => $imagename,
            'agent_id' => \Auth::user()->id,
            'asset_id' => $request->asset_id,
            'asset_description' => $request->asset_description,
            'asset_address' => $request->asset_address,
            'price' => $request->price,
            'referral_code' => $request->referral_code,
            'tenant_referral_code' => $referral_code,
      ]);
        $email = $request->email;
        $name = $request->designation . ' ' . $request->firstname . ' ' . $request->lastname;
        $r_message = 'Please be informed that you have been successfully registered on PropertyZone.
    Some of your details registered are:';
        $r_message .= 'Your Refferal Number is ' . $referral_code;
        $designation = $request->designation;
        $gender = $request->gender;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $occupation = $request->occupation;
        $phone = $request->phone;
        $referral_code = $referral_code;
        if($email != '') {
            $send = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $send->send('emails.welcome_new', compact('r_message', 'name', 'designation', 'firstname', 'lastname',
                'gender', 'occupation', 'phone', 'referral_code', 'email'),
                function($r_message) use ($email, $name) {
                $r_message
                    ->from('omotolat12@gmail.com')
                    ->to($email, $name)
                    ->subject('Welcome to PropertyZone!');
            });
        }
      Notification::create([
          'notification_type' => 'Registration successful',
          'for_id' => $user->id,
          'from_id' => \Auth::user()->id,
          'status' => 'unread'
         ]);
     $request->session()->flash('success', 'Tenant successfully Added');
//        $user = User::first();
//        $user->notify(new RentRegistration("You are welcome to PropertyZone."));
     return redirect('/agent/tenant_list');
    }
//   public function check()
//        {
//            $email = $request->email_address_1;
//            $la_user = $request->first_name . ', ' . $request->last_name;
//            $b_message = 'Please be informed that your details have been registered on the Edo State Internal Revenue Service PAYE Portal.' . "\n";
//            $b_message .= 'Your Identification Number is ' . $sector->tin;
//                /*$send_email = Mail::send('mail.notification', compact('message','la_user'), function ($message) use ($email, $la_user) {
//                    $message->to($email, $la_user);
//                    $message->from('admin@eirs.com', 'Edo State Internal Revenue Service');
//                    $message->subject($la_user . ' Details on EIRS Portal');
//                });*/
//
//            if($email != '') {
//                $send = app()->make(\Snowfire\Beautymail\Beautymail::class);
//                $send->send('emails.welcome', compact('b_message', 'la_user'), function ($b_message) use ($email, $la_user) {
//                    $b_message
//                        ->from('admin@eirs.com')
//                        ->to($email, $la_user)
//                        ->subject('Welcome to EIRS!');
//                });
//
//               if ($sector->save() && $send) {
//
//                    if ($sector->mobile_numer_1 != '') {
//                        Utilities::send_sms($sector->mobile_numer_1, $b_message);
//                    }
//
//                    return back()->with('success', 'Employee details Added Successfully!');
//                } else {
//                    return back()->with('error', 'Employee Could not be Added!');
//                }
//            }
//        }
    public function viewTenant($id)
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $notifications = Notification::where('for_id','=',\Auth::user()->id)->where('status','=','unread')->get();
        $title = "tenants";
        $tenant = Tenant::findOrFail($id);
        $email = User::findOrFail($tenant->user_id);
        $nextOfKin = NextOfKin::where('tenant_id','=', $id)->first();
        $guarantor =  Guarantor::where('tenant_id','=', $id)->first();
        return view('/agent/view_tenant', compact('agentDetails','notifications','title','tenant','nextOfKin',
            'guarantor','email'));
    }
    public function editTenant($id)
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        $notifications = Notification::where('for_id','=',\Auth::user()->id)->where('status','=','unread')->get();
        $title = "tenants";
        $tenant = Tenant::findOrFail($id);
        $email = User::findOrFail($tenant->user_id);
        $nextOfKin = NextOfKin::where('tenant_id','=', $id)->first();
        $guarantor =  Guarantor::where('tenant_id','=', $id)->first();
        return view('/agent/edit_tenant', compact('agentDetails','notifications','title','tenant','nextOfKin',
            'guarantor','email'));
    }
    public function updateTenant($id, Request $request)
    {
        $tenantImage = "";
        $tenant = Tenant::findOrFail($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $imagename = time().'.'.$photo->getClientOriginalExtension();
            $tenantImage = $imagename;
            $destinationPath = public_path('xyzwerphoto');
            $thumb_img = Image::make($photo->getRealPath())->resize(130, 130);
            $thumb_img->save($destinationPath. "\\".$imagename,80);
         } else {
               $tenantImage = $tenant->photo;
         }
         $tenant->designation = $request->designation;
         $tenant->gender = $request->gender;
         $tenant->firstname = $request->firstname;
         $tenant->lastname = $request->lastname;
         $tenant->date_of_birth = $request->dateofbirth;
         $tenant->occupation = $request->occupation;
         $tenant->address = $request->address;
         $tenant->state = $request->state;
         $tenant->phone = $request->phone;
         $tenant->photo = $tenantImage;
         $tenant->save();
         $user = User::findOrFail($tenant->user_id);
         $user->status = $request->status;
         $user->save();
         $nextOfKin = NextOfKin::where('tenant_id','=', $tenant->id)->first();
         $nextOfKin->firstname = $request->k_firstname;
         $nextOfKin->lastname = $request->k_lastname;
         $nextOfKin->address = $request->k_address;
         $nextOfKin->phone = $request->k_phone;
         $nextOfKin->save();
         $guarantor = Guarantor::where('tenant_id','=',$tenant->id)->first();
         $guarantor->designation = $request->g_designation;
         $guarantor->occupation = $request->g_occupation;
         $guarantor->address = $request->g_address;
         $guarantor->phone = $request->g_phone;
         $guarantor->firstname = $request->g_firstname;
         $guarantor->lastname = $request->g_lastname;
         $guarantor->save();
         $request->session()->flash('success', "Tenant's details successfully updated");
        return redirect()->back();
    }
}