<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/skin-black.css">
    <link rel="stylesheet" href="/css/stylesheets/style.css">
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700,500,900' rel='stylesheet' type='text/css'>

</head>
<body class="hold-transition skin-black sidebar-mini">

	@include('header')

<div class="content-wrapper">
	@include('navigation')
	    <div class="container-fluid">

				@yield('content')
			
	    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>

    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/js/daterangepicker.js"></script>

@yield('script')


</body>
</html>