/*Carga el listado de consultas del paciente. Load consultation list */
<?php 
if(!isset($_SESSION)){ session_start(); }
	$busca=(isset($_SESSION['identification']))?$_SESSION['identification'] : "";
 ?>

<script type="text/javascript">PreLoadDataInView('#left_wind', '&modelo=Interrogation&url=consultation.list&_method=get&findit={{$busca}}', 'flexlist');</script>