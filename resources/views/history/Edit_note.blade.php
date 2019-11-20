<?php use App\Physiciansnote; 
    
    if(!isset($_SESSION)){ session_start(); }
    $user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
    if ((!isset($_SESSION['identification']))or(!isset($_SESSION['dr_user']))) { return ;}    
?>

 @if (isset($patient))
           <?php 
            
            $abcd=json_decode($patient);

            $patient=new Physiciansnote;  
            
           foreach ($abcd as $clave => $valor) {
                if (isset($abcd->{$clave})) {$patient->{$clave}=$abcd->{$clave};}
                }

            if($patient->identification) {$identification=$patient->identification;} else {
            $identification=(isset($_SESSION['identification']))? $_SESSION['identification']:"";}
            
            $id=(isset($patient->id))? $patient->id : str_replace(" ", "",$hoy.$identification.$user);
           ?>
   @else         
           <?php                     
            $patient=new Physiciansnote;
           ?>
  @endif
  <?php 
    $identification=(!($identification))?$_SESSION['identification']:$identification;  
    $id=(!($id))?str_replace(" ", "",$hoy.$identification.$user):$id;
  ?> 

<style type="text/css">
    table { font-size: small;
             
            width: 100%;
            border-width:0px; border-style:none;  
          }

     .soap {width: 100%; background:#6888C0; padding: 10px;}     
</style>

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #AFC4E8; ">
<form  id="MyNoteEdit" action="javascript:SaveDataNoRefreshView('MyNoteEdit','IDstore')" method="post">
	@csrf
    <input type="hidden" name="id" id="id" placeholder="Interrogation Id" value='{{ $id }}'>
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'/>
	<input type="hidden" name="url"  value='history.Edit_note'/>
	<input type="hidden" name="enlace"  value='history.Edit_note'/>
    
    <input type="hidden" name="_method" value="post">
     <input type="hidden" name="modelo" id="modelo" value="Physiciansnote" />
    
    <a href="javascript:showElement('subjective')" class="btn btn-default btn-block"><span  aria-hidden="true"></span> <strong>S: Subjective:</strong></a>   
    <div id="divsubjective" class="form-group soap" <?php echo($patient->subjective)?'':"hidden='true'";?> >
        <textarea rows = "5" cols = "100%" name = "subjective">
               {{$patient->subjective}} 
        </textarea>
    </div>

    <a href="javascript:showElement('evolution')" class="btn btn-default btn-block"><span aria-hidden="true"></span><strong>O: Objective:</strong></a> 
	<div id="divevolution" class="form-group soap" <?php echo($patient->evolution)?'':"hidden='true'";?> >
        <textarea rows = "5" cols = "100%" name = "evolution">
               {{$patient->evolution}} 
        </textarea>
    </div>

    <a href="javascript:showElement('assessment')" class="btn btn-default btn-block"><span  aria-hidden="true"></span><strong>A: Assessment:</strong></a> 
    <div id="divassessment" class="form-group soap" <?php echo($patient->assessment)?'':"hidden='true'";?>>
        <textarea rows = "5" cols = "100%" name = "assessment">
               {{$patient->assessment}} 
        </textarea>
    </div>

    <a href="javascript:showElement('treatment')" class="btn btn-default btn-block"><span  aria-hidden="true"></span><strong>P: Plan</strong></a>
    <div id="divtreatment" class="form-group soap" <?php echo($patient->treatment)?'':"hidden='true'";?>>
       <textarea rows = "5" cols = "100%" name = "treatment">
               {{$patient->treatment}} 
        </textarea>
    </div>

	<div class="form-group" style="padding-top: 20px;">
        <strong>Medical prescription</strong>
        <br>
       <!-- 
        <table >
        	<tr>
        		<td style="width: 450px;">
		         	<strong>Drug</strong>
		         </td>
		         <td style="width: 170px;">
		         	<strong>Dose</strong>
		         </td>
		         <td style="width: 300px;">
		         	<strong>Frequency</strong>
		         </td>
		         <td></td>
		     </tr>
        </table>  --->

        <div style="background: #AFC4E8;">
           <div style="float: left; width: 49%; color: white;"><strong>Drug</strong></div> 
           <div style="float: left; width: 16%; color: white;"><strong>Dose</strong></div>
           <div style="float: left; width: 16%; color: white;"><strong>Frequency</strong></div>
        </div>

        <div id="PTNmedications" style="background: #6888C0;"></div>
    </div>
    <a href="javascript:addMedition('','','')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Medication</a>
    
   <?php include(app_path().'/Includes/SaveButton.html') ?>
</form>	

<script type="text/javascript">
		
		var $ymed=0;
        var $dru=0;
        function delelm($xeme){ 
        
        $('#'+$xeme).remove();   
        }

    function showElement($eName){
        $('#div'+$eName).toggle();
    }

	function addMedition($vDrug, $vDose, $vtime){ 
				
		$others="<div id='med"+$ymed+"'> <input type='text' class='form-inline' name='drug["+$ymed+"][0]'  value='"+$vDrug+"' maxlength='50' size='50'><input type='text' class='form-inline' name='drug["+$ymed+"][1]'  value='"+$vDose+"'><input type='text' class='form-inline' name='drug["+$ymed+"][2]'  value='"+$vtime+"'><a href='javascript:delelm(\"med"+$ymed+"\")' class='btn btn-success'><span class='glyphicon glyphicon glyphicon-minus' aria-hidden='true'></span> Delete</a></div>";
		
		var txt = document.getElementById('PTNmedications');
        txt.insertAdjacentHTML('beforeend', $others);
        $ymed=$ymed+1;
       }
</script>


	@if (isset($patient->allergieTo))
			@foreach ($patient->allergieTo as $allergie)
    			<script> addDrug('<?php echo  $allergie ?>'); </script>
    		@endforeach
    @endif

    @if ((isset($patient->drug))and(is_array($patient->drug)))

    	@for ($i = 0; $i < count($patient->drug); $i++)
            <?php 
              $col[0]=isset($patient->drug[$i][0])?$patient->drug[$i][0]:'';
              $col[1]=isset($patient->drug[$i][1])?$patient->drug[$i][1]:'';
              $col[2]=isset($patient->drug[$i][2])?$patient->drug[$i][2]:'';
             ?>
    		<script> addMedition('{{ $col[0] }}','{{$col[1] }}' ,' {{ $col[2] }} '); </script>
		@endfor
    @endif 
</div>
<script type="text/javascript">
    

</script>