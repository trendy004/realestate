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
                <li><a href="{{ url('/agent/tenant_list') }}" class="active bubble"><i class="ti-user"></i>
                        Tenants</a></li>
                <li><a href="{{ url('/agent/tenantProperty_list') }}" class="bubble"><i class="ti-panel"></i> Tenants property Mgt</a></li>
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
            <a href="{{url('agent/tenant_list')}}" class="mb-15 btn btn-raised btn-primary">Tenants List</a>
            <a href="{{url('agent/add_tenant')}}" class="mb-15 btn btn-raised btn-primary">Add Tenant</a>
          </div>
        </div>
        <div class="page-content container-fluid">
           <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Edit Tenant</h3>
                </div>
                <div class="widget-body">
                   @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
            @endif
                  <div class="user">
          <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
            <img src="{{asset('/xyzwerphoto/'. $tenant->photo)}}" alt="" class="avatar img-circle"><span class="status bg-success"></span></div>
          <h4 class="fs-16 text-muted mt-15 mb-5 fw-300">{{$tenant->firstname}} {{$tenant->lastname}}</h4>
 
        </div>
                  <form data-toggle="validator" method="post" action="{{url('/agent/updateTenant/'.$tenant->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h5>Personal Details</h5>
                    <br/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="txtDirector">Status</label>
                           <select id="ddlGenge" class="form-control" name="status">
                            <option  <?php if($email->status == 1){ echo 'selected'; }?> value="1">Active</option>
                            <option <?php if($email->status == 0){ echo 'selected'; }?> value="0">Inactive</option>
                           
                          </select> 
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle">Designation</label>
                        <select id="ddlGenge" class="form-control" required="" name="designation">
                            <option value="">Select an option</option>
                            <option  <?php if($tenant->designation == 'Miss'){ echo 'selected'; }?> value="Miss">Miss</option>
                            <option <?php if($tenant->designation == 'Mrs'){ echo 'selected'; }?> value="Mrs">Mrs</option>
                            <option <?php if($tenant->designation == 'Mr'){ echo 'selected'; }?> value="Mr">Mr</option>
                          </select> 
                          <div class="help-block with-errors"></div>  

                                                </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="ddlGenge">Gender</label>
                          <select id="ddlGenge" class="form-control" required="" name="gender">
                            <option  value="">Choose a gender</option>
                            <option <?php if($tenant->gender == 'Male'){ echo 'selected'; }?> value="Male">Male</option>
                            <option <?php if($tenant->gender == 'Female'){ echo 'selected'; }?> value="Female">Female</option>
                          </select>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="firstname" value="{{$tenant->firstname}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="lastname" value="{{$tenant->lastname}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Date of birth</label>
                          <input id="txtDirector" type="text" class="datepicker form-control" required="
                          " name="dateofbirth" value="{{$tenant->date_of_birth}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Occupation</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="occupation" value="{{$tenant->occupation}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="address" value="{{$tenant->address}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">State</label>
                         <select id="ddlGenge" class="form-control" required="" name="state">
                            <option value="">Choose a state</option>
                            <option <?php if($tenant->state == 'ABUJA FCT'){ echo 'selected'; }?> value="ABUJA">ABUJA FCT</option>
<option <?php if($tenant->state == 'ABIA'){ echo 'selected'; }?> value="ABIA">ABIA</option>
<option <?php if($tenant->state == 'ADAMAWA'){ echo 'selected'; }?> value="ADAMAWA">ADAMAWA</option>
<option <?php if($tenant->state == 'AKWA IBOM'){ echo 'selected'; }?> value="AKWA IBOM">AKWA IBOM</option>
<option <?php if($tenant->state == 'ANAMBRA'){ echo 'selected'; }?> value="ANAMBRA">ANAMBRA</option>
<option <?php if($tenant->state == 'BAUCHI'){ echo 'selected'; }?> value="BAUCHI">BAUCHI</option>
<option <?php if($tenant->state == 'BAYELSA'){ echo 'selected'; }?> value="BAYELSA">BAYELSA</option>
<option <?php if($tenant->state == 'BENUE'){ echo 'selected'; }?> value="BENUE">BENUE</option>
<option <?php if($tenant->state == 'BORNO'){ echo 'selected'; }?> value="BORNO">BORNO</option>
<option <?php if($tenant->state == 'CROSS RIVER'){ echo 'selected'; }?> value="CROSS RIVER">CROSS RIVER</option>
<option <?php if($tenant->state == 'DELTA'){ echo 'selected'; }?> value="DELTA">DELTA</option>
<option <?php if($tenant->state == 'EBONYI'){ echo 'selected'; }?> value="EBONYI">EBONYI</option>
<option <?php if($tenant->state == 'EDO'){ echo 'selected'; }?> value="EDO">EDO</option>
<option <?php if($tenant->state == 'EKITI'){ echo 'selected'; }?> value="EKITI">EKITI</option>
<option <?php if($tenant->state == 'ENUGU'){ echo 'selected'; }?> value="ENUGU">ENUGU</option>
<option <?php if($tenant->state == 'GOMBE'){ echo 'selected'; }?> value="GOMBE">GOMBE</option>
<option <?php if($tenant->state == 'IMO'){ echo 'selected'; }?> value="IMO">IMO</option>
<option <?php if($tenant->state == 'JIGAWA'){ echo 'selected'; }?> value="JIGAWA">JIGAWA</option>
<option <?php if($tenant->state == 'KADUNA'){ echo 'selected'; }?> value="KADUNA">KADUNA</option>
<option <?php if($tenant->state == 'KANO'){ echo 'selected'; }?> value="KANO">KANO</option>
<option <?php if($tenant->state == 'KATSINA'){ echo 'selected'; }?> value="KATSINA">KATSINA</option>
<option <?php if($tenant->state == 'KEBBI'){ echo 'selected'; }?> value="KEBBI">KEBBI</option>
<option <?php if($tenant->state == 'KOGI'){ echo 'selected'; }?> value="KOGI">KOGI</option>
<option <?php if($tenant->state == 'KWARA'){ echo 'selected'; }?> value="KWARA">KWARA</option>
<option <?php if($tenant->state == 'LAGOS'){ echo 'selected'; }?> value="LAGOS">LAGOS</option>
<option <?php if($tenant->state == 'NASSARAWA'){ echo 'selected'; }?> value="NASSARAWA">NASSARAWA</option>
<option <?php if($tenant->state == 'NIGER'){ echo 'selected'; }?> value="NIGER">NIGER</option>
<option <?php if($tenant->state == 'OGUN'){ echo 'selected'; }?> value="OGUN">OGUN</option>
<option <?php if($tenant->state == 'ONDO'){ echo 'selected'; }?> value="ONDO">ONDO</option>
<option <?php if($tenant->state == 'OSUN'){ echo 'selected'; }?> value="OSUN">OSUN</option>
<option <?php if($tenant->state == 'OYO'){ echo 'selected'; }?> value="OYO">OYO</option>
<option <?php if($tenant->state == 'PLATEAU'){ echo 'selected'; }?> value="PLATEAU">PLATEAU</option>
<option <?php if($tenant->state == 'RIVERS'){ echo 'selected'; }?> value="RIVERS">RIVERS</option>
<option <?php if($tenant->state == 'SOKOTO'){ echo 'selected'; }?> value="SOKOTO">SOKOTO</option>
<option <?php if($tenant->state == 'TARABA'){ echo 'selected'; }?> value="TARABA">TARABA</option>
<option <?php if($tenant->state == 'YOBE'){ echo 'selected'; }?> value="YOBE">YOBE</option>
<option <?php if($tenant->state == 'ZAMFARA'){ echo 'selected'; }?> value="ZAMFARA">ZAMFARA</option>
                         
                          </select>
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Email</label>
                          <input id="txtDirector" type="email" class="form-control" required="" name="email" readonly="" value="{{$email->email}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="phone" value="{{$tenant->phone}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                   

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="txtDirector">Photograph</label>
                          <input id="fileInput" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle" name="photo">
                        </div>
                      </div>
                      
                    </div>
                    <br/>

                    <h5>Next of Kin Details</h5>
                    <br/>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="k_firstname" value="{{$nextOfKin->firstname}}">
                           <div class="help-block with-errors"></div>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="k_lastname" value="{{$nextOfKin->lastname}}">

                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="k_address" value="{{$nextOfKin->address}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="k_phone" value="{{$nextOfKin->phone}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <br/>
                      
                   <h5>Guarantors Details</h5>
                    <br/>


                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Designation</label>
                         <select id="ddlGenge" class="form-control" required="" name="g_designation">
                            <option value="">Choose an option</option>
                           <option <?php if($guarantor->designation == 'Miss'){ echo 'selected'; }?> value="Miss">Miss</option>
                            <option <?php if($guarantor->designation == 'Mrs'){ echo 'selected'; }?> value="Mrs">Mrs</option>
                            <option <?php if($guarantor->designation == 'Mr'){ echo 'selected'; }?> value="Mr">Mr</option>
                          </select>
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Occupation</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="g_occupation" value="{{$guarantor->occupation}}">
                           <div class="help-block with-errors"></div>
                        </div> 
                    </div>
                  </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="g_firstname" value="{{$guarantor->firstname}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="g_lastname" value="{{$guarantor->lastname}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="g_address" value="{{$guarantor->address}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="text" class="form-control" required="
                          " name="g_phone" value="{{$guarantor->phone}}">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-outline btn-success pull-right">Submit</button>
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