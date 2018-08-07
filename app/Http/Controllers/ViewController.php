<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Notification;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //Debit Routes

    public function showEditDebit(){
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();

        return view('agent/edit_debit', compact('agentDetails'));
    }
    public function showPayment(){
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        return view('agent/payment', compact('agentDetails'));
    }
    public function addDebit(){
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        return view('agent/add_debit', compact('agentDetails'));
    }
    //Profile
    public function showProfile(){
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        return view('agent/profile', compact('agentDetails'));
    }
     //Notification
    public function showNotificationList()
    {
        $notifications = Notification::all();
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        return view('agent/notification_list', compact('notifications', 'agentDetails'));
    }
    public function showNotificationView()
    {
        $agentDetails = Agent::where('user_id','=',\Auth::user()->id)->first();
        return view('agent/notification_view', compact('agentDetails'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
