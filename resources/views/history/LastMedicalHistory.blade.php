<?php 
	$preexistentes=[
					"Diabetes","High blood presure","High cholesterol","Hypothyroidism","Hyperthyroidism","Cancer (type)","Systemic lupus erythematou (Lupus)","Congestive herat Failure","Angina","Colitis",
					"Heart murmur","Pneumonia","Pulmonary embolism","Asthma","Emphysema/Bronchitis","Stroke","Eílesy (seizures)","Cataracts","Kidney disease","Kidney stones",
					"Deep Ven thrombosis","Prostate Problems","Anemia","Jaudice","Hepatitis","Stomach or peptic ulcer","Rheumatic Fever","Tuberculosis","HIV/AIDS"
					];	
	
	if(!isset($_SESSION)){session_start();}

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
	.LMHtable {	font-size: small;
  			 
  			width: 100%;

		  }
</style>
    
<script type="text/javascript">
	
		function rellenacheck($name) {
		 document.getElementById($name).checked='checked';
		}	


		function addmedicalcondition($valor){ 	
		$others="<input type='text' class='form-control' name='ncondition[]' value='"+$valor+"'  placeholder='condition'  maxlength='85' size='85'>";
		
		var txt = document.getElementById('listconditions');
        txt.insertAdjacentHTML('beforeend', $others);}

	
</script>
<div style="padding: 1%;  align: center; background: #AFC4E8; ">
<form  id="MyLastMedical" action="javascript:SaveDataNoRefreshView('MyLastMedical','store')" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.LastMedicalHistory'>
	<input type="hidden" name="enlace"  value='history.LastMedicalHistory'>
	
	<input type="hidden" name="_method" value="post">
	 <input type="hidden" name="modelo" id="modelo" value="Lastmedical" />
 
<table style="width: 100%;" class="LMHtable">
	@for ($i = 0; $i < count($preexistentes); $i+=2)
 		<tr>
 			<?php $name0=substr(str_replace(" ", "", $preexistentes[$i]),0,7); ?>
			<td style="width: 30%; text-align: left;">
				<input type="checkbox" name="heart[{{ $name0 }}]" value="{{$i+1}}" id="{{ $name0 }}"> {{$preexistentes[$i]}}
				@if (isset($patient->heart[$name0]))
                    <script> rellenacheck('<?php echo  $name0 ?>'); </script>
                 @endif
                 
			</td>
			
			@if (($i+1) < count($preexistentes))
				<?php $name1=substr(str_replace(" ", "", $preexistentes[$i+1]),0,7); ?>
			<td style="width: 30%; text-align: left;">
				<input type="checkbox" name="heart[{{ $name1 }}]" value="{{$i+2}}" id="{{ $name1 }}"> {{$preexistentes[$i+1]}}
				@if (isset($patient->heart[$name1]))
                    <script> rellenacheck('<?php echo  $name1 ?>'); </script>
                 @endif
			</td>
			@endif
		
			@if (($i+2) < count($preexistentes)) 
				<?php $name2=substr(str_replace(" ", "", $preexistentes[$i+2]),0,7);  ?> 
				<td style="width: 30%; text-align: left;">
					<input type="checkbox" name="heart[{{ $name2 }}]" value="{{$i+3}}" id="{{ $name2 }}"> {{$preexistentes[$i+2]}}
					@if (isset($patient->heart[$name2]))
                    	<script> rellenacheck('<?php echo  $name2 ?>'); </script>
                 	@endif
				</td>
			@endif
		</tr>
		<?php $i++; ?>
	@endfor

</table>
		<br><br>
        <div class="form-group" id="listconditions">
            <strong>Other medical conditions:</strong>
        </div>
        <a href="javascript:addmedicalcondition('')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Other condition</a>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="text-align:  center; position: fixed; height: 40px; bottom:0;  width: 75%;">
        	<button onclick="pide('LastMedical')" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    	</div>
</form>

	@if (isset($patient->ncondition))
			@foreach ($patient->ncondition as $condition)
    			<script> addmedicalcondition('<?php echo  $condition ?>'); </script>
    		@endforeach
    @endif 
 </div>