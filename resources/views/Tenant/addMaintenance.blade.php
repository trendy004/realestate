@extends('partials.layouts')
    <!-- Header end-->
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
            <a href="{{ url('/tenant/maintenance') }}" class="mb-15 btn btn-raised btn-primary">Maintenance List</a>
            <a href="{{ url('/tenant/addMaintenance') }}" class="active mb-15 btn btn-raised btn-primary">Add Maintenance</a>
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
                  <form data-toggle="validator" method="post" action="{{ url('/tenant/addMaintenance') }}">
                      {{ csrf_field() }}
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
                          <input id="txtWebsite" type="text" class="datepicker form-control" name="reported_date" required="">
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
    <!-- Demo Settings end-->
  @endsection