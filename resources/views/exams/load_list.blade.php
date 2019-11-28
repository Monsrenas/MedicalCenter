<!--Carga el listado de Examenes del paciente.  -->
<?php 
if(!isset($_SESSION)){ session_start(); }
	$busca=(
		    ( isset($_SESSION['identification']) )&&
	        ( isset($_SESSION['dr_user']       ) )
	                                                 )?$_SESSION['identification'].$_SESSION['dr_user']: "";
	
	if ((!isset($_SESSION['identification']))or(!isset($_SESSION['dr_user']))) { return ;}
 
?>
<script type="text/javascript">RefreshDataInView('#center_wind', '&modelo=Exams&url=exams.list&_method=get&findit={{$busca}}', 'flexlist','exams.list');

$("#btnxmsrealizados").attr("onclick","RefreshDataInView('#center_wind', '&modelo=Exams&url=exams.list&_method=get&option=1&findit=.&identification={{$_SESSION['identification']}}', 'flexlist','exams.list')");

$("#btnxmssolicitados").attr("onclick","RefreshDataInView('#center_wind', '&modelo=Exams&url=exams.list&_method=get&option=0&findit={{$busca}}', 'flexlist','exams.list')");


</script>

