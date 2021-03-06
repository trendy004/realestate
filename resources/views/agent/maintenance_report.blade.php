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
          <li><a href="{{ url('/agent/assets_report') }}" class="active bubble"><i class="ti-bar-chart"></i>
              Reports</a></li>
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
            <a href="{{url('agent/assets_report')}}" class="mb-15 btn btn-raised btn-primary">Assets</a>
            <a href="{{url('agent/payments_report')}}" class="mb-15 btn btn-raised btn-primary">Payments</a>
            <a href="{{url('agent/maintenance_report')}}" class="active mb-15 btn btn-raised btn-primary">Maintenance</a>
            <a href="{{url('agent/legal')}}" class="mb-15 btn btn-raised btn-primary">Legal</a>
          </div>
        </div>
        <div class="page-content container-fluid">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Maintenance</h3>
            </div>
            <div class="widget-body">
              <table id="customer-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Tenant Name</th>
                    <th>Category</th>
                    <th>Date reported</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($maintenances as $maintenance)
                  <tr>
                    <td class="text-center">
                      <div class="checkbox-custom">
                        <input id="product-01" type="checkbox" value="01">
                      <label for="product-01" class="pl-0">&nbsp;</label>
                      </div>
                    </td>
                    <td>{{ $maintenance->designation }} {{ $maintenance->firstname }} {{ $maintenance->lastname }}</td>
                    <td>{{ $maintenance->category }}</td>
                    <td>{{ $maintenance->reported_date }}</td>
                    <td>{{ $maintenance->m_status }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Demo Settings start-->
    
    <!-- Demo Settings end-->
@include('partials.foot')