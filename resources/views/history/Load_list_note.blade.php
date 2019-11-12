<?php 
if(!isset($_SESSION)){ session_start(); }

	$busca=(
		    ( isset($_SESSION['identification']) )&&
	        ( isset($_SESSION['dr_user']       ) )
	                                                 )?$_SESSION['identification'].$_SESSION['dr_user']: "";
	$hoy=date("Y-m-d");  $actual=str_replace("-", "", $hoy);
	$actual=$actual.$busca;
	if ((!isset($_SESSION['identification']))or(!isset($_SESSION['dr_user']))) { return ;}
 	
?>
<script type="text/javascript">
 RefreshDataInView('#center_wind', '&modelo=Physiciansnote&url=history.PhysiciansNote&_method=get&findit={{$busca}}', 'flexlist','history.PhysiciansNote');
 
 $("#btnhistory_PhysiciansNote").attr("onclick","RefreshDataInView('#center_wind', '&modelo=Physiciansnote&url=history.PhysiciansNote&_method=get&findit={{$busca}}', 'flexlist','history.PhysiciansNote')");
 $("#btnhistory_Edit_note").attr("onclick","RefreshDataInView('#center_wind', '&modelo=Physiciansnote&url=history.Edit_note&_method=get&findit={{$actual}}', 'findbyId','history.Edit_note')");
</script>
