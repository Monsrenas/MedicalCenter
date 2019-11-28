<?php
	if(!isset($_SESSION)){ session_start(); }
	if (!($_SESSION['dr_user'])) {return;}
	$user_id=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $stime=substr(date("Y-m-d h:i:s"), 11);
    $username=$_SESSION['username'];
    $edit=true;
?>

 @if (isset($patient))
           <?php $patient=(isset($patient[0]))? $patient[0]:$patient;
           	$identification=($patient->identification)?$patient->identification:'';
           	$user_id=(isset($patient->user_id))?$patient->user_id : $_SESSION['dr_user']; 

           	$DA=(isset($patient->date))?$patient->date: $cdate;
			$TA=(isset($patient->timearrives))?$patient->timearrives:$stime;
			$DH=(isset($patient->date_hospitalization))?$patient->date_hospitalization:$cdate;
	
			$TH=(isset($patient->time_hospitalization))?$patient->time_hospitalization:$stime;
			$AN=(isset($patient->admission_note))?$patient->admission_note:'';

			$PS=(isset($patient->symptom))?$patient->symptom:'';
			$PD=(isset($patient->diagnostic))?$patient->diagnostic:'';
			$PI=(isset($patient->informant))?$patient->informant:'';

			$a_r='<strong>It is detailed that at </strong>'.$TA.'<strong> hours of the day </strong>'.$DA.'<strong> the patient arrives at the hospital  '.(($PI)?'in the company of: ':'').'</strong>'.$PI.'<strong> and detailing that:</strong> <br><br>';
			$a_r=$a_r.$AN;
			$a_r=$a_r.'<br><strong> and presenting the following symptoms:</strong> <br><br>';
			$a_r=$a_r.$PS;
			$a_r=$a_r.'<br><br> <strong>Therefore, the stipulated check was made, after which the doctor concluded:</strong> <br><br>';
			$a_r=$a_r.$PD;
			$a_r=$a_r.'<br><br> <strong>For this reason the income is determined, it was made at:</strong> '.$TH.' <strong>of the day</strong> '.$DH;
           ?>
@endif

@if (!(isset($patient->admission_note)))
           @if (isset($discharge))
	           <?php $discharged=$discharge;
	           		$edit=false;	  
	           		$discharged=(isset($discharged[0]))? $discharged[0]:$discharged;
	           		$identification=($discharged->identification)?$discharged->identification:'';
	           		$user_id=(isset($discharged->user_id))?$discharged->user_id : $_SESSION['dr_user'];

	           		if (isset($discharged->admission_resume)) {
	           													$a_r=$discharged->admission_resume;
	           													echo "<h1>Last Medical release</h1>";
	           		} else { echo "<h1>No existe registro de ingresos o actas medicas para el paciente</h1>"; 
	           				 return;
	           			   }
	           		 
	           		
           		?>
           		@for ($i = 0; $i < 7; $i++)
		            <?php
		            	$admission_resume[$i]=$discharged->admission_resume[$i]; 
		             ?>
				@endfor 		     	
		   @endif 

@endif

<style type="text/css">
	.form-group textarea { 	-webkit-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							-moz-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							font-size: small;
							background: #AFC4E8;
						 }
</style>

<br>
<div style="padding: 1%;   text-align: left;  ">
<form  action="javascript:AltaMedica('{{ $identification }}')" method="post" style="width: 100%; text-align: left;" id="MyDischarge">

	@csrf 
	<input type="hidden" name="user_id" id="user_id" placeholder="Admission Id" value='{{ $user_id }}'> 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

    <input type="hidden" name="modelo" id="modelo" value="Discharge" />
    <input type="hidden" name="url" id="url" value="Admission.discharge" />
    <input type="hidden" name="_method" value="post">  

<strong>Admission Resume:</strong>
<a href="javascript:showModal('<?php echo($a_r); ?>')" class="list-group-item">						
<div style="text-align: justify; font-size: xx-small; max-height: 60px; overflow: auto scroll; background: white; color: black">

	<p><?php echo($a_r); ?></p>
	
</div> 
</a>
<br>
<input type="hidden" name="admission_resume" id="admission_resume" value="{{$a_r}}" />

	<div class="form-inline">
	
	  <label for="date"><strong>Discharge:</strong></label>	
	  <input type="date" name="date" id="date" value="<?php echo(isset($discharged->date)?$discharged->date:$cdate); ?>" />
	  <input type="time" name="time" id="time" value="<?php echo(isset($discharged->time)?$discharged->time:$stime); ?>" />	
	</div>


			
	<br>
	<div class="form-group">
		<label for="discharge_reason"><strong>Discharge Reason:</strong></label>
		   <select name="discharge_reason" id="discharge_reason" required>
           <option value="0">Cured</option>
            <option value="1">improvement</option>
            <option value="2">By will</option>
            <option value="3">Transfer</option>
            <option value="4">Death</option>
            <option value="5">Other reason</option>
        </select>  
	</div>

	<div class="form-group">
	    <strong>Discharge Note</strong><br>
	   <textarea rows = "5" cols = "100%" name = "discharge_resume">
	           <?php  echo (isset($discharged->discharge_resume)?$discharged->discharge_resume:''); ?> 
	    </textarea>
	</div>
	
	<label for="authorizing_doctor"><strong>Authorizing Doctor:</strong></label>
	<input type="text" name="authorizing_doctor" id="authorizing_doctor" value="{{$username}}" style="width: 30%;" >

	<?php 
	if ($edit) {  include(app_path().'/Includes/SaveButton.html');  } ?>

</form>	
</div>
<script type="text/javascript"> 

	function showModal($info) {

	  $('#qwerty').modal('show');
      
      $('#cabecera').html('Admission Resume');
      $('#parr1').html($info);
	}

/* $a='alkjlkj';
	alert($a.blink());
$a=prompt('Entre valor','William')*/</script>