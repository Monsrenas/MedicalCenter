

<?php use App\Interrogation; 
	
	if(!isset($_SESSION)){
    session_start();
	}
	$_SESSION['opcion']='bott2';

?>

@if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>
@endif


 @if (isset($patient))
           <?php $identification=$patient->identification;  ?>
 @else         
           <?php                     
            $patient=new Interrogation;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: rgba(128, 255, 0, 0.3); ">
<form  action="{{url('almacena')}}" method="post" style="width: 100%; text-align: center;">
	@csrf 	

	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.Interrogation'>
	<input type="hidden" name="dtt"  value='Interrogation'>

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