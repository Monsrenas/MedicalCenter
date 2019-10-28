<?php $identification=''; ?>
<?php use App\Familyhistory; 
if(!isset($_SESSION)){
    session_start();
  }
  $_SESSION['opcion']='bott7';
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
            $patient=new Familyhistory;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif
<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #AFC4E8; ">
<form  id="MySurgical" action="javascript:SaveDataNoRefreshView('MySurgical','store')" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.SurgicalHistory'/>
	<input type="hidden" name="modelo"  value='SurgicalHistory'/>
  <input type="hidden" name="_method" value="post"/>

	<textarea rows = "5" cols = "100%" name = "surgical">{{ $patient->surgical }}
    </textarea >
	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 36px;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>
</form>
</dir>