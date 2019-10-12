<?php use App\Interrogation; ?>

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
                    PreLoadDataInView('#left_wind', '&modelo=Interrogation&url=consultation.list', 'find');
            </script>  
@endif
<div class="row" style="margin: 0px auto;">
  @csrf 
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" > 
  <strong><h3>Consultation List</h3></strong>
  <?php $i=0; ?>
   @foreach($patient as $patmt)
                          <?php    
                              $idt=$patmt->identification;
                              $fecha=substr($patmt->created_at,0, 10); 
                              $i=$i+1; ?>
                              
                             <a href="javascript:cambiaPaciente({{$idt}})" class="list-group-item"  id="linea{{$idt}}">
                                  <div>{{$fecha}}</div>  
                            </a>
                           
              @endforeach
</div> 
</div>