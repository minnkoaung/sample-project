<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     @yield('title')
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    @include('layouts.css')
    @yield('css')
</head>
<body>
<div class="wrapper">
@include('layouts.sidebar')
    <div class="main-panel">
       @include('layouts.topnav')
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</div>
</body>
@include('layouts.scripts')
@yield('scripts')
</html>
