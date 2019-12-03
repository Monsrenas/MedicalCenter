<?php  
      if(!isset($_SESSION)){ session_start(); }
  
?>
@include('funciones')

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
        .mio { width: 35px; height: 37px; background: #7190C6; border: none;}
        .blnc {font-size: large; float:left; color: white; overflow: hidden; }
        .dbd {overflow: hidden; max-height: 29px;}
    </style>

<div class="row" style="margin: 0px auto;">
  @csrf 
        <div class="navbar-fixed">
                <form id="appointmentfind" class="navbar-form navbar-left" action="javascript:LoadDataInView('appointment_find', 'appointmentfind','find')">
                @csrf
              
                <input type="hidden" name="url"  value='appointment.find'>

                <input type="hidden" name="modelo" id="modelo" value="Appointment" />
                <input type="hidden" name="_method" value="get">

                <div class="form-group" style="padding-right: 40px;">
                  <label>Physician:</label>
                  <select name="dr_code" required >
                    <option value="44240514037" >Estenos Martinez, Alicia</option>
                    <option value="613675132765" >Jervacio Pena, Jhom</option>
                    <option value="doctor1" >Diaz Soveron, Eulogio</option>
                    <option value="doctor2" >Numero dos, Doctor</option>
                  </select>
                </div>

                <div class="form-group" style="padding-right: 40px;">
                  <label>Date:</label>
                  <input type="date" name="Date_from" class="form-control" placeholder="Search" required>
                </div>

              <button type="submit" class="btn btn-default glyphicon glyphicon-search"> Spaces</button>
            </form>
        </div>
            
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                              <div style="width: 100%; height: 30px; margin-top: 10px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px;">
                              
                                  <div class="form-inline blnc" style="width:15%;">Time</div>
                                  <div class="form-inline blnc" style="width:35%;">Patient</div> 
                                  <div class="form-inline blnc" style="width:50%;">Details</div>
                                  
                                 
                              </div>  <br>    
  <div id="rejilla"></div>

<script type="text/javascript">
function AppointArray(){

    var hr=8;



    for (var i = 0; i < 12; i++) {
      for (var j = 0; j <= 45; j++) {
        hds=hr+i;
        $hora="<a href='#' class='list-group-item'> <div style='width: 100%; text-align: left; padding-left: 4px;'>"+(hds+':'+j+'<br>')+"</div></a>";
        $('#rejilla').append($hora);
        j=j+14;

      }
    }


}

  AppointArray();
</script>

  <?php
    if (!(isset($patient))) {return;}
    

    $i=0; 
  ?>
   @foreach($patient as $patmt)
                  
                          <?php 
                              
                              $idt=$patmt['identification'];
                              
                              $svc=$Service_Description[$patmt['code']];
                              
                              $dat=dateString($patmt['date']);
                              $dct=$patmt['id'];

                              $dtl=$patmt['details'];

                              $i=$i+1; 
                              ;
                              ?>
                              
                             <a href="#" class="list-group-item" style="height: 28px; margin-top: 1px; padding-top: 1px;" id="linea{{$idt}}">
                              
                                  <div class="form-inline" style="float: left; width:15%; text-align: left;">{{$dat  }}</div>
                                  <div class="form-inline" style="float:left; width:20%; text-align: left; padding-right: 20px;">{{$svc}}</div> 
                                  <div class="form-inline" style="float:left; width:50%; max-width: 50%; max-height: 25px; font-size:xx-small; text-align:left; overflow: hidden;">{{$dtl}}</div>
                                  <div class="form-inline" style="float: left; width:10%; overflow: hidden; font-size:xx-small;">{{$dct}}</div>
                                  
                            </a>
                           
              @endforeach
</div> 
</div>


  


                                