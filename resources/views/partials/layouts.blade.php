<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PropertyZone - Tenant</title>
        <!-- PACE-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/PACE/themes/blue/pace-theme-flash.css')}}">
        <script type="text/javascript" src="{{asset('plugins/PACE/pace.min.js')}}"></script>
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
        <!-- Malihu Scrollbar-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}">
        <!-- Animo.js')}}-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/animo.js/animate-animo.min.css')}}">
        <!-- Bootstrap Progressbar-->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
        <!-- Primary Style-->
        <link rel="stylesheet" type="text/css" href="{{asset('build/css/first-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('build/css/bootstrap-datepicker.css')}}">

        <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries-->
        <!-- WARNING: Respond.js')}} doesn't work if you view the page via file://-->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js')}}/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body data-sidebar-color="sidebar-light" class="sidebar-light">
        <header>

            <a href="index.html" class="brand pull-left">
                <h2 style="color: white;">Property<span>zone</span></h2></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>

            <ul class="notification-bar list-inline pull-right">
                <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
                <li class="visible-lg"><a href="javascript:;" role="button" class="header-icon fullscreen-toggle"><i class="ti-fullscreen"></i></a></li>
                <li class="dropdown"><a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i><span class="badge bg-danger">6</span></a>
                    <div aria-labelledby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
                        <h5 class="dropdown-header">You have 6 notifications</h5>
                        <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
                            <li class="media"><a href="javascript:;">
                                    <div class="media-left avatar"><img src="{{asset('build/images/users/17.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">William Carlson</h6>
                                        <p class="text-muted mb-0">Commented on your post</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">5 mins</time>
                                    </div></a></li>
                            <li class="media"><a href="javascript:;">
                                    <div class="media-left avatar"><img src="{{asset('build/images/users/19.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Barbara Ortega</h6>
                                        <p class="text-muted mb-0">Sent you a new email</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">8 mins</time>
                                    </div></a></li>
                            <li class="media"><a href="javascript:;">
                                    <div class="media-left avatar"><img src="{{asset('build/images/users/02.jpg')}}" alt="" class="media-object
                          img-circle"><span class="status bg-success"></span></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Mark Barnett</h6>
                                        <p class="text-muted mb-0">Sent you a new message</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>
                                    </div></a></li>
                            <li class="media"><a href="javascript:;">
                                    <div class="media-left avatar"><img src="{{asset('build/images/users/11.jpg')}}'" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Alexander Gilbert</h6>
                                        <p class="text-muted mb-0">Sent you a new email</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>
                                    </div></a></li>
                            <li class="media"><a href="javascript:;">
                                    <div class="media-left avatar"><img src="{{asset('build/images/users/12.jpg')}}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Amanda Collins</h6>
                                        <p class="text-muted mb-0">You have 8 unread messages</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>
                                    </div></a></li>
                            <li class="media"><a href="javascript:;">
                                    <div class="media-left avatar"><img src="{{asset('build/images/users/13.jpg')}}'" alt=""
                                                                        class="media-object img-circle"><span class="status bg-warning"></span></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Christian Lane</h6>
                                        <p class="text-muted mb-0">Commented on your post</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>
                                    </div></a></li>
                        </ul>
                        <div class="dropdown-footer text-center p-10"><a href="javascript:;" class="fw-500 text-muted">See all notifications</a></div>
                    </div>
                </li>
                <li class="dropdown visible-lg visible-md"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
                        <div class="media mt-0">
                            <div class="media-left avatar"><img src="{!! url('/xyzwerphoto/' . $photo) !!}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                            <div class="media-right media-middle pl-0">
                                <p class="fs-12 mb-0">Hi, {{$tenantDetails->firstname}}</p>
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
            </ul>
        </header>
        <!-- Header end-->

            <!-- Main Sidebar start-->
            @yield('content')
        <!-- jQuery-->
        <script type="text/javascript" src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap JavaScript-->
        <script type="text/javascript" src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- Malihu Scrollbar-->
        <script type="text/javascript" src="{{asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <!-- Animo.js')}}-->
        <script type="text/javascript" src="{{asset('plugins/animo.js')}}/animo.min.js')}}"></script>
        <!-- Bootstrap Progressbar-->
        <script type="text/javascript" src="{{asset('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- jQuery Easy Pie Chart-->
        <script type="text/javascript" src="{{asset('plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
        <!-- MomentJS-->
        <script type="text/javascript" src="{{asset('plugins/moment/min/moment.min.js')}}"></script>
        <!-- jQuery Validation-->
        <script type="text/javascript" src="{{asset('plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('plugins/jquery-validation/dist/additional-methods.min.js')}}"></script>
        <!-- Bootstrap FileStyle-->
        <script type="text/javascript" src="{{asset('plugins/bootstrap-filestyle/src/bootstrap-filestyle.js')}}"></script>
        <!-- Custom JS-->
        <script type="text/javascript" src="{{asset('build/js/first-layout/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/first-layout/demo.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/page-content/forms/jquery-validation.js')}}"></script>
        <script type="text/javascript" src="{{asset('build/js/page-content/pickers/bootstrap-datepicker.js')}}"></script>

        <script type="text/javascript" src="{{asset('plugins/validator.js')}}"></script>
        <script type="text/javascript">
            $('.datepicker').datepicker();
        </script>

    </body>
</html>