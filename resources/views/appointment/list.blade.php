<?php 
	use App\Login;
	use App\Appointment;
	$date=date("Y-m-d");
	$DRconAppoin=Appointment::where('date','>=', $date )->orderBy('date')->get();
	
?>
@include('appointment.tree')	



  
   
                                    
<script type="text/javascript">
function ApponintmentArbol(op) {

	$byDr='<a class=\"btn btn-default\" style=\"margin-left:20px;\"  href=\"javascript:ApponintmentArbol(1)\">Doctor</a>';
	$byDt='<a class=\"btn btn-default\" href=\"javascript:ApponintmentArbol(0)\">Date</a>';
 $('#notelayout').remove();
		$('#left_wind').append('<div hidden id=\"notelayout\"><br><br> <strong style=\"margin-left:20px;\">Appointments by:<br><br>'+$byDr+' or '+$byDt+'</strong><br><br><div class=\"MyAppListTree\"><ul id=\"appointmentList\"></ul></div></div>')	
 @foreach($DRconAppoin as $patmt)
	addDoctor('<?php echo $patmt->date; ?>', '<?php echo $patmt->dr_code; ?>',op)
@endforeach
$('#notelayout').show();
}

ApponintmentArbol(arbolStyle);
</script>
   