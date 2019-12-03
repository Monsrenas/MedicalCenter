<?php use App\Sustanceuse; 
	
	if(!isset($_SESSION)){
    session_start();
	}
	$_SESSION['opcion']='bott8';

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
            $patient=new Sustanceuse;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif

<script type="text/javascript">
	
		function rellenacheck($name) {
			
		 document.getElementById($name).checked='checked';
		}	
	
</script>

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #AFC4E8; font-size: x-small;">
<form  id="MySustanceUse" action="javascript:SaveDataNoRefreshView('MySustanceUse','store')" method="post" style="width: 100%; text-align: center;">
	@csrf 	

	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.SustanceUse'>
	<input type="hidden" name="modelo"  value='Sustanceuse'>

	<input type="hidden" name="_method" value="post"/>


	<?php 	$category=["Alcohol","Marijuana","Cocaine, crack", "Cigarettes", 'OPIOIDS:  Tylenol #2 & #3, 282’S, 292’S,
Percodan, Percocet, Opium, Morphine, Demerol, Dilaudid', "INHALANTS: Glue, gasoline, aerosols, paint thinner, poppers, rush, locker room", "OTHER: specify"];
 ?>

	<table style="margin-bottom: 20px;">
		<tr>
			<td><strong>DRUG CATEGORY (circle each substance used)</strong></td>
			<td><strong>Age when you first used this:</strong></td>
			<td><strong>How much & how often did you use this?</strong></td>
			<td><strong>How many years did you use this?</strong></td>
			<td><strong>When did you last use this?</strong></td>
			<td><strong>Do you currently use this?</strong></td>
		</tr>

		@for ($i = 0; $i<7; $i++)
		 <tr>
		 	<td style="text-align: right; padding-right:15px;">{{ $category[$i] }}</td>
		 	<td><input type='text' class='form-control' name='ageuse[]' value='{{$patient->ageuse[$i]}}' onkeypress="return soloNumeros(event);"></td>
		 	<td><input type='text' class='form-control' name='often[]' value='{{$patient->often[$i]}}' onkeypress="return soloNumeros(event);"></td>
		 	<td><input type='text' class='form-control' name='yearsuse[]' value='{{$patient->yearsuse[$i]}}' onkeypress="return soloNumeros(event);"></td>
		 	<td><input type='date' class='form-control' name='lastuse[]'  value='{{$patient->lastuse[$i]}}'></td>
		 	<td><input type='checkbox' class='form-control' name="yesno[yesno{{$i}}]" id="yesno{{$i}}" value='{{$i}}'></td>
		 </tr>
		@endfor


		@for ($i = 0; $i<7; $i++)
			  <?php
			  	$indicen="yesno".$i; 
				?>

			@if (isset($patient->yesno[$indicen] ))
			 		
	                    <script> rellenacheck("yesno<?php echo $patient->yesno[$indicen]  ?>"); </script>
	                  
	             @endif
        @endfor
	</table>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 12px;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>
</form>
</div>