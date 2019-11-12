<?php 	
	if(!isset($_SESSION)){ session_start(); }
	if (!($_SESSION['dr_user'])) {return;}
	$user_id=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $stime=substr(date("Y-m-d h:i:s"), 11);
?>

 @if (isset($patient))
           <?php $patient=(isset($patient[0]))? $patient[0]:$patient;
           	$identification=($patient->identification)?$patient->identification:'';
           	$user_id=(isset($patient->user_id))?$patient->user_id : $_SESSION['dr_user']; 	
           ?>
 @else         
           <?php  $identification=($_SESSION['identification'])? $_SESSION['identification']:''?>

@endif

<style type="text/css">
	.form-group textarea { 	-webkit-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							-moz-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							font-size: small;
							background: #AFC4E8;
	}
</style>

<div style="padding: 1%;   align: center;  ">
	
<form  action="javascript:SaveDataNoRefreshView('MyAdmission','store')" method="post" style="width: 100%; text-align: center;" id="MyAdmission">
	@csrf
	<input type="hidden" name="user_id" id="user_id" placeholder="Admission Id" value='{{ $user_id }}'> 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

    <input type="hidden" name="modelo" id="modelo" value="Admission" />
    <input type="hidden" name="url" id="url" value="admission" />
    <input type="hidden" name="_method" value="post">
    
	<div class="form-inline">
	    
	  	<div style="text-align:right; float: left; width: 30%; padding-right: 20px;"><strong>Arrival: </strong></div>

	  	<div style="text-align:left; ">
	  	<input type="date" name="date" id="date" value="<?php echo(isset($patient->date)?$patient->date: $cdate); ?>" />	
	  	<input type="time" name="timearrives" id="timearrives" value="<?php echo(isset($patient->timearrives)?$patient->timearrives:$stime); ?>" /></div>
	</div>


	<div class="form-inline">
		<div style="text-align:right; float: left; width: 30%; padding-right: 20px;"><strong>Hospitalization: </strong></div>
	    <div style="text-align:left; margin-right:  15px;">
	  	<input type="date" name="date_hospitalization" id="date_hospitalization" value="<?php echo(isset($patient->date_hospitalization)?$patient->date_hospitalization:$cdate); ?>" />
	  	<input type="time" name="time_hospitalization" id="time_hospitalization" value="<?php echo(isset($patient->time_hospitalization)?$patient->time_hospitalization:$stime); ?>" />
	  	</div>
	</div>
	
<br>
	<div class="form-group">
	    <strong>Admission Note</strong><br>
	   <textarea rows = "5" cols = "100%" name = "admission_note">
	           <?php  echo (isset($patient->admission_note)?$patient->admission_note:''); ?> 
	    </textarea>
	</div>
	<div class="form-group">
		<strong>Symptom</strong><br>
		<textarea rows = "5" cols = "100%" name = "symptom">
	          <?php  echo (isset($patient->symptom)?$patient->symptom:''); ?> 
	    </textarea>
	</div>
	<div class="form-group">
		<strong>Medical Diagnostic</strong><br>
		<textarea rows = "5" cols = "100%" name = "diagnostic">
	          <?php  echo (isset($patient->diagnostic)?$patient->diagnostic:''); ?> 
	    </textarea>
	</div>

	<div class="form-group">
		<strong>informant or representative:</strong>
		<input type="text" name="informant" id="informant" value="<?php  echo (isset($patient->informant)?$patient->informant:''); ?> " />
	</div>
    <?php include(app_path().'/Includes/SaveButton.html') ?>
</form>
</div>
<script type="text/javascript">
function fijafecha(dia, mes, year){
		var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
		$('#InDate').empty().append(dia+' '+monthNames[mes-1]+' '+year);
	}

fijafecha('{{substr($cdate, 6,2)}}','{{substr($cdate, 4,2)}}','{{substr($cdate, 0,4)}}');
	
	
</script>
