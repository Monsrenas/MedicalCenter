<style type="text/css">
	.ambas {
		width: 100%;
	}

	
</style>
<div>
	<strong>Physical Examination</strong>
<div class="ambas" id='superior' style="max-height: 400px; height: 400px; overflow: auto;">
	
</div>
</div>
<div class="ambas" id='inferior'>

<div class="row" style="margin: 0px auto;">
  @csrf 
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" > 
  <strong>Physical Examination List</strong><br>
  <?php $i=0;?>
   @foreach($patient as $patmt)
                          <?php    
                              $idt=$patmt->identification;
                              $idC=$patmt->id;
                              $fecha=substr($patmt->created_at,0, 10); 
                              $test=$idC;
                              $i=$i+1; 
                              ?>

 							  <a href="javascript:PreLoadDataInView('#superior', '&modelo=Physical&url=consultation.PhysicalExamination&id={{$idC}}&findit={{$idC}}', 'findbyId');" class='btn pebt'  id="linea{{$idC}}" style=" background: #738CC3; color: #C4D5F3;">
                              <div  style="background: #738CC3;">{{$fecha}}</div>  
                            </a> 
  
              @endforeach
</div> 
</div>	
</div>

<script type="text/javascript">
	$(".pebt" ).click(function() {  
  		$(".pebt" ).css("color", "#C4D5F3");
  		$(".pebt" ).css("height", "32px");
  		$(this).css("color", "black");
  		$(this).css("height", "40px");		
	});
</script>


 @if (!isset($patient))
       <?php return ?>
@endif

