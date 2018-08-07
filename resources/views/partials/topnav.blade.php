<header>
    <div class="search-bar closed"></div><a href="index.html" class="brand pull-left">
        <h2 style="color: white;">Property<span>zone</span></h2></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>

        <ul class="notification-bar list-inline pull-right">
        <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
        <li class="visible-lg"><a href="javascript:;" role="button" class="header-icon fullscreen-toggle"><i class="ti-fullscreen"></i></a></li>
        <li class="dropdown"><a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i>
           {{--@if(count($notifications) > 0 )--}}
            {{--<span class='badge bg-danger'>{{count($notifications)}}</span>--}}
           {{--@endif--}}

            </a>
        </li>

        <li class="dropdown visible-lg visible-md"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
            <div class="media mt-0">
              <div class="media-right media-middle pl-0">
                <p class="fs-12 mb-0">Hi, {{$agentDetails->firstname}}</p>
              </div>
            </div></a>
          <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
            <li><a href="#"><i class="ti-user mr-5"></i> My Profile</a></li>
            <li><a href="#"><i class="ti-settings mr-5"></i> Account Settings</a></li>
            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="ti-power-off mr-5"></i>
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>

        <li><a href="login.html" role="button" class="header-icon"><i class="ti-power-off"></i></a></li>
        </ul>
</header>