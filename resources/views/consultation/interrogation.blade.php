<?php 	
	if(!isset($_SESSION)){ session_start(); }
	$user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=date("Ymd");

?>

 @if (isset($patient))
           <?php $patient=(isset($patient[0]))? $patient[0]:$patient;
           	if(isset($patient->identification)) {$identification=$patient->identification;} else {
           	$identification=(isset($_SESSION['identification']))? $_SESSION['identification']:"";}
         
           	$id=(isset($patient->id))? $patient->id : str_replace(" ", "",$hoy.$identification.$user);

           ?>
 @else         
           <?php  if (!isset($identification)) {$identification="";} ?>  
		   
		   @if (!(isset($_SESSION['identification'])))    <?php return; ?>@endif
		   
		   <?php $identification=($_SESSION['identification']);  
	           	 $id=str_replace(" ", "",$hoy.$identification.$user);
			?>
@endif

<style type="text/css">
	.MyFormGroup textarea { 	-webkit-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							-moz-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							font-size: small;
							background: #AFC4E8;
	}
</style>

<div style="padding: 1%;   align: center;  ">
	
<form  action="javascript:SaveDataNoRefreshView('MyInterrogation','IDstore')" method="post" style="width: 100%; text-align: center;" id="MyInterrogation">
	@csrf
	<input type="hidden" name="id" id="id" placeholder="Interrogation Id" value='{{ $id }}'>
	<input type="hidden" name="cdate" id="cdate" placeholder="Interrogation Id" value='{{ $cdate }}'> 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

    <input type="hidden" name="modelo" id="modelo" value="Interrogation" />
    <input type="hidden" name="url" id="url" value="consultation" />
    <input type="hidden" name="_method" value="post">

	<div class="form-group MyFormGroup">
	    <strong>Chief complaint (CC):</strong><br>
	   <textarea id="wysihtml5-textarea" rows = "5" cols = "100%" name = "cc">
	           <?php  echo (isset($patient->cc)?$patient->cc:''); ?> 
	    </textarea>
	</div>
	<div class="form-group MyFormGroup">
		<strong>History of the present illness(HPI):</strong><br>
		<textarea rows = "5" cols = "100%" name = "hpi">
	          <?php  echo (isset($patient->hpi)?$patient->hpi:''); ?> 
	    </textarea>
	    </div>
	@include('funciones')    
    
    <?php SaveButton('MiBoton');
    	  $created=(isset($patient->created_at)?substr($patient->created_at, 0,11):date('Y-m-d'))
   	 ?>
</form>



</div>

<script type="text/javascript">
	var $ntgdd=('<?php echo( Antiguedad($created) ); ?>');
	if ($ntgdd<3) {activaBoton('MiBoton','MyInterrogation');}
	fijafecha('{{substr($id, 6,2)}}','{{substr($id, 4,2)}}','{{substr($id, 0,4)}}','InDate');
</script>