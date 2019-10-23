
@section('eltema')
<?php use App\Socialhistory; 

if(!isset($_SESSION)){session_start();}
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
            $patient=new Socialhistory;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
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
</style>


<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #5E77A5; ">
<form  action="{{url('almacena')}}" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.SocialHistory'>
	<input type="hidden" name="modelo" id="modelo" value='Socialhistory'>

	<input type="hidden" name="_method" value="get"/>
     


	<div class="form-group">
	    <strong>1- Highest  educational level reached:</strong>
	    <select name="education" id="education" required>
	        <option value="H" >High School</option>
	        <option value="S" >Some college</option>
	        <option value="C" >College graduate</option>
	        <option value="A" >Advance degree</option>
	    </select>
	     <script type="text/javascript"> var education="<?php  echo  $patient->education; ?>"; </script> 
	</div>

	<div class="form-group">
	    <strong>2- Current or past occupation:</strong>
	    <input type="text" name="occupation" value="{{$patient->occupation}}" class="form-inline" maxlength="70" size="70" required>
	</div>

	<div class="form-group">
	    <strong>3- Currently working:</strong>
	    <table  style="background: #AFC4E8; border: 1px solid rgba(100, 200, 0, 0.3); width: 100%;"> 
	    	<tr style="text-align: center;">
	    		<th style="width: 50%; text-align: center;"><strong>YES</strong></th>
	    		<th style="width: 50%; text-align: center;" ><strong>NO</strong></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 50%;">
	    			Hours/Week:
                    <input type="text" name="hoursweek" value="{{$patient->hoursweek}}" class="form-inline"> 
	    		</td>
	    		<td>
	    			 <div class="form-check form-check-inline">
	                      <input class="form-check-input" type="radio" name="nowork" id="nowork" value="R" <?php if ($patient->nowork=="R") {echo "checked";}?> >
	                      <label class="form-check-label" for="nowork1">Retired</label>

	                      <input class="form-check-input" type="radio" name="nowork" id="nowork2" value="D" <?php if ($patient->nowork=="D") {echo "checked";}?>>
	                      <label class="form-check-label" for="nowork1">Disabled</label>

	                      <input class="form-check-input" type="radio" name="nowork" id="nowork3" value="S" <?php if ($patient->nowork=="S") {echo "checked";}?>>
	                      <label class="form-check-label" for="nowork2">Sick Leave</label>
	                 </div>
	    		</td>
	    	</tr>
	    </table>
	</div>

	<div class="form-group">
	    <strong>4- Religion:</strong>
	    <input type="text" name="religion" value="{{$patient->religion}}" class="form-inline" maxlength="70" size="70">
	</div>

	<div class="form-group">
	    <strong>5- Previous hospital admissions:</strong>
	    
	    <table  style="background: #AFC4E8; border: 1px solid rgba(100, 200, 0, 0.3); width: 100%;"> 
	    	<tr style="text-align: center;">
	    		<th style="width: 50%; text-align: center;"><strong>Reason for admission</strong></th>
	    		<th style="width: 50%; text-align: center;" ><strong>Duration</strong></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 50%;">
                    <input type="text" name="admissionreason" value="{{$patient->admissionreason}}" class="form-inline" maxlength="70" size="70" > 
	    		</td>
	    		<td>
	    			 <input type="text" name="admissionduration" value="{{$patient->admissionduration}}" class="form-inline">
	    		</td>
	    	</tr>
	    </table>

	</div>

	<div class="form-group">
	    <strong>6- Any history of sexually transmitted disease:</strong>
	    <input type="text" name="sextrans" value="{{$patient->sextrans}}" class="form-inline" maxlength="70" size="70">
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