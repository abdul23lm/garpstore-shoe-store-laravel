<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Master Page')</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

	<!-- Stylesheets -->
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('divisima/css/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('divisima/css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('divisima/css/jquery-ui.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('divisima/css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('divisima/css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('divisima/css/style.css')}}"/>
    <!--[if lt IE 9]>
    <script src="{{asset('frontEnd/js/html5shiv.js')}}"></script>
    <script src="{{asset('frontEnd/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" />
</head><!--/head-->

<body>
    @include('frontEnd.layouts.header')
    @section('slider')
        @include('frontEnd.layouts.slider')
    @show
    @yield('content')
    @include('frontEnd.layouts.footer')
    <script src="{{asset('frontEnd/js/jquery.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/price-range.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontEnd/js/main.js')}}"></script>
    <script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script>
    <script src="{{asset('divisima/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('divisima/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('divisima/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('divisima/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('divisima/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('divisima/js/main.js')}}"></script>

<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
</script>
</body>
</html>
