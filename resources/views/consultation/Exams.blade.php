<?php 
use App\Exams;
$clasedat= new Exams;
$id='';	

if(!isset($_SESSION)){ session_start();}
$user=(isset($_SESSION['user']))?$_SESSION['user'] : "";
$cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
?>

 @if (isset($_SESSION['identification']))
           <?php 
                $identification=($_SESSION['identification']);  
                $id=str_replace(" ", "",$hoy.$identification.$user);
            ?>
 @endif

 @if (isset($patient))
           <?php $patient=$patient[0]; 
           $id=$patient->id;  
           $identification=$patient->identification; ?>
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

	<div class="form-group">
        <strong>Exam(s) :</strong>
        <table >
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
        function delelm($xeme){ 
       
        $('#'+$xeme).remove();
        
        }

	function addMedition($title, $Descrptn, $image){ 
        $titlet="<input type='text' class='form-inline' name='exams[][0]'  value='"+$title+"' maxlength='35' size='35'>";
        $descrt="<input type='text' class='form-inline' name='exams[][1]'  value='"+$Descrptn+"'>";
		$imgdrv= ($image) ? "<a href='#'>"+$image+"</a>" : "<a href='javascript:addimage(\"med"+$med+"\")' class='btn btn-normal'><span class='glyphicon ' aria-hidden='true'></span> Add image</a>";
        $bottDel="<a href='javascript:delelm(\"med"+$med+"\")' class='btn btn-success'><span class='glyphicon glyphicon glyphicon-minus' aria-hidden='true'></span></a>";
		$others="<tr><td> <div id='med"+$med+"'> "+$titlet+"</td><td>"+$descrt+"</td><td>"+$imgdrv+"</td><td>"+$bottDel+"</div></td></tr>";
		
		var txt = document.getElementById('medications');
        txt.insertAdjacentHTML('beforeend', $others);
        $med=$med+1;
       }
</script>

    @if (isset($patient->exams))
    	@for ($i = 0; $i < count($patient->exams); $i++)
    		<script> addMedition('{{ $patient->exams[$i][0] }}','{{ $patient->exams[$i][1] }}' ,' {{ $patient->exams[$i][2] }} '); </script>
		@endfor
    @endif 
</div>

