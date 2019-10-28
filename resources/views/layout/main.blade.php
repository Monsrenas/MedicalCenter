
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


    
    <div class="row" id="work" style="margin-top: 135px;">
      <div class="col-2 col-md-2" id="left_wind" style="margin-left: 5px;"></div>
      <div class="col-8 col-md-8" id="center_wind" style="background: #E2E2E2; min-height: 385px; max-height: 385px; margin-right: -16px; text-align: center;  overflow: auto scroll;"></div>
      <div class="col-2 col-md-2" id="right_wind" style="margin-right: 5px; margin-left: 6px; padding-left: 30px;"></div>
    </div>
	
</body>
</html>
<script type="text/javascript">
  $('#center_wind').css("height", screen.height-312);
  $('#center_wind').css("max-height", screen.height-312);                          
</script>