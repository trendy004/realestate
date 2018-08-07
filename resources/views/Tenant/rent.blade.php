@extends('partials.layouts')
@section('content')
    <div class="main-container">
      <aside data-mcs-theme="minimal-dark" style="background-image: (url{{asset('build/images/backgrounds/11.jpg')}})" class="main-sidebar closed mCustomScrollbar">
        <ul class="list-unstyled navigation mb-0">
          <li class="sidebar-header pt-0"></li>
          <li><a href="{{ url('/tenant/profile') }}" class="bubble"><i class="ti-home"></i> Profile</a></li>
          <li><a href="{{ url('/tenant/rent') }}" class="active bubble"><i class="ti-receipt"></i> Rent</a></li>
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
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Rent records</h3>
            </div>
            <div class="widget-body">
              <table id="customer-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Rent From</th>
                    <th>Rent To</th>
                    <th>Rent fee</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($rents as $rent)
                  <tr>
                    <td class="text-center">
                      <div class="checkbox-custom">
                        <input id="product-01" type="checkbox" value="01">
                        <label for="product-01" class="pl-0">&nbsp;</label>
                      </div>
                    </td>
                    <td>{{ $rent->due_date }}</td>
                    <td>{{ $rent->payment_date }}</td>
                    <td>{{ $rent->amount }}</td>
                    <td class="text-center"><a href="{{ url('/tenant/payment') }}" type="button" class="btn btn-info btn-primary
                    btn-sm">Update</a></td>
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
@endsection