<?php 
if(!isset($_SESSION)){ session_start(); }

	$busca=(  ( isset($_SESSION['identification']) )&&
	          ( isset($_SESSION['dr_user']       ) )     )?$_SESSION['identification']: "";

    
	if ((!(isset($_SESSION['identification'])))or((!isset($_SESSION['dr_user'])))) { return ;}
 	
?>
<script type="text/javascript">
 RefreshDataInView('#center_wind', '&modelo=Physiciansnote&url=history.PhysiciansNote&_method=get&findit={{$busca}}', 'flexlist','history_Load_ALL_note');
</script>
