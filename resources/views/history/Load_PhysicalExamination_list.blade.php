<!--Carga el listado de Examenes fisicos del paciente.  -->
<?php 
if(!isset($_SESSION)){ session_start(); }
	$busca=(
		    ( isset($_SESSION['identification']) )&&
	        ( isset($_SESSION['dr_user']       ) )
	                                                 )?$_SESSION['identification'].$_SESSION['dr_user']: "";
	
	if ((!isset($_SESSION['identification']))or(!isset($_SESSION['dr_user']))) { return ;}
 
?>


<script type="text/javascript">
 $('#frhistory_Load_PhysicalExamination_list').remove();	
 RefreshDataInView('#center_wind', '&modelo=Physical&url=history.PhysicalExamination_list&_method=get&findit={{$busca}}', 'flexlist','history_Load_PhysicalExamination_list');
</script>