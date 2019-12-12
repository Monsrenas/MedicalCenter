<!--Carga el listado de consultas del paciente. Load consultation list -->
<?php 
if(!isset($_SESSION)){ session_start(); }
	$busca=(
		    ( isset($_SESSION['identification']) )&&
	        ( isset($_SESSION['dr_user']       ) )
	                                                 )?$_SESSION['identification'].$_SESSION['dr_user']: "";
	
	if ((!isset($_SESSION['identification']))or(!isset($_SESSION['dr_user']))) { return ;}
 
?>
<script type="text/javascript">

	PreLoadDataInView('#left_wind', '&modelo=Interrogation&url=consultation.list&_method=get&findit={{$busca}}', 'FindConsultation');

</script>