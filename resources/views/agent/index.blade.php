@include('partials.head')

  <body data-sidebar-color="sidebar-light" class="sidebar-light">
  <!-- Header start-->
    <header>
      @include('partials.topnav')
    </header>
    <!-- Header end-->
    <div class="main-container">
    <!-- Main Sidebar start-->
      <aside data-mcs-theme="minimal-dark" style="background-image: url{{asset('build/images/backgrounds/11.jpg')}}" class="main-sidebar closed mCustomScrollbar">
        <ul class="list-unstyled navigation mb-0">
          <li class="sidebar-header pt-0"></li>
          <li><a href="{{ url('agent') }}" class="active bubble"><i class="ti-home"></i> Dashboard</a></li>
          <li><a href="{{ url('/agent/assets_list') }}" class="bubble"><i class="ti-receipt"></i> Assets</a></li>
          <li><a href="{{ url('/agent/tenant_list') }}" class="bubble"><i class="ti-user"></i> Tenants</a></li>
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
    <h4 class="mt-0 mb-5">Dashboard</h4>

    </div>

    </div>
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Pie Chart</h3>
            </div>
            <div class="widget-body">
              <div id="pie-chart-legend2" class="mb-10"></div>
              <div id="pie-chart2" style="height: 250px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Stacked Bar Chart</h3>
            </div>
            <div class="widget-body">
              <div id="stack-bar-chart-legend" class="mb-10"></div>
              <div id="stack-bar-chart" style="height: 250px"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget">
          <div class="widget-heading">
            <h3 class="widget-title">Stacked Bar Chart</h3>
          </div>
          <div class="widget-body">
            <div id="stack-bar-chart-legend2" class="mb-10"></div>
            <div id="stack-bar-chart2" style="height: 250px"></div>
          </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Pie Chart</h3>
            </div>
            <div class="widget-body">
              <div id="pie-chart-legend2" class="mb-10"></div>
              <div id="pie-chart2" style="height: 250px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget">
            <div class="widget-heading">
          <h3 class="widget-title">Stacked Bar Chart</h3>
          </div>
          <div class="widget-body">
            <div id="stack-bar-chart-legend" class="mb-10"></div>
            <div id="stack-bar-chart" style="height: 250px"></div>
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Stacked Bar Chart</h3>
            </div>
            <div class="widget-body">
              <div id="stack-bar-chart-legend2" class="mb-10"></div>
              <div id="stack-bar-chart2" style="height: 250px"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

<!-- Demo Settings end-->
@include('partials.foot')