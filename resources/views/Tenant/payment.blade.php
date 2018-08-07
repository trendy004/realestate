@extends('partials.layouts')
@section('content')
    <div class="main-container">
        <aside data-mcs-theme="minimal-dark" style="background-image: (url{{asset('build/images/backgrounds/11.jpg')}})" class="main-sidebar closed mCustomScrollbar">
            <ul class="list-unstyled navigation mb-0">
                <li class="sidebar-header pt-0"></li>
                <li><a href="{{ url('/tenant/profile') }}" class="bubble"><i class="ti-home"></i> Profile</a></li>
                <li><a href="{{ url('/tenant/rent') }}" class="bubble"><i class="ti-receipt"></i> Rent</a></li>
                <li><a href="{{ url('/tenant/referrals') }}" class="bubble"><i class="ti-layers-alt"></i> Referrals</a></li>
                <li><a href="{{ url('/tenant/maintenance') }}" class="bubble"><i class="ti-folder"></i> Maintenance</a></li>
                {{--<li><a href="{{ url('/tenant/notification') }}" class="bubble"><i class="ti-layout-grid2"></i>Notifications</a></li>--}}
                <li><a href="{{ route('logout') }}" class="bubble" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }} " method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>

        </aside>
    </div>
      <div class="page-container">
        <div class="page-header clearfix">
          
        
        </div>
        <div class="page-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Make payment</h3>
                </div>
                <div class="widget-body clearfix">
                  <div class="form-group">
                    <div class="col-sm-9">
                        <div class="radio-custom">
                          <input id="method1" type="radio" name="optionsRadios" value="1">
                          <label for="method1">Bank Payment</label>
                        </div>
                        <form  method="post" data-toggle="validator" id="bank" class="hide">
                            <p><strong>Please make sure you make your payments to our bank account details as follows</strong></p>
                            <br/>
                            <p>
                                <strong>Account Name</strong> - XXXXXXXXX
                                <br/>
                                <strong>Account Number</strong> - 028912819818
                            </p>
                            <br/>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                      <label for="txtDirector">Upload Scanned teller</label>
                                      <input id="fileInput" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle" required>
                                      <div class="help-block with-errors"></div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <button class="btn btn-success pull-right" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                        <div class="radio-custom">
                            <input id="method2" type="radio" name="optionsRadios">
                            <label for="method2">Online Payment</label>
                        </div>
                        <div class="container hide" id="online" >
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                Payment Details
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" >
                                            <div class="form-group">
                                                <label for="cardNumber">
                                                    CARD NUMBER</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                                        required autofocus />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 col-md-7">
                                                    <div class="form-group">
                                                        <label for="expityMonth">
                                                            EXPIRY DATE</label>
                                                        <div class="row">
                                                          <div class="col-xs-6 col-lg-6 pl-ziro">
                                                            <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                                        </div>
                                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                                            <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-md-5 pull-right">
                                                    <div class="form-group">
                                                        <label for="cvCode">
                                                            CV CODE</label>
                                                        <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#"><span class="badge pull-right" style="line-height: 0px; height: auto; padding: 12px 30px;"> ₦4200</span> Amount</a>
                                        </li>
                                    </ul>
                                    <br/>,
                                    <a href="#" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Sidebar start-->
    </div>
    <!-- Demo Settings start-->
    
    <!-- Demo Settings end-->
@endsection