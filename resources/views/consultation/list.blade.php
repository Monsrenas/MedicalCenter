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


<div class="row" style="margin: 0px auto;">
  @csrf 
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" id='ConsultMyList'> 
  <strong><h3>Consultation List</h3></strong> 
  <?php $i=0; 
    $lst=[0=>['Intr','CSL'],1=>['Phs','FXM'],2=>['Exm','LXM']];

  $hoy=date("Ymd");
  ?>

                            @if (!(isset($patient[$hoy])))
                              
                              <script type="text/javascript">
                                  var elemento=[];
                                  elemento[0]='<strong>NEW</strong>'  ;
                                  elemento[5]="javascript:AbreConsulta(\"#Interrogation\",\"consultation.interrogation\")";
                                  elemento[6]='botonNewconsulta';
                                  var myStyles="background:#9DF3AF; color: black;  font-size:1.0em; width: 112%"
                                  var accion=ButtonString(elemento,myStyles);
                                  $('#ConsultMyList').append(accion);
                              </script>

                            @endif


  <?php 
      
       if (!count($patient)) {return;}
      ?>
   @foreach($patient as $patmt)
                          <?php    

                              $idt=$patmt['identification'];
                              $idC=$patmt['id'];
                              $fecha=$patmt['date']; 
                              $test=$idC;
                              $i=$i+1; 
                              $cad="<div style=\"   float:right; padding:0;\">";
                              for ($s=0; $s <3 ; $s++) { 
                                if (isset($patmt['service'][$s]) ) {$clr=' Blue;';} else {$clr='gray;';}

                                $cad=$cad."<div  style=\"overflow: hidden; height: 3px; max-height: 25px; width:25px; max-width: 30px; margin-top: 2px; background:".$clr." color:".$clr." \"><strong>.</strong></div>";

                                
                                
                                }
                              $cad=$cad."</div>";                            

                              ?>



                              <script type="text/javascript">
                                  var elemento=[];
                                  elemento[0]='<?php echo dateString($fecha); ?> '+'<?php echo $cad ?>'  ;
                                  elemento[5]="javascript:CargaConsulta(\"#Interrogation\", \"&findit=<?php echo $idC; ?>&identification=&id=<?php echo $idC; ?>\", \"flexlist\")";
                                  elemento[6]='<?php echo "linea".$idC; ?>';
                                  var myStyles="background:#0099D1; color: #C4D5F3;  font-size:1.0em; width: 112%"
                                  var accion=ButtonString(elemento,myStyles);
                                  $('#ConsultMyList').append(accion);
                              </script>
                           
              @endforeach
</div> 
</div>
<!--
<a href="javascript:CargaConsulta('#Interrogation', '&findit={{$idC}}&identification=&id={{$idC}}', 'flexlist');" class="list-group-item"  id="linea{{$idC}}" style=" background: #0099D1; color: #C4D5F3;">
                                  <div style="background: #0099D1;">{{$fecha}}</div>  
                            </a>  



                            <div style=\"float: right\">- </div>






                              <div id="botonNewconsulta">
                                <a href="javascript:AbreConsulta('#Interrogation','consultation.interrogation')" class="list-group-item" style="background: #9DF3AF;" id="nuevaconsulta">
                                  <div>(New) {{$hoy}}</div>  
                                </a>
                              </div>

                            -->