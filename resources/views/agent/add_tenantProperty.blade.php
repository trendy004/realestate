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
          <li><a href="{{ url('/agent/tenantProperty_list') }}" class="active bubble"><i class="ti-panel"></i> Tenants property Mgt</a></li>
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
            <a href="{{ url('agent/tenantProperty_list') }}" class="mb-15 btn btn-raised btn-primary">Tenants Property List</a>
            <a href="{{ url('agent/add_tenantProperty') }}" class="active mb-15 btn btn-raised btn-primary">Add Tenant
              Property</a>
          </div>
        </div>
        <div class="page-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Add Tenant Property</h3>
                </div>
                <div class="widget-body">
                  @if(Session::has('warning'))
                    <div class="alert alert-warning">
                      <p>{{Session::get('warning')}}</p>
                    </div>
                  @endif
                  @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                      <p>{{$error}}</p>
                    </div>
                    @endforeach
                  @endif
                  <form method="post" action="{{ url('agent/add_tenantProperty') }}" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle">Tenant</label>
                         <select id="tenant_id" class="form-control" name="tenant_id" required="">
                           @foreach($tenants as $tenant)
                            <option value="{{ $tenant->id }}">
                              {{ $tenant->designation }} {{ $tenant->firstname }} {{ $tenant->lastname }}
                            </option>
                           @endforeach
                          </select>
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="ddlGenge">Asset Category</label>
                          <select id="category_id" class="form-control" name="asset_id" required="">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Asset description</label>
                          <select id="description" class="form-control" name="description" required="">
                            <option value=""></option>
                          </select>
                        <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtProducer">Location</label>
                          <select id="address" class="form-control" name="address" required="">
                            <option value="" disabled>Choose an Address</option>
                            <option value=""></option>
                          </select>
                        <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWebsite">Standard price</label>
                          <select id="price" class="form-control" name="price" required="">
                            <option value=""></option>
                          </select>
                        <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Date</label>
                          <input id="txtWriter" type="date" class="datepicker form-control" name="occupation_date" required="">
                        <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-outline btn-primary pull-right">Submit</button>
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