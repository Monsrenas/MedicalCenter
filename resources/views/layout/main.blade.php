
<!DOCTYPE html>

<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" /> 
	<title>Medical Center Management</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>  
@include('layout.menu')


    
    <div class="row" id="work">
      <div class="col-2 col-md-2" id="left_wind"></div>
      <div class="col-10 col-md-10" id="right_wind">@yield('content')</div>
    </div>
	
</body>
</html>
