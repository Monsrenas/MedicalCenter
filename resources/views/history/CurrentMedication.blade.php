<?php 
use App\Lastmedical;
$clasedat= new Lastmedical;
$identification='';	

if(!isset($_SESSION)){session_start();}
 ?>

 @if (isset($patient))
          <?php $identification=(isset($patient->identification))?$patient->identification:"";  ?>

@endif

 @if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>

@endif

<style type="text/css">
    table { font-size: small;
             
            width: 100%;
            border-width:0px; border-style:none;  
          }
</style>

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #AFC4E8; ">
<form  id="MyCurrentMedication" action="javascript:SaveDataNoRefreshView('MyCurrentMedication','store')" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'/>
	<input type="hidden" name="url"  value='history.CurrentMedication'/>
	<input type="hidden" name="enlace"  value='history.CurrentMedication'/>
    
    <input type="hidden" name="_method" value="post">
     <input type="hidden" name="modelo" id="modelo" value="Currentmedication" />

	<div class="form-group" id="drugs">
        <strong>Drug allergies:</strong>
         
    </div>
    <a href="javascript:addDrug('')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Drug</a>
    <br><br>
	<div class="form-group">
        <strong>Please list any medications that you are now taking. Include non-prescription medications & vitamins or suplements:</strong>
        <br>
        <br>
        <br>
        <table >
        	<tr>
        		<td style="width: 450px;">
		         	<strong>Name of drug</strong>
		         </td>
		         <td style="width: 170px;">
		         	<strong>Dose</strong>
		         </td>
		         <td style="width: 300px;">
		         	<strong>How long have you been taking this</strong>
		         </td>
		         <td></td>
		     </tr>

		     
        </table>


        <div id="medications"></div>
    </div>
    <a href="javascript:addMedition('','','')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Medication</a>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 12px;">
        <button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
        <br>
    </div>
</form>	

<script type="text/javascript">
		
		var $med=0;
        var $dru=0;
        function delelm($xeme){ 
       
        $('#'+$xeme).remove();
        
        }

	function addMedition($vDrug, $vDose, $vtime){ 
				
		$others="<div id='med"+$med+"'> <input type='text' class='form-inline' name='drugname[]'  value='"+$vDrug+"' maxlength='50' size='50'><input type='text' class='form-inline' name='dose[]'  value='"+$vDose+"'><input type='text' class='form-inline' name='time[]'  value='"+$vtime+"'><a href='javascript:delelm(\"med"+$med+"\")' class='btn btn-success'><span class='glyphicon glyphicon glyphicon-minus' aria-hidden='true'></span> Delete</a></div>";
		
		var txt = document.getElementById('medications');
        txt.insertAdjacentHTML('beforeend', $others);
        $med=$med+1;
       }

	function addDrug($vAlerg){ 
		$others="<div id='drug"+$dru+"'><input type='text' class='form-inline' name='allergieTo[]' placeholder='Drug to which the patient is allergic' value='"+$vAlerg+"' maxlength='100' size='100'> <a href='javascript:delelm(\"drug"+$dru+"\")' class='btn btn-success'><span class='glyphicon glyphicon glyphicon-minus' aria-hidden='true'></span> </a> </div>";
		
		var txt = document.getElementById('drugs');
        txt.insertAdjacentHTML('beforeend', $others);
        $dru=$dru+1;
       }
</script>


	@if (isset($patient->allergieTo))
			@foreach ($patient->allergieTo as $allergie)
    			<script> addDrug('<?php echo  $allergie ?>'); </script>
    		@endforeach
    @endif

    @if (isset($patient->drugname))
    	@for ($i = 0; $i < count($patient->drugname); $i++)
    		<script> addMedition('{{ $patient->drugname[$i] }}','{{ $patient->dose[$i] }}' ,' {{ $patient->time[$i] }} '); </script>
		@endfor
    @endif 
</div>
<script type="text/javascript">
    

</script>