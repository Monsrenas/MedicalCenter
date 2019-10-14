

<?php use App\Interrogation; 
	
	if(!isset($_SESSION)){ session_start(); }
	$user=(isset($_SESSION['user']))?$_SESSION['user'] : "";
    $hoy=date("Y-m-d");  $hoy=str_replace("-", "", $hoy);
	
?>

 @if (isset($patient))
           <?php $patient=$patient[0];
           	if($patient->identification) {$identification=$patient->identification;} else {
           	$identification=(isset($_SESSION['identification']))? $_SESSION['identification']:"";}
           	
           	$id=(isset($patient->id))? $patient->id : str_replace(" ", "",$hoy.$identification.$user);
           ?>
 @else         
           <?php                     
            $patient=new Interrogation;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
	@if (isset($_SESSION['identification']))
	           <?php 
	           		$identification=($_SESSION['identification']);  
	           		$id=str_replace(" ", "",$hoy.$identification.$user);
				?>
	@endif


@endif

<style type="text/css">
	.form-group textarea { 	-webkit-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							-moz-box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							box-shadow: 0px 0px 22px -14px rgba(71,92,115,1);
							font-size: small;
							background: #A7D3E0;
	}
</style>
<div style="padding: 1%;   align: center;  ">
<form  action="javascript:SaveDataNoRefreshView('MyInterrogation','store')" method="post" style="width: 100%; text-align: center;" id="MyInterrogation">
	@csrf
	<input type="hidden" name="id"  placeholder="Interrogation Id" value='{{ $id }}'> 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

    <input type="hidden" name="modelo" id="modelo" value="Interrogation" />
    <input type="hidden" name="url" id="url" value="consultation" />
    <input type="hidden" name="_method" value="post">

	<div class="form-group">
	    <strong>Admission note:</strong><br>
	    <textarea rows = "5" cols = "100%" name = "adm">
	           {{$patient->adm}} 
	    </textarea>
	</div>
	<div class="form-group">
	    <strong>Chief complaint (CC):</strong><br>
	   <textarea rows = "5" cols = "100%" name = "cc">
	           {{$patient->cc}} 
	    </textarea>
	</div>
	<div class="form-group">
		<strong>History of the present illness(HPI):</strong><br>
		<textarea rows = "5" cols = "100%" name = "hpi">
	           {{$patient->hpi}} 
	    </textarea>
	    </div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 12px;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>
</form>
</div>
