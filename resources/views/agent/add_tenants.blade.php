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
            <a href="{{url('agent/add_tenants')}}" class="active mb-15 btn btn-raised btn-primary">Add Tenants</a>
          </div>
        </div>
        <div class="page-content container-fluid">
           <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Add Tenant</h3>
                </div>
                <div class="widget-body">
                   @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                  <form data-toggle="validator" method="post" action="{{url('/agent/add_tenants')}}"
                        enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h5>Personal Details</h5>
                    <br/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle">Designation</label>
                           <select id="ddlGenge" class="form-control" required="" name="designation">
                            <option value="">Select an option</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Mr">Mr</option>
                          </select> 
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="ddlGenge">Gender</label>
                          <select id="ddlGenge" class="form-control" required="" name="gender">
                            <option value="">Choose a gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="firstname">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="lastname">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Date of birth</label>
                          <input id="txtDirector" type="date" class="datepicker form-control" required name="dateofbirth">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Occupation</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="occupation">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Address</label>
                          <input id="txtDirector" type="text" class="form-control" required="" name="address">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">State</label>
                         <select id="ddlGenge" class="form-control" required="" name="state">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Email</label>
                          <input id="txtDirector" type="email" class="form-control" required="" name="email">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Contact Number</label>
                          <input id="txtWriter" type="text" class="form-control" required="" name="phone">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Password</label>
                          <input id="password" type="password" class="form-control" required="" data-minlength="5" name="password">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Retype Password</label>
                          <input id="txtWriter" type="password" class="form-control" required="" data-match="#password">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="txtDirector">Photograph</label>
                          <input id="fileInput" type="file" data-buttonname="btn-outline btn-primary"
                                 data-iconname="ti-zip" class="filestyle" name="photo" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <br/>
                      <div>
                          <h4>Apartment session</h4>
                          <div class="row">
                              <div class="col-md-offset-3 col-md-6">
                                  <div class="form-group">
                                      <label for="category_id">Apartment Category</label>
                                      <select id="category_id" class="form-control" name="asset_id" required>
                                          <option value="">Choose a Property</option>
                                          @foreach($categories as $category)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endforeach
                                      </select>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="form-group">
                                      <label for="description">Apartment Type</label>
                                      <select id="description" class="form-control" name="asset_description" required>
                                          <option value=""></option>
                                      </select>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              <div class="col-md-offset-1 col-md-6">
                                  <div class="form-group">
                                      <label for="txtWriter">Location</label>
                                      <select id="address" class="form-control" name="asset_address" required>
                                          <option  value="" disabled>Choose an Address</option>
                                          <option value=""></option>
                                      </select>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="form-group">
                                      <label for="txtDirector">Annual Rent Value</label>
                                      <select id="price" class="form-control" name="price" required="">
                                          <option value=""></option>
                                      </select>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              <div class="col-md-offset-1 col-md-6">
                                  <div class="form-group">
                                      <label for="txtWriter">Referrral Code</label>
                                      <input id="referral_code" type="text" class="form-control" name="referral_code" required>
                                      <div class="help-block with-errors"></div>
                                  </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#category_id").change(function(event) {
                var id = $(this).val();
                $.ajax({
                    url: '/agent/select_category_ajax',
                    method: "POST",
                    data: {category_id : id, _token: '{{ csrf_token() }}'},
                    success: function(res){
                        $("#description").html('');

                        $("#description").html(res.options);
                    }
                });
            });
            $("#description").change(function(event) {
                var description = $(this).val();
                var myarr = description.split(":");
                var realDesc = myarr[1];
                $.ajax({
                    url: '/agent/select_location_ajax',
                    method: "POST",
                    data: {description : realDesc, _token: '{{ csrf_token() }}'},
                    success: function(res){
                        $("#address").html('');

                        $("#address").html(res.options);
                    }
                });
            });

            $("#address").change(function(event) {
                var address = $(this).val();
                $.ajax({
                    url: '/select_price_ajax',
                    method: "POST",
                    data: {address : address, _token: '{{ csrf_token() }}'},
                    success: function(res){
                        $("#price").html('');

                        $("#price").html(res.input);
                    }
                });
            });
        });

        $( ".target" ).change(function() {
            alert( "Handler for .change() called." );
        });
    </script>
    <!-- Demo Settings end-->
@include('partials.foot')