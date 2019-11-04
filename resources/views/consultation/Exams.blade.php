<?php 
use App\Exams;
    if(!isset($_SESSION)){ session_start(); }
    $user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
?>

 

 @if (isset($patient))
           <?php 
            $abcd=json_decode($patient);
            $patient=new Exams;  
            
           foreach ($abcd as $clave => $valor) {
                if (isset($abcd->{$clave})) {$patient->{$clave}=$abcd->{$clave};}
                }

           $id=$patient->id;  
           $identification=$patient->identification;?>
@else
    <?php                     
            $patient=new Exams;
            if (!isset($identification)) {$identification="";}
            ?> 
    @if (isset($_SESSION['identification']))
           <?php 
                $identification=($_SESSION['identification']);  
                $id=str_replace(" ", "",$hoy.$identification.$user);
            ?>
    @endif
@endif


<style type="text/css">
    table { font-size: small;
             
            width: 100%;
          }
    .exam {width: 460px;}
    .descr {width: 375px;}
    .imagt {width: 170px;}
</style>

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center;  background: #AFC4E8; ">
<form  action="javascript:SaveDataNoRefreshView('MyExams','IDstore')" method="post" id="MyExams">
	@csrf
    <input type="hidden" name="_method" value="post">
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
    <input type="hidden" name="id"  placeholder="Consultation Id" value='{{ $id }}'>
	<input type="hidden" name="url"  value='consultation.Exams'>
	<input type="hidden" name="modelo"  value='Exams'>

	<div class="form-group" id="examenes">
        <strong>Exam(s) :</strong>
        <table>
        	<tr>
        		<td class="exam">
		         	<strong>Exam title</strong>
		         </td>
		         <td class="descr" style="">
		         	<strong>Results</strong>
		         </td>
		         <td class="imagt">
		         	<strong>Image</strong>
		         </td>
		         <td>
                    <strong>----</strong>          
                 </td>
		     </tr>

		     
        </table>


        <div id="exmsList"></div>
    </div>
    <a href="javascript:addMedition('','','')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Exams</a>
    
    <?php include(app_path().'/Includes/SaveButton.html') ?>
</form>	

<script type="text/javascript">
		
		var $xmed=0;
        function delelm($xeme){ 
       
        $('#'+$xeme).remove();
        
        }

	function addMedition($title, $Descrptn, $image){ 
        $titlet="<input type='text' class='form-inline exam' name='exams["+$xmed+"][0]'  value='"+$title+"' style='width: 350px;'>";
        $descrt="<input type='text' class='form-inline' name='exams["+$xmed+"][1]'  value='"+$Descrptn+"' style='width: 310px;'>";
		$imgdrv= ($image) ? "<a href='#'>"+$image+"</a>" : "<a href='javascript:addimage(\"img"+$xmed+"\")' class='btn btn-normal'><span class='glyphicon ' aria-hidden='true'></span> Add image</a>";
        $bottDel="<a href='javascript:delelm(\"exams"+$xmed+"\")' class='btn btn-success'><span class='glyphicon glyphicon glyphicon-minus' aria-hidden='true'></span></a>";
		$others="<div id=\"exams"+$xmed+"\">"+$titlet+$descrt+$imgdrv+$bottDel+"</div>";
		
		var txt = document.getElementById('exmsList');
        txt.insertAdjacentHTML('beforeend', $others);
        
        $xmed=$xmed+1;
       }
</script>

    @if (isset($patient->exams))
        <?php $xyzabc=json_decode(json_encode($patient->exams), true); ?>
    	@for ($i = 0; $i < count($xyzabc); $i++)
            <?php 
                
                
                $colExam=(isset($xyzabc[$i][0]))? $xyzabc[$i][0] : "";
                $colResu=(isset($xyzabc[$i][1]))? $xyzabc[$i][1] : "";
                $colImag=(isset($xyzabc[$i][2]))? $xyzabc[$i][2] : "";
             ?>
    		<script> addMedition('{{ $colExam }}','{{ $colResu }}' ,' {{ $colImag }} '); </script>
		@endfor
    @endif 
</div>

