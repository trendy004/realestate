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
          <li><a href="{{ url('/agent/maintenance_list') }}" class="bubble"><i class="ti-folder"></i> Maintenance</a></li>
          <li><a href="{{ url('/agent/debit_list') }}" class="bubble"><i class="ti-blackboard"></i> Debts</a></li>
          <li><a href="{{ url('/agent/assets_report') }}" class="bubble"><i class="ti-bar-chart"></i> Reports</a></li>
          {{--<li><a href="{{ url('/agent/notification_list') }}" class="active bubble"><i--}}
                      {{--class="ti-book"></i>Notification</a></li>--}}
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
            <h4 class="mt-0 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing</h4>
            
          </div>
          
        </div>
        <div class="page-content container-fluid p-0">
          <div class="row row-0 mailbox">
            
            <div class="col-md-12">
              <div class="single-mail">
                <div class="clearfix">
                  <div class="pull-left">
                    <div class="media">
                      <div class="media-left avatar"><img src="{{asset('build/images/users/13.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                      <div style="width:auto" class="media-body">
                        <h6 class="media-heading">Christian Lane</h6>
                        
                      </div>
                    </div>
                  </div>
                  
                </div>
                <h3 class="fw-300">Lorem ipsum dolor sit amet, consectetur adipisicing.</h3>
                <p>
                  Morem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <p>
                  <strong>Prey dick</strong> - jkjkdjk
                </p>

                 <p>
                  <strong>Prey dick</strong> - jkjkdjk
                </p>

                 <p>
                  <strong>Prey dick</strong> - jkjkdjk
                </p>

                 <p>
                  <strong>Prey dick</strong> - jkjkdjk
                </p>

                 <p>
                  <strong>Prey dick</strong> - jkjkdjk
                </p>

                <p>
                  Morem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.
                </p>



                <hr>
                
               
                
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Sidebar start-->
     
     
      <!-- Right Sidebar end-->
    </div>
    <!-- Demo Settings start-->

    <!-- Demo Settings end-->
@include('partials.foot')