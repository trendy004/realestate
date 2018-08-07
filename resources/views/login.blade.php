<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PropertyZone - Login</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/PACE/themes/blue/pace-theme-flash.css')}}">
    <script type="text/javascript" src="{{asset('plugins/PACE/pace.min.js')}}"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/css/first-layout.css')}}">
    <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js')}}/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body  class="body-bg-full">
    <div class="container page-container">
      <div class="page-content">
          @if(Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{Session::get('error')}}</p>
                </div>
            @endif
        <div class="logo"><h2>PropertyZone</h2>
       <h3>Portal Login</h3>
        </div>
        <form method="post" action="{{url('auth/login')}}" class="form-horizontal" data-toggle="validator">

          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <div class="col-xs-12">
              <input type="email" placeholder="Email Address" class="form-control" name="email" required="">
              <div class="help-block with-errors"></div>

            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input type="password" placeholder="Password" class="form-control" name="password" required="">
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              
              <div class="pull-right"><a href="{{url('/reset')}}" class="inline-block form-control-static">Forgot your Password</a></div>
            </div>
          </div>
          <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Log in</button>
        </form>

        <hr>
        <div class="clearfix">
          <p class="text-muted mb-0 pull-left">Do you need to rent an apartment?</p><a href="{{url('/register_tenant')}}" class="inline-block pull-right">Register as a Tenant</a>
        </div>
        <div class="clearfix">
          <p class="text-muted mb-0 pull-left">Don't have an account on propertyZone?</p><a href="{{url('/register')}}" class="inline-block pull-right">Register as an Agent</a>
        </div>
      </div>
    </div>
    
    <!-- jQuery-->
    <script type="text/javascript" src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="{{asset('build/js/first-layout/extra-demo.js')}}"></script>
         <script type="text/javascript" src="{{asset('plugins/validator.js')}}"></script>

  </body>
</html>