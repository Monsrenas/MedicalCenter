<script type="text/javascript">
	function fijafecha(dia, mes, year, espacio){
			var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
			$('#'+espacio).empty().append(dia+' '+monthNames[mes-1]+' '+year);
		}


	function soloNumeros(e,lmt)

	{
	    // capturamos la tecla pulsada
	   
	    var teclaPulsada=window.event ? window.event.keyCode:e.which;
	    // capturamos el contenido del input
	    var valor=lmt;	
	    if(valor.length<20)
	    {
	        // 13 = tecla enter
	        // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
	        // punto
	        if(teclaPulsada==13) { return false; }

				if(teclaPulsada==46) { return true; }
	        // devolvemos true o false dependiendo de si es numerico o no
	        return /\d/.test(String.fromCharCode(teclaPulsada));
	    }else{
	        return false;
	    }
	}	
	
	
</script>


<?php function dateString($fecha) {

		$monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
			$year=substr($fecha,0, 4);
			$dia=substr($fecha,8, 2);
			$mes=substr($fecha,5, 2);
			return $year.' ('.$dia.' '.$monthNames[$mes-1].')';	
}
?>