<?php use App\Interrogation;
  if(!isset($_SESSION)){session_start();}
  $idAct=(isset($_SESSION['identification'])) ?$_SESSION['identification'] : ""; 
?>

<?php function dateString($fecha) {

    $monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
      $year=substr($fecha,0, 4);
      $dia=substr($fecha,8, 2);
      $mes=substr($fecha,5, 2);
      return $year.' ('.$dia.' '.$monthNames[$mes-1].')'; 
}
?>

 @if (isset($patient))
           <?php  
              $identification="000";
             ?>
 @else         
           <?php    
              $patient[]=new Interrogation;
              if (!isset($id)) {$id="";}           
            ?>
@endif

<?php $fecha=(isset($patient[0]->created_at))? substr($patient[0]->created_at,0, 10):''; 
      $hoy= date("Y-m-d"); ?>
                            @if (!($hoy==$fecha))
                            
                              <div id="botonNewconsulta">
                                <a href="javascript:AbreConsulta('#Interrogation','consultation.interrogation')" class="list-group-item" style="background: #9DF3AF;" id="nuevaconsulta">
                                  <div>(New) {{$hoy}}</div>  
                                </a>
                              </div>
                            @endif

<div class="row" style="margin: 0px auto;">
  @csrf 
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" id='ConsultMyList'> 
  <strong><h3>Consultation List</h3></strong>
  <?php $i=0; 
  
   if (!isset($patient[0])) {return;}
  ?>
   @foreach($patient as $patmt)
                          <?php    
                              $idt=$patmt->identification;
                              $idC=$patmt->id;
                              $fecha=substr($patmt->created_at,0, 10); 
                              $test=$idC;
                              $i=$i+1; 

                              ?>

                              <script type="text/javascript">
                                  var elemento=[];
                                  elemento[0]='<?php echo dateString($fecha); ?>'  ;
                                  elemento[5]="javascript:CargaConsulta(\"#Interrogation\", \"&findit=<?php echo $idC; ?>&identification=&id=<?php echo $idC; ?>\", \"flexlist\")";
                                  elemento[6]='<?php echo "linea".$idC; ?>';

                                  var accion=ButtonString(elemento,"background:#0099D1; color: #C4D5F3;  font-size:1.2em;");
                                  $('#ConsultMyList').append(accion);
                              </script>
                             
                           
              @endforeach
</div> 
</div>
<!--
<a href="javascript:CargaConsulta('#Interrogation', '&findit={{$idC}}&identification=&id={{$idC}}', 'flexlist');" class="list-group-item"  id="linea{{$idC}}" style=" background: #0099D1; color: #C4D5F3;">
                                  <div style="background: #0099D1;">{{$fecha}}</div>  
                            </a>  -->