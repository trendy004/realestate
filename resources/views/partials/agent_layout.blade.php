{{--Head Starts--}}
@include('partials.head')
{{--Head ends--}}
{{--Top Navigation Starts--}}
@include('partials.topnav')
{{--Top Navigation Ends--}}
{{--Side Navigation Starts--}}
@include('partials.sidenav')
{{--Side Navigation Ends--}}
{{--Section Starts--}}
@yield('page')
{{--Section Ends--}}
{{--Foot Starts--}}
@include('partials.foot')
{{--Foot Ends--}}