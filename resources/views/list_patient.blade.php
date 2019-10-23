<?php $identification=''; ?>

<?php use App\Patient; ?>

 @if (isset($patient))
           <?php $identification="000";  ?>
 @else         
           <?php                     
            $patient[]=new Patient;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif
<style type="text/css">
        .list-group-item {background: #7190C6; }
        .form-inline { font-family: arial, helvetica, sans-serif; 
                 margin-top: 0px;
                 margin-bottom: 0px;
                 color: #000000;
                }

        .list-group-item a:hover { color: black; background: blue; }

        .form-group { font-family: arial, helvetica, sans-serif; 
                 margin-right: 0px;
                 margin-left: 0px;
                }
        .mio { width: 35px; height: 35px; background: #7190C6; border: none;}
    </style>
<div class="row" style="margin: 0px auto;">
  @csrf 
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" > 
  <?php $i=0; ?>
   @foreach($patient as $patmt)
                  
                          <?php 
                              $stringpat=$patmt->surname.', '.$patmt->name.' '.$patmt->age;
                              $StrURL='PatienCng/'.$patmt->identification;
                              $idt=$patmt->identification;
                              $i=$i+1; ?>
                              
                             <a href="javascript:cambiaPaciente('edl{{$idt}}')" class="list-group-item" style="height: 50px;" id="linea{{$idt}}">
                              
                                  <div class="form-inline" style="float:left; width:130px;">{{$patmt->identification}}</div> 
                                  <div class="form-inline" style="float: left;">{{$stringpat  }}</div>
  
                                 @if (2==2)    
                                  <div class="form-inline" style="float: right;">
                                    <form class="form-inline" action="javascript:elimina('D{{$idt}}','linea{{$idt}}')" id='D{{$idt}}' >
                                      @csrf
                                      <input type="hidden" name="modelo" id="modelo" value="Patient" />
                                      <input type="hidden" name="_method" value="post">
                                      <input type="hidden" name="identification" value='{{$idt}}'> 

                                      <button type="submit" class="btn btn-default glyphicon glyphicon-trash btn-danger mio"></button>
                                    </form>
                                  </div>
                                  @endif 

                                  @if (100>1)
                                  <div class="form-inline" style="float: right; margin-right: 10px;">
                                    <form class="form-inline" id='edl{{$idt}}' action="javascript:LoadDataInView('edit_patient','edl{{$idt}}','find')">
                                      @csrf
                                        <input type="hidden" name="modelo" id="modelo" value="Patient" />
                                        <input type="hidden" name="url" id="url" value="edit_patient" />
                                        <input type="hidden" name="_method" value="get">
                                        <input type="hidden" name="identification" value='{{$idt}}'> 

                                      <button type="submit" class="btn btn-default glyphicon glyphicon-pencil mio"></button>
                                    </form>
                                  </div>
                                  @endif 
                            </a>
                           
              @endforeach
</div> 
</div>