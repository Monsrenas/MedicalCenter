<?php use App\Physiciansnote; 
    
    if(!isset($_SESSION)){ session_start(); }
    $user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);    
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
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
    @if (isset($_SESSION['identification']))
               <?php 
                    $identification=($_SESSION['identification']);  
                    $id=str_replace(" ", "",$hoy.$identification.$user);
                ?>
    @else
        <?php return; ?>
    @endif


@endif


<style type="text/css">
    table { font-size: small;
             
            width: 100%;
            border-width:0px; border-style:none;  
          }
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

	<div class="form-group">
        <strong>Evolution:</strong><br>
        <textarea rows = "5" cols = "100%" name = "evolution">
               {{$patient->evolution}} 
        </textarea>
    </div>
    <div class="form-group">
        <strong>Treatment</strong><br>
       <textarea rows = "5" cols = "100%" name = "treatment">
               {{$patient->treatment}} 
        </textarea>
    </div>

	<div class="form-group">
        <strong>Medical prescription</strong>
        <br>
        <br>
        <br>
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
        </table>


        <div id="PTNmedications"></div>
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

    @if (isset($patient->drug))
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