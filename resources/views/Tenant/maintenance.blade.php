@extends('partials.layouts')
@section('content')
  <div class="main-container">
    <aside data-mcs-theme="minimal-dark" style="background-image: (url{{asset('build/images/backgrounds/11.jpg')}})" class="main-sidebar closed mCustomScrollbar">
      <ul class="list-unstyled navigation mb-0">
        <li class="sidebar-header pt-0"></li>
        <li><a href="{{ url('/tenant/profile') }}" class="bubble"><i class="ti-home"></i> Profile</a></li>
        <li><a href="{{ url('/tenant/rent') }}" class="bubble"><i class="ti-receipt"></i> Rent</a></li>
        <li><a href="{{ url('/tenant/referrals') }}" class="bubble"><i class="ti-layers-alt"></i> Referrals</a></li>
        <li><a href="{{ url('/tenant/maintenance') }}" class="active bubble"><i class="ti-folder"></i> Maintenance</a></li>
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
          <div class="pull-left">
            
            <a href="{{ url('/tenant/maintenance') }}" class="active mb-15 btn btn-raised btn-primary">Maintenance List</a>
            <a href="{{ url('/tenant/addMaintenance') }}" class="mb-15 btn btn-raised btn-primary">Add Maintenance</a>
            
          </div>
          
        </div>
        <div class="page-content container-fluid">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Maintenance List</h3>
            </div>
            <div class="widget-body">
              
              <table id="customer-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Section</th>
                    <th>Fault Description</th>
                    <th>Date reported</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
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
                    <td>{{ $maintenance->building_section }}</td>
                    <td>{{ $maintenance->fault }}</td>
                    <td>{{ $maintenance->reported_date }}</td>
                    <td>{{ $maintenance->m_status }}</td>
                    <td class="text-center">
                      <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-outline btn-primary"><i class="ti-eye"></i></button>

                        <button type="button" class="btn btn-outline btn-success"><i class="ti-pencil"></i></button>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Sidebar start-->
      <!-- Right Sidebar end-->
    </div>
    <!-- Demo Settings start-->
    <!-- Demo Settings end-->
@endsection