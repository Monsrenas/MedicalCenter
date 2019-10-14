<?php use App\Interrogation;
  if(!isset($_SESSION)){session_start();}
  $idAct=(isset($_SESSION['identification'])) ?$_SESSION['identification'] : ""; 
?>

 @if (isset($patient))
           <?php $identification="000";
             

             ?>
 @else         
           
           <?php    

            $patient[]=new Interrogation;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
             
             
            ?>

            <script type="text/javascript">
    PreLoadDataInView('#left_wind', '&findit={{$idAct}}&modelo=Interrogation&url=consultation.list', 'flexlist');
            </script>  
@endif

<?php $fecha=substr($patient[0]->created_at,0, 10); 
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
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" > 
  <strong><h3>Consultation List</h3></strong>
  <?php $i=0;?>
   @foreach($patient as $patmt)
                          <?php    
                              $idt=$patmt->identification;
                              $fecha=substr($patmt->created_at,0, 10); 
                              $i=$i+1; 
                              ?>
                              

                             <a href="javascript:PreLoadDataInView('#Interrogation', '&modelo=Interrogation&findit={{$idt}}&url=consultation.interrogation', 'flexlist');" class="list-group-item"  id="linea{{$idt}}">
                                  <div>{{$fecha}}</div>  
                            </a>
                           
              @endforeach
</div> 
</div>
