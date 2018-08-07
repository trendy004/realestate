@include('partials.head')
  <body data-sidebar-color="sidebar-light" class="sidebar-light">
    <!-- Header start-->
@include('partials.topnav')
    <!-- Header end-->
    <div class="main-container">
      <!-- Main Sidebar start-->
        <aside data-mcs-theme="minimal-dark" style="background-image: url{{asset('build/images/backgrounds/11.jpg')}}" class="main-sidebar closed mCustomScrollbar">
            <ul class="list-unstyled navigation mb-0">
                <li class="sidebar-header pt-0"></li>
                <li><a href="{{ url('agent') }}" class=" bubble"><i class="ti-home"></i> Dashboard</a></li>
                <li><a href="{{ url('/agent/assets_list') }}" class="bubble"><i class="ti-receipt"></i> Assets</a></li>
                <li><a href="{{ url('/agent/tenant_list') }}" class="bubble"><i class="ti-user"></i> Tenants</a></li>
                <li><a href="{{ url('/agent/tenantProperty_list') }}" class="active bubble"><i class="ti-panel"></i> Tenants
                        property Mgt</a></li>
                <li><a href="{{ url('/agent/maintenance_list') }}" class="bubble"><i class="ti-folder"></i> Maintenance</a></li>
                <li><a href="{{ url('/agent/debit_list') }}" class="bubble"><i class="ti-blackboard"></i> Debts</a></li>
                <li><a href="{{ url('/agent/assets_report') }}" class="bubble"><i class="ti-bar-chart"></i> Reports</a></li>
                {{--<li><a href="{{ url('/agent/notification_list') }}" class="bubble"><i class="ti-book"></i>Notification</a></li>--}}
                <li><a href="{{ route('logout') }}" class="bubble" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }} " method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </aside>
      <!-- Main Sidebar end-->
      <div class="page-container">
        <div class="page-header clearfix">
          <div class="pull-left">
            
            <a href="" class="mb-15 btn btn-raised btn-primary">Tenants List</a>
            <a href="" class="mb-15 btn btn-raised btn-primary">Add Tenant</a>
            
          </div>
          <div class="pull-right">
            <a href="" class="mb-15 btn btn-raised btn-success">Print</a>
          </div>
        
        </div>
        <div class="page-content container-fluid">
           <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">{{$tenant->firstname}} {{$tenant->lastname}} - Referral code({{$tenant->referral_code}})</h3>
                </div>
                <div class="widget-body">
                  <div class="user">
          <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
            <img src="{{asset('/xyzwerphoto/'. $tenant->photo)}}" alt="" class="avatar img-circle"><span class="status bg-success"></span></div>
          <h4 class="fs-16 text-muted mt-15 mb-5 fw-300">{{$tenant->firstname}} {{$tenant->lastname}}</h4>
 
        </div>
                  <form>
                    <h4>Personal Details</h4>
                    <br/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle"><strong>Designation</strong></label>
                           <p class="form-control-static">{{$tenant->designation}}</p>

                                                 </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="ddlGenge"><strong>Gender</strong></label>
                          <p class="form-control-static">{{$tenant->gender}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>First Name</strong></label>
                     <p class="form-control-static">{{$tenant->firstname}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Last Name</strong></label>
                 <p class="form-control-static">{{$tenant->lastname}}</p>                     
                    </div>
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>Date of birth</strong></label>
                         <p class="form-control-static">{{$tenant->date_of_birth}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Occupation</strong></label>
                        <p class="form-control-static">{{$tenant->occupation}}</p>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>Address</strong></label>
                       <p class="form-control-static">{{$tenant->address}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>State</strong></label>
                      <p class="form-control-static">{{$tenant->state}}</p>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>Email</strong></label>
                       <p class="form-control-static">{{$email->email}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Contact Number</strong></label>
                       <p class="form-control-static">{{$tenant->phone}}</p>
                        </div>
                      </div>
                    </div>
                    
                    <br/>

                    <h4>Next of Kin Details</h4>
                    <br/>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>First Name</strong></label>
                        <p class="form-control-static">{{$nextOfKin->firstname}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Last Name</strong></label>
                          <p class="form-control-static">{{$nextOfKin->lastname}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>Address</strong></label>
                          <p class="form-control-static">{{$nextOfKin->address}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Contact Number</strong></label>
                          <p class="form-control-static">{{$nextOfKin->phone}}</p>
                        </div>
                      </div>
                    </div>
                    <br/>
                      
                   <h4>Guarantors Details</h4>
                    <br/>


                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Designation</strong></label>
                         <p class="form-control-static">{{$guarantor->designation}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Occupation</strong></label>
                    <p class="form-control-static">{{$guarantor->occupation}}</p>
                        </div> 
                    </div>
                  </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>First Name</strong></label>
                          <p class="form-control-static">{{$guarantor->firstname}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Last Name</strong></label>
                          <p class="form-control-static">{{$guarantor->lastname}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector"><strong>Address</strong></label>
                          <p class="form-control-static">{{$guarantor->address}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter"><strong>Contact Number</strong></label>
                          <p class="form-control-static">{{$guarantor->phone}}</p>
                        </div>
                      </div>
                    </div>

                    <br/>
                  </form>
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
@include('partials.foot')