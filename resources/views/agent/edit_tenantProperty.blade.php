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
            
            <a href="{{ url('agent/tenantProperty_list') }}" class="mb-15 btn btn-raised btn-primary">Tenants Property List</a>
            <a href="{{ url('agent/add_tenantProperty') }}" class="mb-15 btn btn-raised btn-primary">Add Tenant Property</a>
            
          </div>
        
        </div>
        <div class="page-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Edit Tenant Property</h3>
                </div>
                <div class="widget-body">

                  <form method="post" action="{{ url('agent/edit_tenantProperty/'. $tenantProperty->id) }}" data-toggle="validator">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle">Tenant</label>
                         <select id="tenant_id" class="form-control" name="tenant_id" required="">
                            <option value="">{{ $tenantProperty->tenant_id }}</option>
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
                            <option>{{ $tenantProperty->category_id }}</option>
                            @foreach($assets as $asset)
                              <option value="{{ $asset->id }}">{{ $asset->category_id }}</option>
                            @endforeach
                          </select>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Asset Description</label>
                          <select id="description" class="form-control" name="description" required="">
                            <option>{{ $tenantProperty->description }}</option>
                            @foreach($assets as $asset)
                              <option value="{{ $asset->description }}">{{ $asset->description }}</option>
                            @endforeach
                          </select>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtProducer">Location</label>
                          <select id="location" class="form-control" name="address" required="">
                            <option>{{ $tenantProperty->address }}</option>
                            @foreach($assets as $asset)
                              <option value="{{ $asset->address }}">{{ $asset->address }}</option>
                            @endforeach
                          </select> 
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWebsite">Standard price</label>
                          <input id="txtWebsite" type="text" class="form-control" name="price" required="">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Date</label>
                          <input id="txtWriter" type="date" class="datepicker form-control" name="occupation_date"
                                 data-toggle="validator">
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
          $.ajax({
            url: '/agent/select_location_ajax',
            method: "POST",
            data: {description : description, _token: '{{ csrf_token() }}'},
            success: function(res){
              $("#location").html('');

              $("#location").html(res.options);
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