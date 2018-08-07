@extends('layouts.app')

@section('content')
    <div class="container page-container" style="padding: 250px">
        <div class="page-content" style="margin: 100px; margin-top: 0px">
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
@endsection
