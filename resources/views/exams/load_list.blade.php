<!--Carga el listado de Examenes del paciente.  -->
<?php 
if(!isset($_SESSION)){ session_start(); }
	$busca=(
		    ( isset($_SESSION['identification']) )&&
	        ( isset($_SESSION['dr_user']       ) )
	                                                 )?$_SESSION['identification'].$_SESSION['dr_user']: "";
	
	if ((!isset($_SESSION['identification']))or(!isset($_SESSION['dr_user']))) { $busca='' ;}
 
 $busca=($_SESSION['speciality']==15)?$_SESSION['identification']:$busca; //15 es LABORATORIO

?>
<script type="text/javascript">

if (!({{$busca}})) { window.location="/userlogout"; }

if ({{$_SESSION['speciality']}}==15) {
		 var data='&modelo=Exams&url=exams.list&_method=get&option=0&findit={{$busca}}';	
		 RefreshDataInView('#center_wind',data,'flexlist','exams.list');
		 $("#btnxmsrealizados").remove();
		 $("#btnxmssolicitados").remove();
} 	else {
		
		var data='&modelo=Exams&url=exams.list&_method=get&findit={{$busca}}';
 		RefreshDataInView('#center_wind', data, 'flexlist','exams.list');

 		data="&modelo=Exams&url=exams.list&_method=get&option=1&findit=.&identification={{$_SESSION['identification']}}";
 		$("#btnxmsrealizados").attr("onclick","RefreshDataInView('#center_wind','"+data+"', 'flexlist','exams.list')");
		data="'&modelo=Exams&url=exams.list&_method=get&option=0&findit={{$busca}}'";
		$("#btnxmssolicitados").attr("onclick","RefreshDataInView('#center_wind',"+data+", 'flexlist','exams.list')");
}

</script>

