<!--Carga el listado de consultas del paciente. Load consultation list -->
<?php 
if(!isset($_SESSION)){ session_start(); }

if (isset($_SESSION['identification'])) { ?>
	<script type="text/javascript">NewPreLoadDataInView('#center_wind', '&modelo=Patient&url=patient_info', 'find','patient_info');</script>	
 
 <?php 
 return; 
} 
?>

<script type="text/javascript">
	BuildMenu(" list_patient ",1);
</script>