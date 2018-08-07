<?php

namespace App\Http\Controllers;

use App\User;
use App\Agent;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function redirect;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
   
   public function addAgent(Request $request)
   {
   	

     $request->validate([
    'email' => 'required|email|unique:users',
    'firstname' => 'required',
    'lastname' => 'required',
    'dateofbirth' => 'required',
    'gender' => 'required',
    'companyname' => 'required',
    'companyaddress' => 'required',
    'phone' => 'required',
    'password' => 'required|min:5'
    ]);


    $user =  User::create([
     'email' => $request->email,
     'password' => bcrypt($request->password),
     'role' => 'agent'
     ]);


     Agent::create([
     'firstname' => $request->firstname,
     'lastname' => $request->lastname,
     'date_of_birth' => $request->dateofbirth,
     'gender' => $request->gender,
     'company_name' => $request->companyname,
     'company_address' => $request->companyaddress,
     'phone' => $request->phone,
     'user_id' => $user->id
     ]);

     Notification::create([
      'notification_type' => 'Registration successful',
      'for_id' => $user->id,
      'from_id' => 1,
      'status' => 'unread'
     ]);


     $request->session()->flash('success', 'You account was created successfully, we will get back to you shortly, once your account has been activated');
     return redirect()->back();

   }


     public function login(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){

          

            if(\Auth::user()->role == "agent" and \Auth::user()->status == true ){
                return redirect('/agent');

            }elseif (\Auth::user()->role == "agent" and \Auth::user()->status == false) {
               
             Session::flash('error','You account has not been activated yet, please contact propertyZone');
            return   redirect('/');
            }


            if(\Auth::user()->role == "tenant" and \Auth::user()->status == true ){
                return redirect('/tenant/profile');
            }elseif (\Auth::user()->role == "tenant" and \Auth::user()->status == false) {
               
             Session::flash('error','You account is inactive, please contact your agent');
            return   redirect('/');
            }


            if(\Auth::user()->role == "admin"){
               Session::flash('error','Coming soon');
            return   redirect('/');

            }



        }
        else{
            Session::flash('error','Invalid Login details');
            return   redirect('/');
        }
    }


    public function logout(){

        Auth::logout();
        return redirect('/');
    }



}
