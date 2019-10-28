<?php use App\Familyhistory; 
if(!isset($_SESSION)){session_start();} 
$identification='';
?>


@if (isset($patient))
           <?php $identification=$patient->identification;  
           ?>
@endif


@if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>
@endif


<?php 
	$family=["Father","Mother","Siblings","Children"];
 ?>

<style type="text/css">
	table {	font-size: small;
  			 
  			background: #AFC4E8; 
  			 
  			width: 100%;
		  }

	table, th, td {	  text-align: center;
					  padding-bottom: 6px;
				  }
</style>


<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #5E77A5;  opacity:1;">
<form  id="MyFamilyHistory" action="javascript:SaveDataNoRefreshView('MyFamilyHistory','store')" method="post">
@csrf 	

<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
<input type="hidden" name="url"  value='history.FamilyHistory'>
<input type="hidden" name="modelo"  value='Familyhistory'>
 <input type="hidden" name="_method" value="post"/>

<div class="form-group">
	<table id="medications">
		<tr>
			<td colspan="3">IF LIVING</td>
			<td colspan="2">IF DECEASED</td>
		</tr>
		<tr>
			<td colspan="2">
	         	<strong>Age (s)</strong>
	         </td>
	         <td>
	         	<strong>Health & Psychiatric</strong>
	         </td>
	         <td>
	         	<strong>Age(s) at death</strong>
	         </td>
				 <td>
	         	<strong>Cause</strong>
	         </td>		     
	     </tr>


	     @for ($i = 0; $i<4; $i++)
			<tr><td style="padding: 5px;">{{$family[$i]}}</td>
				<td><input type='text' class='form-control' name='livingage[]'  value="<?php  echo  (isset($patient->livingage[$i])?$patient->livingage[$i]:''); ?>" maxlength='10' size='10'onkeypress="return soloNumeros(event);"></td>
				<td><input type='text' class='form-control' name='health[]'  value='<?php  echo (isset($patient->health[$i])?$patient->health[$i]:''); ?>' maxlength='50' size='50'></td>
				<td><input type='text' class='form-control' name='deceasedage[]'  value="<?php echo (isset($patient->deceasedage[$i])?$patient->deceasedage[$i]:''); ?>" maxlength='10' size='10' onkeypress="return soloNumeros(event);"></td>
				<td><input type='text' class='form-control' name='cause[]'  value='<?php  echo  (isset($patient->cause[$i])?$patient->cause[$i]:''); ?>' maxlength='50' size='50'></td>
			</tr>
		@endfor
	</table>
	<br><br>
	<strong>EXTENDED FAMILY PSYCHIATRIC PROBLEMS PAST & PRESENT:</strong>
	<div class="form-group">
	    <a>Maternal Relatives:</a>
	    <input type="text" name="maternal" value="<?php  echo  (isset($patient->maternal)?$patient->maternal:''); ?>" class="form-inline" maxlength="130" size="120">
	</div>
    
	<div class="form-group">
   		<a>Paternal Relative:</a>
    	<input type="text" name="paternal" value="<?php  echo  (isset($patient->paternal)?$patient->paternal:''); ?>" class="form-inline" maxlength="130" size="120">
	</div>
	
	<strong style="text-align: left;">WOMENS REPRODUCTIVE HISTORY:</strong>
	<br>

	<div>
		<div style="float: left; width: 50%;">
			<div class="form-group">
		   		<a>Age of first period:</a>
		    	<input type="text" name="period" value="<?php  echo  (isset($patient->period)?$patient->period:''); ?>" class="form-inline" onkeypress="return soloNumeros(event);">
			</div>
			<div class="form-group">
		   		<a># Pregnancies:</a>
		    	<input type="text" name="pregnancies" value="<?php  echo  (isset($patient->pregnancies)?$patient->pregnancies:''); ?>" class="form-inline" onkeypress="return soloNumeros(event);">
			</div>
			<div class="form-group">
		   		<a># Miscarriages:</a>
		    	<input type="text" name="miscarriages" value="<?php  echo  (isset($patient->miscarriages)?$patient->miscarriages:''); ?>" class="form-inline" onkeypress="return soloNumeros(event);">
			</div><div class="form-group">
		   		<a># Abortions:</a>
		    	<input type="text" name="abortions" value="<?php  echo  (isset($patient->abortions)?$patient->abortions:''); ?>" class="form-inline" onkeypress="return soloNumeros(event);">
			</div>
		</div>
	
		<div style="float: none;">
			<div class="form-group">
		   		<a>Last Papsmear:</a>
		    	<input type="date" name="papsmear" value="<?php  echo  (isset($patient->papsmear)?$patient->papsmear:''); ?>" class="form-inline">
			</div>
			<div class="form-group">
		   		<a>Results:</a>
		    	<input type="text" name="papsmearresult" value="<?php  echo  (isset($patient->papsmearresult)?$patient->papsmearresult:''); ?>" class="form-inline">
			</div>
			<div class="form-group">
		   		<a>Last Mamogram:</a>
		    	<input type="date" name="mamogram" value="<?php  echo  (isset($patient->mamogram)?$patient->mamogram:''); ?>" class="form-inline">
			</div>
			<div class="form-group">
		   		<a>Results:</a>
		    	<input type="text" name="mamogramresult" value="<?php  echo  (isset($patient->mamogramresult)?$patient->mamogramresult:''); ?>" class="form-inline">
			</div>		
		</div>
	</div>
</div>
<div style="float: none;">
	<div class="form-group">
		<a>If reached menopause.  At what age?:</a>
		<input type="text" name="menopause" value="<?php  echo  (isset($patient->menopause)?$patient->menopause:''); ?>" class="form-inline" onkeypress="return soloNumeros(event);">
	</div>	

	<div class="form-group">
		<a>Have regular periods?. Period formula:</a>
		<input type="text" name="periods" value="<?php  echo  (isset($patient->periods)?$patient->periods:''); ?>" class="form-inline" onkeypress="return soloNumeros(event);">
	</div>	
</div>
	<div class="col-xs-3 col-sm-3 col-md-3" style="text-align:  center; position: fixed; height: 40px; bottom:0;  width: 75%;">
       	<button style="opacity:1;" id="save" type="Submit" class="btn btn-primary glyphicon glyphicon-floppy-save" disabled> Save</button>
    </div>
</form>

<script type="text/javascript">
	
	$("#MyFamilyHistory :input").change(function() {
   $(".btn").disabled=false;
   document.getElementById('save').disabled=false;
});
</script>
</div>