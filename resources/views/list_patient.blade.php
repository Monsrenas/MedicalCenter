<?php $identification=''; ?>

<style type="text/css">
        .patientList-item  {background: #7190C6; }
        .formPatient  { font-family: arial, helvetica, sans-serif; 
                 margin-top: 0px;
                 margin-bottom: 0px;
                 color: #000000;
                }

        .patientList-item  a:hover { color: black; background: blue; }

        .formGrupPatient  { font-family: arial, helvetica, sans-serif; 
                 margin-right: 0px;
                 margin-left: 0px;
                }
        .mio { width: 35px; height: 35px; background: #7190C6; border: none;}
        .blnc {font-size: large; float:left; color: white;}
    </style>

<div class="row" style="margin: 0px auto;">
  @csrf 
        <div class="navbar-fixed">
                <form id="busqueda" class="navbar-form navbar-left" action="javascript:LoadDataInView('list_patient', 'busqueda','list')">
                @csrf
                <input type="hidden" name="url"  value='list_patient'>
                <input type="hidden" name="enlace"  value='list_patient'>   
                <input type="hidden" name="modelo" id="modelo" value="Patient" />
                <input type="hidden" name="_method" value="get">

                <div class="form-group formGrupPatient ">
                  <input type="text" name="findit" class="form-control" placeholder="Search">
                </div>
              <button type="submit" class="btn btn-default glyphicon glyphicon-search"> Patient</button>
            </form>
        </div>
            
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                              <div style="width: 100%; height: 30px; margin-top: 10px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px;">
                              
                                  <div class="form-inline formPatient  blnc" style="width:160px;">Identification</div> 
                                  <div class="form-inline formPatient  blnc" style="">Surname,  Name</div>
                                 
                              </div>  <br>    
  <?php 
    if (!(isset($patient))) {return;}


    $i=0; 
  ?>
   @foreach($patient as $patmt)
                  
                          <?php 
                              $stringpat=$patmt->surname.', '.$patmt->name.' '.$patmt->age;
                              $StrURL='PatienCng/'.$patmt->identification;
                              $idt=$patmt->identification;
                              $status=(isset($patmt->status))?$patmt->status:'0';
                              $status=($status=='1')?'Hospitalized':'';
                              $i=$i+1; ?>
                              
                             <a href="javascript:cambiaPaciente('edl{{$idt}}')" class="list-group-item patientList-item " style="height: 50px;" id="linea{{$idt}}">
                              
                                  <div class="form-inline formPatient " style="float:left; width:140px; text-align: right; padding-right: 20px;">{{$patmt->identification}}</div> 
                                  <div class="form-inline formPatient " style="float: left; width:440px; text-align: left;">{{$stringpat  }}</div>
                                  <div class="form-inline formPatient " style="float: left; color: yellow;">{{$status}}</div>
                                 @if (2==2)    
                                  <div class="form-inline formPatient " style="float: right;">
                                    <form class="form-inline formPatient " action="javascript:elimina('D{{$idt}}','linea{{$idt}}')" id='D{{$idt}}' >
                                      @csrf
                                      <input type="hidden" name="modelo" id="modelo" value="Patient" />
                                      <input type="hidden" name="_method" value="post">
                                      <input type="hidden" name="identification" value='{{$idt}}'> 

                                      <button type="submit" class="btn btn-default glyphicon glyphicon-trash btn-danger mio"></button>
                                    </form>
                                  </div>
                                  @endif 

                                  @if (100>1)
                                  <div class="form-inline formPatient " style="float: right; margin-right: 10px;">
                                    <form class="form-inline formPatient " id='edl{{$idt}}' action="javascript:LoadDataInView('edit_patient','edl{{$idt}}','find')">
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




                                