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
                <li><a href="{{ url('/agent/tenantProperty_list') }}" class="bubble"><i class="ti-panel"></i> Tenants property Mgt</a></li>
                <li><a href="{{ url('/agent/maintenance_list') }}" class="active bubble"><i class="ti-folder"></i>
                        Maintenance</a></li>
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
            <a href="{{ url('agent/maintenance_list') }}" class="mb-15 btn btn-raised btn-primary">Maintenance List</a>
            <a href="{{ url('agent/add_maintenance') }}" class="active mb-15 btn btn-raised btn-primary">Add
                Maintenance</a>
          </div>
        </div>
        <div class="page-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Add Manitenance</h3>
                </div>
                <div class="widget-body">
                  <form method="post" action="{{ url('agent/add_maintenance') }}" data-toggle="validator">
                      {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtMovieTitle">Tenant</label>
                          <select id="tenant_id" class="form-control" name="tenants_id" required="">
                             @foreach($tenants as $tenant)
                                  <option value="{{ $tenant->id }}">{{ $tenant->designation}} {{ $tenant->firstname }} {{$tenant->lastname }}</option>
                             @endforeach
                          </select>
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="asset">Asset Category</label>
                            <select id="category" type="text" class="form-control" name="category" required="">
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtProducer">Building Section</label>
                            <select type="text" class="form-control" name="building_section" required="">
                                @foreach($buildingSections as $section)
                                    <option >{{ $section->section }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtProducer">Reported Date</label>
                          <input id="txtWebsite" type="date" class="datepicker form-control" name="reported_date"
                                 required="">
                           <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWebsite">Fault description</label>
                            <textarea id="txtReview" rows="5" class="form-control" name="fault" required=""></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWebsite">Status</label>
                         <select id="ddlGenge" class="form-control" name="m_status" required="">
                            <option value="">Choose a genre</option>
                            <option value="Fixed">Fixed</option>
                            <option value="Unfixed">Unfixed</option>
                          </select>  
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
            $("#tenant_id").change(function(event) {
                var id = $(this).val();
                $.ajax({
                    url: '/agent/select_asset_ajax',
                    method: "POST",
                    data: {tenant_id : id, _token: '{{ csrf_token() }}'},
                    success: function(res){
                        $("#category").html('');

                        $("#category").html(res.options);
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