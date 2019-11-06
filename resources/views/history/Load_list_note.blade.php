<?php 
if(!isset($_SESSION)){ session_start(); }

	$busca=(
		    ( isset($_SESSION['identification']) )&&
	        ( isset($_SESSION['dr_user']       ) )
	                                                 )?$_SESSION['identification'].$_SESSION['dr_user']: "";
	
	if (!isset($_SESSION['identification'])) { return ;}
 	
?>
<script type="text/javascript">

 RefreshDataInView('#center_wind', '&modelo=Physiciansnote&url=history.PhysiciansNote&_method=get&findit={{$busca}}', 'flexlist','history.PhysiciansNote');
 
 $("#btnhistory_PhysiciansNote").attr("onclick","RefreshDataInView('#center_wind', '&modelo=Physiciansnote&url=history.PhysiciansNote&_method=get&findit={{$busca}}', 'flexlist','history.PhysiciansNote')");
</script>
