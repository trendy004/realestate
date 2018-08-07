@extends('partials.layouts')
    <!-- Header start-->
@section('content')
    <div class="main-container">
        <aside data-mcs-theme="minimal-dark" style="background-image: (url{{asset('build/images/backgrounds/11.jpg')}})" class="main-sidebar closed mCustomScrollbar">
            <ul class="list-unstyled navigation mb-0">
                <li class="sidebar-header pt-0"></li>
                <li><a href="{{ url('/tenant/profile') }}" class="active bubble"><i class="ti-home"></i> Profile</a></li>
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
                  <h3 class="widget-title">Your Profile</h3>
                </div>
                <div class="widget-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{Session::get('success')}}</p>
                        </div>
                    @endif
                  <div class="user">
          <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
            <img src="{!! url('/xyzwerphoto/' . $photo) !!}" alt=""
                 class="avatar img-circle"><span class="status bg-success"></span></div>
          <h4 class="fs-16 text-muted mt-15 mb-5 fw-300">{{$tenantDetails->firstname}} {{$tenantDetails->lastname}}</h4>
 
        </div>
                  <form data-toggle="validator" method="post" action="{{url('tenant/profile/')}}"
                        enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <h5>Personal Details</h5>
                    <br/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle">Designation</label>
                           <input id="ddlGenge" class="form-control" name="designation" value="$tenantDetails->"
                                  disabled>
                          <div class="help-block with-errors"></div>  

                                                </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="ddlGenge">Gender</label>
                          <select id="ddlGenge" class="form-control" name="gender" disabled>
                            <option value="">Choose a Gender</option>
                            <option value="action">Female</option>
                            <option value="comedy">Male</option>
                            <option value="horror">Others</option>
                          </select>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" name="firstname" disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" name="lastname" disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Date of birth</label>
                          <input id="txtDirector" type="text" class="datepicker form-control" name="dateofbirth"
                                 disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Occupation</label>
                          <input id="txtWriter" type="text" class="form-control" name="occupation" disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" name="address" disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">State</label>
                            <select id="ddlGenge" class="form-control" disabled name="state">
                                <option value="">Choose a state</option>
                                <option value="ABUJA">ABUJA FCT</option>
                                <option value="ABIA">ABIA</option>
                                <option value="ADAMAWA">ADAMAWA</option>
                                <option value="AKWA IBOM">AKWA IBOM</option>
                                <option value="ANAMBRA">ANAMBRA</option>
                                <option value="BAUCHI">BAUCHI</option>
                                <option value="BAYELSA">BAYELSA</option>
                                <option value="BENUE">BENUE</option>
                                <option value="BORNO">BORNO</option>
                                <option value="CROSS RIVER">CROSS RIVER</option>
                                <option value="DELTA">DELTA</option>
                                <option value="EBONYI">EBONYI</option>
                                <option value="EDO">EDO</option>
                                <option value="EKITI">EKITI</option>
                                <option value="ENUGU">ENUGU</option>
                                <option value="GOMBE">GOMBE</option>
                                <option value="IMO">IMO</option>
                                <option value="JIGAWA">JIGAWA</option>
                                <option value="KADUNA">KADUNA</option>
                                <option value="KANO">KANO</option>
                                <option value="KATSINA">KATSINA</option>
                                <option value="KEBBI">KEBBI</option>
                                <option value="KOGI">KOGI</option>
                                <option value="KWARA">KWARA</option>
                                <option value="LAGOS">LAGOS</option>
                                <option value="NASSARAWA">NASSARAWA</option>
                                <option value="NIGER">NIGER</option>
                                <option value="OGUN">OGUN</option>
                                <option value="ONDO">ONDO</option>
                                <option value="OSUN">OSUN</option>
                                <option value="OYO">OYO</option>
                                <option value="PLATEAU">PLATEAU</option>
                                <option value="RIVERS">RIVERS</option>
                                <option value="SOKOTO">SOKOTO</option>
                                <option value="TARABA">TARABA</option>
                                <option value="YOBE">YOBE</option>
                                <option value="ZAMFARA">ZAMFARA</option>

                            </select>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtDirector">Email</label>
                          <input id="txtDirector" type="email" class="form-control" name="email" disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtDirector">Password</label>
                                <input id="txtDirector" type="password" class="form-control" name="password" disabled>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="phone" class="form-control" name="phone" disabled>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="txtDirector">Photograph</label>
                          <input id="fileInput" type="file" data-buttonname="btn-outline btn-primary"
                                 data-iconname="ti-zip" class="filestyle" name="photo" >
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div><br/>
                    <h5>Next of Kin Details</h5> <br/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" name="k_firstname" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" name="k_lastname" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" name="k_address" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="text" class="form-control" name="k_phone" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <br/>
                   <h5>Guarantors Details</h5><br/>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Designation</label>
                         <select id="ddlGenge" class="form-control" name="g_designation" required="">
                            <option value="">Choose a Title</option>
                            <option value="action">Miss</option>
                            <option value="comedy">Mrs</option>
                            <option value="horror">Mr</option>
                          </select>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Occupation</label>
                          <input id="txtWriter" type="text" class="form-control" name="g_occupation" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" name="g_firstname" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" name="g_lastname" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" name="g_address" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="text" class="form-control" name="g_phone" required="">
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
@endsection