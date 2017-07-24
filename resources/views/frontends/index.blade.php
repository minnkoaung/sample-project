<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     @yield('title')
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    @include('frontends.css')
    @yield('css')
</head>
<body>
<div class="wrapper">
 @include('frontends.topnav')
	<div class="container dump_container">
	            @yield('content')
	 </div>
</div>
</body>
@include('frontends.scripts')
@include('Alerts::show')
@yield('scripts')
</html>
