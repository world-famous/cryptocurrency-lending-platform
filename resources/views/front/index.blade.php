<!DOCTYPE html>
<html>
<head>
	<title>{{$gnl->title}}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="{{ asset('assets/front/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.countdown.js') }}"></script>
    <link href="{{ asset('assets/images/logo/icon.png') }}" rel="shortcut icon" type="image/x-icon" />
	 <!-- 'Open Sans' Google Fonts (Primary) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- 'FontAwesome' Icon -->
    <link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/front/owlcarousel/assets/owl.carousel.min.css') }}">
    <!-- WOW JS CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <!-- Color Controller -->
  
    <link href="{{ asset('assets/front/css/color.php?color=') }}{{$gnl->color}}" rel="stylesheet">

</head>
<body class="color-1">
@include('front.header')
@include('front.double')
@include('front.about')
@include('front.service')
@include('front.story')
@include('front.counter')
@include('front.stat')
@include('front.testm')
@include('front.pmethod')
@include('front.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets/front/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- WOW JS -->
    <script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
    <!-- Way Points JS -->
    <script src="{{ asset('assets/front/js/waypoints.min.js') }}"></script>
    <!-- Counter JS -->
    <script src="{{ asset('assets/front/js/jquery.counterup.min.js') }}"></script>
    <!-- Slider JS -->
    <script src="{{ asset('assets/front/js/jquery-ui-slider.min.js') }}"></script>
    <!-- Arctext JS -->
    <script src="{{ asset('assets/front/js/jquery.arctext.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/front/js/script.js') }}"></script>
</body>
</html>