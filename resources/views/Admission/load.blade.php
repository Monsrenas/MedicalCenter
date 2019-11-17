<script type="text/javascript">
		NewPreLoadDataInView('#center_wind', '&modelo=Admission&url=Admission.admission&identification=<?php echo $_SESSION['identification']?>', 'find','Admission.admission');
		$("#btnAdmission_discharge").attr("onclick","NewPreLoadDataInView('#center_wind', '&modelo=Admission&url=Admission.discharge&identification=<?php echo $_SESSION['identification']?>', 'find','Admission.discharge');")
</script>