<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/stylesheets/style.css">
<!--     <link rel="stylesheet" href="/css/AdminLTE.css">
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->


</head>
<body>
<div id="topwrapper">
	<img src="/images/logo.png" alt="logo">
	<h2>Restaurant naam</h2>
</div>

<div id="wrapper">
	@include('navigation')
	    <div class="container-fluid">
	    	@if ( count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			@yield('content')
			
	    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>


@yield('script')

</body>
</html>