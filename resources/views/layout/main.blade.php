
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


    
    <div class="row" id="work" style="margin-top: 120px;">
      @include('modal')
      <div class="col-2 col-md-2" id="left_wind" style="margin-left: 5px;"></div>
      <div class="col-10 col-md-10" id="center_wind" style="background: #E2E2E2; min-height: 385px; max-height: 385px; margin-right: -16px; text-align: center;  overflow: auto scroll;"> 
        <div class="contenidoCentro" style="text-align: justify; margin: 50px;">
          <p>Welcome to the <strong>MEDICAL CENTER</strong> clinical information management application</p> <br>
          <p> All operations to be performed are registered associated with a patient.</p>
          <p>It is necessary to activate the patient with whom you will perform the desired action. To do this, perform the following actions:</p> <br>
          <ul>- Click on the <span class="btn btn-default">Patient</span>  option</ul>
          <ul>- Click on the <span class="btn btn-primary"> List </span> button</ul>
          <ul>- Enter the search occurrence or leave it blank to see the entire list.</ul>
          <ul>- Click on the <span class="btn btn-default glyphicon glyphicon-search"> Patient</span> search button</ul>
          <ul>- Select the patient by clicking on the name.</ul> <br>

          <p>Any activity that shows a <span class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</span>  button must be saved by the user, otherwise, the information will be lost when you close the section.</p>
        </div>
      </div>
      <!--<div class="col-2 col-md-2" id="right_wind" style="margin-right: 5px; margin-left: 6px; padding-left: 30px;"></div> -->
    </div>
	
</body>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Note</button>-->

<div id="qwerty" class="modal fade bd-example-modal-lg" tabindex="10" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="cabecera"></h4>
      </div>
     <div style="padding: 2em;">
        <p id="parr1" style="text-align: justify;"> </p>
        <p id="parr2" style="text-align: justify;"> </p>
        <p id="parr3" style="text-align: justify;"> </p>
        <p id="parr4" style="text-align: justify;"> </p>

        <strong>Medication</strong>
        <p id="parr5" style="text-align: justify;"> </p>

     </div>
    </div>
  </div>
</div>

</html>
<script type="text/javascript">
  $('#center_wind').css("height", screen.height-312);
  $('#center_wind').css("max-height", screen.height-312); 
  $('.botonOp').click(function(){$('#qwerty').modal('show');});                         
</script>