<!DOCTYPE html>
<html>
<head>
	<title>{{$gnl->title}}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="{{ asset('assets/front/js/jquery-1.12.4.min.js') }}"></script>
    <link href="{{ asset('assets/images/logo/icon.png') }}" rel="shortcut icon" type="image/x-icon" />
	 <!-- 'Open Sans' Google Fonts (Primary) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- 'FontAwesome' Icon -->
    <link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <!-- Color Controller -->
  
    <link href="{{ asset('assets/front/css/color.php?color=') }}{{$gnl->color}}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body class="color-1" id="login-page">
@include('layouts.apheader')
@include('layouts.message')
@yield('content')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/front/js/script.js') }}"></script>
</body>
</html>