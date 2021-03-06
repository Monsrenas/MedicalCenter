<?php use App\Physical; 
	if(!isset($_SESSION)){ session_start(); }
	$user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
    $prueba='mInDate';
?>
<script type="text/javascript">
	if ($('#mInDate').length) {
		<?php $prueba='vInDate'; ?>
	}

	if ($('#vInDate').length) {
		<?php $prueba='xInDate'; ?>
	}
</script>
 @if (isset($patient))
           <?php
            $abcd=json_decode($patient);
        	$patient=new Physical;	
         
           foreach ($abcd as $clave => $valor) {
   				if (isset($abcd->{$clave})) {$patient->{$clave}=$abcd->{$clave};}
				}
           	
           if($patient->identification) {$identification=$patient->identification;} else {
           	  $identification=(isset($_SESSION['identification']))? $_SESSION['identification']:"";}
           	
           $id=(isset($patient->id))? $patient->id : str_replace(" ", "",$hoy.$identification.$user);
           ?>
 @else         
           <?php                     
            $patient=new Physical;
            if (!isset($identification)) {$identification="";}
            ?>  
	@if (isset($_SESSION['identification']))
	           <?php 
	           		$identification=($_SESSION['identification']);  
	           		$id=str_replace(" ", "",$hoy.$identification.$user);
				?>
	@endif


@endif

<?php 

global  $patient1;
		$patient1=$patient;
   include(app_path().'/Includes/categorys.php');

   global $indiceradio,$indicetext;
   
   $indiceradio=0;
   $indicetext=0;
   
   
  function indice($x) { global $indiceradio,$indicetext;
  						if ($x==1) { $i=$indiceradio;
  									$indiceradio=$indiceradio+1;
  									return $i;}
  						if ($x==2) { $i=$indicetext;
  									$indicetext=$indicetext+1;
  									return $i;}				 
  					}

  function BMI($Wght,$Hght) {

  	if (is_array($Wght)){ if ($Wght[1]=='lb') {$kg=((real) $Wght[0])/2.2046;  } else {$kg=( (real)$Wght[0]);} } 
		else 	{ $kg=( (real) $Wght); }

  	if (is_array($Hght)) { if ($Hght[1]=='ft') {$mt=((real) $Hght[0])/3.2808; } else {$mt=((real) $Hght[0]); } 

  	}else 	{ $mt=( (real) $Hght); }

  	/*alcula dividiendo los kilogramos de peso por el cuadrado de la estatura en metros (IMC = peso [kg]/ estatura [m2]) */ 
  		$vBMI=0;
  		if ($mt>0) {$vBMI=round($kg/($mt*$mt),2) ;}
  	return $vBMI;

  }

  function BMIClass($vBMI) {

  		switch ($vBMI) {
		    case ($vBMI<16): return "Under: Severe Thinness";						break;	
		    case ($vBMI >= 16 && $vBMI<=16.99): return "Under: Moderate thinness";	break;	
		    case ($vBMI >= 17 && $vBMI<=18.49): return "under: Thin Acceptable";	break;	
		    case ($vBMI >= 18.50 && $vBMI<=24.99): return "Normal weight";			break;	
		    case ($vBMI >= 25 && $vBMI<=29.99): return "Overweight";				break;	
		    case ($vBMI >= 30 && $vBMI<=34.99): return "Obese: Type I";				break;	
		    case ($vBMI >= 35 && $vBMI<=40.99): return "Obese: Type II";			break;	
		    case ($vBMI>40): return "Obese: Type III";								break;	
	
	}
  }

  function unit_measurement($cdn) {
  	global $patient1;
  	$nom=str_replace(" ", "", substr($cdn, 2,-1));
  	$mID="MY".str_replace(" ", "", substr($cdn, 2,-1));	
  	$unit='';
  	$valor=($patient1->$nom); 
  	$xtra='';
	switch ($nom) {
	    case 'Weight':
	    		$xtra="onchange='javascript:actualizaBMI()'";
	    		$mWeight=(isset($patient1->Weight[1]))? $patient1->Weight[1]:'';
	    		$unit="<select name='Weight[1]' id='SLTWeight'>
                           <option ".(($mWeight=='kg') ? "selected":"")." value='kg' >Kilogram</option>
                           <option ".(($mWeight=='lb') ? "selected":"")." value='lb' >Pound</option>
                       </select>";

                
                if (isset($patient1->$nom[0])) { $valor=$patient1->$nom[0];}
                $nom=$nom."[0]";
	        break;
	    case 'Height':
	    	$xtra="onchange='javascript:actualizaBMI()'";
	    	$mHeight=(isset($patient1->Height[1]))? $patient1->Height[1]:'';
	    	$unit="<select name='Height[1]' id='SLTHeight' value='m'>
                               <option ".(($mHeight=='ft') ? "selected":"")." value='ft' >Feet</option>
                               <option ".(($mHeight=='m') ? "selected":"")." value='m' >Meters</option>
                             </select>";
            if (isset($patient1->$nom[0])) {$valor=$patient1->$nom[0];}
	        $nom=$nom."[0]";
	        break;
	    case 'BMI':	
	        $nWeight=(isset($patient1->Weight))? $patient1->Weight:"";	
	        $nHeight=(isset($patient1->Height))? $patient1->Height:"";
	         return "<td id='BMISHOW' colspan='".substr($cdn, 1,1)."'> ".substr($cdn, 2)."<strong>".BMI($nWeight,$nHeight)."</strong> <br> ".BMIClass(BMI($nWeight,$nHeight))."</td>";
	         break; 
	        } 
	 
	 $vlr=(is_array($valor))? $valor[1]:$valor;
	
	 if ($nom<>'') {   $ctrlr="<input type='text' name='".$nom."' size='5' value='".$vlr."' onkeypress='return soloNumeros(event, this.value)' ".$xtra." id='".$mID."'>";
				$resu="<td colspan='".substr($cdn, 1,1)."'>".substr($cdn, 2).$ctrlr.$unit." </td>";
				return $resu;
  					}
  	return '';

  }					
  		

  function decifra($cadena) {
		global $patient1;	
 	
  		$resu="<td colspan='4'>".$cadena."</td>";
  		if (($cadena=="***")or($cadena=="...")) { $i=indice(1); 
  			
  			$xyzabc=(isset($patient1->N))? json_decode(json_encode($patient1->N), true):null;
   			$Nck=""; $ANck=""; $NEck="";

  			if (($xyzabc) and (array_key_exists($i, $xyzabc))) {
	  			if ($xyzabc[$i]=="N") {$Nck="checked";} 
	  			if ($xyzabc[$i]=="AN") {$ANck="checked";}
	  			if ($xyzabc[$i]=="NE") {$NEck="checked";}
  			} 
  			$cbz=($cadena=="***")? "<td width='10'>":" ";
  			$cla=($cadena=="***")? "</td> ":" ";

  			$resu=$cbz."<input type='radio' name='N[$i]' id='N$i'  value='N' ".$Nck." >".$cla." 
  					".$cbz." <input type='radio' name='N[$i]' id='AN$i' value='AN' ".$ANck." >".$cla."
  					".$cbz." <input type='radio' name='N[$i]' id='NE$i' value='NE' ".$NEck." > ".$cla ;
  				}

  
  		if (substr($cadena, 0,1)=="#"){ $i=indice(2); 
					  					$nomb=str_replace(" ", "", substr($cadena, 2,-1));
					  					$valor=(isset($patient1->$nomb))? $patient1->$nomb:"";
					  					$resu=unit_measurement($cadena);
									  }
 	
  		if ($cadena=="DAF") { $resu="<td rowspan='60'> <textarea style='resize: none;' rows = '100%' cols = '100%' name = 'DAF'>".((isset($patient1->DAF)) ? $patient1->DAF : "")."</textarea> </td>"; }

  		if ($cadena=="DAD") { $resu="<td rowspan='80'> <textarea style='resize: none;' rows = '100%' cols = '100%' name = 'DAD'>".((isset($patient1->DAD)) ? $patient1->DAD : "")."</textarea> </td>"; }
				
  		if ($cadena=="NNN") {    $resu="<td width='10'> <strong>N</strong>  </td> 
					  					<td width='10'> <strong>AN</strong> </td>
					  					<td width='10'> <strong>NE</strong> </td> ";
					  		}
  		return $resu;
  }

 function Arbol($arreglo){
 	$dato="";
		for ($i = 0; $i<count($arreglo); $i++) {	 $value=$arreglo[$i];
									$dato=$dato."<tr>";
	 							for ($j = 0; $j<count($value); $j++){
	 		 												if (is_array($value[$j]) ) 
	 		 													{	 
	 		 														$resu=Arbol($value[$j]); 	   
	 		 														$dato=$dato.$resu;										
	 		 													}
	 														else { $dato=$dato.decifra($value[$j],$i);		}
	 																}												
	$dato=$dato."<tr/>";	
								}			
 	return $dato;
 	}

 	?>


<style type="text/css">

.PEMYtable {	font-size: x-small;
  			border-collapse: collapse;
  			
  			border: 1px inset #5183E8; 
  			width: 100%;
  			
		  }

.PEMYtable, th, td {
					  border: 1px solid #5183E8;
					  text-align: center;
					  padding-bottom: 6px;
				  }
</style>
<div style="padding: 1%; border-width:1px; border-style:solid; border-color:black; background: #B1C3E8; align: center; height: auto; margin-bottom: 20px;">
<form  action="javascript:SaveDataNoRefreshView('MyPhysical','IDstore')" method="post" style="width: 100%; text-align: center;" id="MyPhysical">
	@csrf 	
	<input type="hidden" name="id" id="id"  value='{{ $id }}'>
	<input type="hidden" name="_method" value="post">
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	 <input type="hidden" name="modelo" id="modelo" value="Physical">

	<input type="hidden" name="url"  value='consultation.PhysicalExamination'>

	<table class="align-middle PEMYtable" style="margin-bottom: 20px;">
		<tr>
			<th colspan="2" width="5">INTEGRATED MEDICAL CARE</th>
			<th colspan="5" width="5">PHYSICAL EXAMINATION</th>
			<th><div id='{{$prueba}}'></div></th>
		</tr>
		<tr>
			<th colspan="7">GENERAL, REGIONAL AND BY SYSTEMS</th>

		</tr>
		<tr>   
			<th colspan="4" >GENERAL</th>
			<th colspan="1">N</th>
			<th colspan="1">AN</th>
			<th colspan="1">NE</th>
			<th colspan="1">DESCRIBE ABNORMAL FINDINGS</th>
		</tr>

		
		<?php echo Arbol($GENERAL);?>
		<tr> <td rowspan="2">Head</td>  <td colspan="3">Cranium</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">face</td>	<?php echo decifra("***");?> </tr>

		<tr> <td rowspan="4">Neck</td>   <td colspan="3">Anterior</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Posterior</td>	<?php echo decifra("***");?> </tr>

		<tr> <td colspan="3">Lateral</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Supraclavicular</td> <?php echo decifra("***");?> </tr>

		<tr> <td rowspan="1">Breast</td> <td colspan="3">Inspection</td> <?php echo decifra("***");?> </tr> 
		<tr> <td colspan="4">Palpation</td>	<?php echo decifra("***");?> </tr>
		<?php echo Arbol($REGIONAL);?>
		<tr> <td rowspan="4">Cardiaca Area</td>   <td colspan="3">Inspection</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Palpation</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Ausculation</td>	<?php echo decifra("***");?> </tr>
		<tr> <?php echo decifra("#3Central heart rate:");?> <?php echo decifra("***");?> </tr>

		<tr> <td rowspan="12">Per. Arter.</td>  <td rowspan="10">PULSES</td> <td rowspan="2">Radial</td> <td colspan="1">L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Femoral </td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Tibial Post. </td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Pedis</td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Others</td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr> <td rowspan="2">Blood Pressure</td> <?php echo decifra("#5Upper extrem:");?></tr>
		<tr> <?php echo decifra("#5Lower extrem:");?></tr>
		<?php echo Arbol($VENOUS);
			  echo Arbol($GASTRO);?> 
		<tr> <td rowspan="5">Abdomen</td>   <td colspan="3">Inspection</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Palpation</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Percussion</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Ausculation</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">DRE</td><?php echo decifra("***");?></tr>
		<?php echo Arbol($HEMO);?>
		</table>
		<table class="PEMYtable">
		<tr><td colspan="7"><strong>CRANIAL NERVES</strong></td></tr>
		<tr><td></td><td>I</td><td>II</td><td> III  IV VI</td><td>V</td><td>VII</td></tr>
		<tr><td>R</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td>L</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td></td><td>VIII</td><td>IX</td><td>X</td><td>XI</td><td>XII</td></tr>
		<tr><td>R</td><td><?php echo decifra("...",15);?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td>L</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...",15);?></td><td><?php echo decifra("...");?></td></tr>	
	</table>

	<div  style="position: fixed; height: 40x; bottom:0; right:1; width: 100%; margin-left: -40%;">
       	<strong>N=Normal</strong>  |  <strong>AN=Abnormal</strong>  |  <strong>NE=No Examined</strong>
    </div>

	@include('funciones')    
    <?php SaveButton('MiPhyBoton'); ?>

</form>
</div>

<script type="text/javascript">
	activaBoton('MiPhyBoton','MyPhysical');
	function actualizaBMI(){
		
		$('#BMISHOW').html('');

	}
	fijafecha('{{substr($id, 6,2)}}','{{substr($id, 4,2)}}','{{substr($id, 0,4)}}','{{$prueba}}');
</script>