<?php 
use App\Socialhistory; 

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

<style type="text/css">
	table {	font-size: small;
  			 
  			background: #AFC4E8; 
  			 
  			width: 100%;
		  }

	table, th, td {	  text-align: center;
					  padding-bottom: 6px;
				  }
	.secc { padding-bottom: 20px; }			  
</style>


<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; text-align: left; background: #AFC4E8; ">
<form  id="MySocialHistory" action="javascript:SaveDataNoRefreshView('MySocialHistory','store')" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.SocialHistory'>
	<input type="hidden" name="enlace"  value='history.SocialHistory'>
	<input type="hidden" name="modelo" id="modelo" value='Socialhistory'>

	<input type="hidden" name="_method" value="post">
     


	<div class="form-group secc">
	    <strong>1- Highest  educational level reached:</strong>
	    <select name="education" id="education" required>
	        <option value="H" >High School</option>
	        <option value="S" >Some college</option>
	        <option value="C" >College graduate</option>
	        <option value="A" >Advance degree</option>
	    </select>
	     <script type="text/javascript"> var education="<?php  echo  (isset($patient->education)?$patient->education:''); ?>"; </script> 
	</div>

	<div class="form-group secc">
	    <strong>2- Current or past occupation:</strong>
	    <input type="text" name="occupation" value="<?php echo (isset($patient->occupation)?$patient->occupation:'');?>" class="form-inline" maxlength="70" size="70" required>
	</div>

	<div class="form-group secc">
	    <strong>3- Currently working:</strong>
	    <table  style="width: 100%;"> 
	    	<tr style="text-align: center;">
	    		<th style="width: 50%; text-align: center;"><strong>YES</strong></th>
	    		<th style="width: 50%; text-align: center;" ><strong>NO</strong></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 50%;">
	    			Hours/Week:
                    <input type="text" name="hoursweek" value="<?php echo  (isset($patient->hoursweek)?$patient->hoursweek:'');?>" class="form-inline"> 
	    		</td>
	    		<td>
	    			 <div class="form-check form-check-inline">
	    			 	 <?php $nowork=(isset($patient->nowork)?$patient->nowork:'');?>
	                      <input class="form-check-input" type="radio" name="nowork" id="nowork" value="R" <?php if ($nowork=="R") {echo "checked";}?> >
	                      <label class="form-check-label" for="nowork1">Retired</label>

	                      <input class="form-check-input" type="radio" name="nowork" id="nowork2" value="D" <?php if ($nowork=="D") {echo "checked";}?>>
	                      <label class="form-check-label" for="nowork1">Disabled</label>

	                      <input class="form-check-input" type="radio" name="nowork" id="nowork3" value="S" <?php if ($nowork=="S") {echo "checked";}?>>
	                      <label class="form-check-label" for="nowork2">Sick Leave</label>
	                 </div>
	    		</td>
	    	</tr>
	    </table>
	</div>

	<div class="form-group secc">
	    <strong>4- Religion:</strong>
	    <input type="text" name="religion" value="<?php echo  (isset($patient->religion)?$patient->religion:'');?>" class="form-inline" maxlength="70" size="70">
	</div>

	<div class="form-group secc">
	    <strong>5- Previous hospital admissions:</strong>
	    
	    <table  style="border: none; width: 100%;"> 
	    	<tr style="text-align: center;">
	    		<th style="width: 50%; text-align: center;"><strong>Reason for admission</strong></th>
	    		<th style="width: 50%; text-align: center;" ><strong>Duration</strong></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 50%;">
                    <input type="text" name="admissionreason" value="<?php echo  (isset($patient->admissionreason)?$patient->admissionreason:'');?>" class="form-inline" maxlength="70" size="70" > 
	    		</td>
	    		<td>
	    			 <input type="text" name="admissionduration" value="<?php echo  (isset($patient->admissionduration)?$patient->admissionduration:'');?>" class="form-inline">
	    		</td>
	    	</tr>
	    </table>

	</div>

	<div class="form-group secc">
	    <strong>6- Any history of sexually transmitted disease:</strong>
	    <input type="text" name="sextrans" value="<?php echo  (isset($patient->sextrans)?$patient->sextrans:'');?>" class="form-inline" maxlength="70" size="70">
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 12px;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>

</form>
<script type="text/javascript">
	
        function iniSelect(elm, vlr){  document.getElementById(elm).value=vlr;}

        iniSelect("education",education);
</script>
</div>