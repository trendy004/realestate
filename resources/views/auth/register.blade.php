<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PropertyZone - Register</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/animo.js')}}/animate-animo.min.css')}}">
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
<!-- Header start-->

<!-- Header end-->
<div class="main-container">
    <!-- Main Sidebar start-->

    <!-- Main Sidebar end-->
    <div class="page-container" style="padding-left:0px;">

        <div class="page-content container-fluid" style="margin: 0 auto;padding-left: 0px;width: 64%;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="widget-heading">

                        </div>
                        <div class="widget-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{Session::get('success')}}</p>
                                </div>
                            @endif
                            <div class="user">
                                <h1 class="widget-title" style="font-size: 37px;">Property Zone</h1>
                                <h4 class="fs-16 text-muted mt-15 mb-5 fw-300" style="font-size: 17px;">Agent Portal Registration</h4>

                            </div>
                            <form data-toggle="validator" action="{{url('/registerAgent')}}" method="post">

                                <br/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtDirector">First Name</label>
                                            <input id="txtDirector" type="text" class="form-control" required="" name="firstname">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtWriter">Last Name</label>
                                            <input id="txtWriter" type="text" class="form-control" required="" name="lastname">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtDirector">Date of birth</label>
                                            <input id="txtDirector" type="text" class="datepicker form-control" required="" name="dateofbirth">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ddlGenge">Gender</label>
                                            <select id="ddlGenge" class="form-control" required="" name="gender">
                                                <option value="">Choose a gender</option>
                                                <option value="female">Female</option>
                                                <option value="male">Male</option>

                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtDirector">Company Name</label>
                                            <input id="txtDirector" type="text" class="form-control" required="" name="companyname">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtWriter">Company Address</label>
                                            <input id="txtWriter" type="text" class="form-control" required="" name="companyaddress">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtDirector">Email</label>
                                            <input id="txtDirector" type="email" class="form-control" required="" name="email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtWriter">Contact Number</label>
                                            <input id="txtWriter" type="text" class="form-control" required="" name="phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtDirector">Password</label>
                                            <input id="password" type="password" class="form-control" required="" data-minlength="5" name="password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtWriter">Retype Password</label>
                                            <input id="txtWriter" type="password" class="form-control" required="" data-match="#password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div><br/>
                                <button type="submit" class="btn btn-success pull-right" style="color: #ffffff;">Submit</button>
                                <br/>
                            </form>
                            <br/>
                            <br/>
                            <div class="clearfix">
                                <p class="text-muted mb-0 pull-left">Already have an account on propertyZone?</p><a href="{{url('/auth/login')}}" class="inline-block pull-right">Login as a tenant or agent</a>
                            </div>
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