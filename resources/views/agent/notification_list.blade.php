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
            <h4 class="mt-0 mb-5">Notifications</h4>
            
          </div>
         
        </div>
        <div class="page-content container-fluid p-0">
          <div class="row row-0 mailbox">
            <div class="col-md-12">
              <table id="customer-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                <thead>
                <tr>
                  <th class="text-center">
                    No
                  </th>
                  <th>Tenant Name</th>
                  <th>Message Type</th>
                  <th>Message</th>
                  <th>Date Sent</th>
                </tr>
                </thead>
                <tbody>

                  <tr>
                    <td class="text-center">
                      {{--{{$key + 1}}--}}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              {{--<ul class="media-list inbox">--}}
                {{----}}
                {{--<li class="media">--}}
                  {{--<div class="checkbox-custom pull-left">--}}
                    {{--<input id="mailboxCheckbox1" type="checkbox" value="value1">--}}
                    {{--<label for="mailboxCheckbox1"></label>--}}
                  {{--</div><a href="javascript:;">--}}
                    {{--<div class="media-left avatar"><img src="{{asset('build/images/users/02.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>--}}
                    {{--<div class="media-body">--}}
                      {{--<h6 class="media-heading">Mark Barnett</h6>--}}
                      {{--<h5 class="title">Posuere convallis sociis nisi euismod</h5>--}}
                      {{--<p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices...</p>--}}
                    {{--</div>--}}
                    {{--<div class="media-right text-nowrap">--}}
                      {{--<time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>--}}
                    {{--</div></a>--}}
                {{--</li>--}}
                {{--<li class="media">--}}
                  {{--<div class="checkbox-custom pull-left">--}}
                    {{--<input id="mailboxCheckbox2" type="checkbox" value="value2">--}}
                    {{--<label for="mailboxCheckbox2"></label>--}}
                  {{--</div><a href="javascript:;">--}}
                    {{--<div class="media-left avatar"><img src="{{asset('build/images/users/11.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>--}}
                    {{--<div class="media-body">--}}
                      {{--<h6 class="media-heading">Alexander Gilbert</h6>--}}
                      {{--<h5 class="title">Posuere convallis sociis nisi euismod</h5>--}}
                      {{--<p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices...</p>--}}
                    {{--</div>--}}
                    {{--<div class="media-right text-nowrap">--}}
                      {{--<time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>--}}
                    {{--</div></a>--}}
                {{--</li>--}}
                {{--<li class="media">--}}
                  {{--<div class="checkbox-custom pull-left">--}}
                    {{--<input id="mailboxCheckbox3" type="checkbox" value="value3">--}}
                    {{--<label for="mailboxCheckbox3"></label>--}}
                  {{--</div><a href="javascript:;">--}}
                    {{--<div class="media-left avatar"><img src="{{asset('build/images/users/12.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>--}}
                    {{--<div class="media-body">--}}
                      {{--<h6 class="media-heading">Amanda Collins</h6>--}}
                      {{--<h5 class="title">Posuere convallis sociis nisi euismod</h5>--}}
                      {{--<p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices...</p>--}}
                    {{--</div>--}}
                    {{--<div class="media-right text-nowrap">--}}
                      {{--<time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>--}}
                    {{--</div></a>--}}
                {{--</li>--}}
                {{--<li class="media">--}}
                  {{--<div class="checkbox-custom pull-left">--}}
                    {{--<input id="mailboxCheckbox4" type="checkbox" value="value4">--}}
                    {{--<label for="mailboxCheckbox4"></label>--}}
                  {{--</div><a href="javascript:;">--}}
                    {{--<div class="media-left avatar"><img src="{{asset('build/images/users/13.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>--}}
                    {{--<div class="media-body">--}}
                      {{--<h6 class="media-heading">Christian Lane</h6>--}}
                      {{--<h5 class="title">Posuere convallis sociis nisi euismod</h5>--}}
                      {{--<p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices...</p>--}}
                    {{--</div>--}}
                    {{--<div class="media-right text-nowrap">--}}
                      {{--<time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>--}}
                    {{--</div></a>--}}
                {{--</li>--}}
                {{--<li class="media">--}}
                  {{--<div class="checkbox-custom pull-left">--}}
                    {{--<input id="mailboxCheckbox5" type="checkbox" value="value5">--}}
                    {{--<label for="mailboxCheckbox5"></label>--}}
                  {{--</div><a href="javascript:;">--}}
                    {{--<div class="media-left avatar"><img src="{{asset('build/images/users/01.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>--}}
                    {{--<div class="media-body">--}}
                      {{--<h6 class="media-heading">Edward Garcia</h6>--}}
                      {{--<h5 class="title">Posuere convallis sociis nisi euismod</h5>--}}
                      {{--<p class="summary">Arcu sed in tortor non convallis laoreet commodo ullamcorper ultrices...</p>--}}
                    {{--</div>--}}
                    {{--<div class="media-right text-nowrap">--}}
                      {{--<time datetime="2015-12-10T20:35:35+07:00" class="fs-11">Yesterday</time>--}}
                    {{--</div></a>--}}
                {{--</li>--}}
              {{--</ul>--}}
            </div>
           
          </div>
        </div>
      </div>
      <!-- Right Sidebar start-->

      <!-- Right Sidebar end-->
    </div>
    <!-- Demo Settings start-->
   
    <!-- Demo Settings end-->
 @include('partials.head')