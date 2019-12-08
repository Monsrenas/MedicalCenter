<?php  
      if(!isset($_SESSION)){ session_start(); }
 
        
      $identification=$_SESSION['identification'];
      $Service_Description=['CSL'=>'Consultation', 'NTS'=>'Visitas Medicas','HPT'=>'Hospitalization','LXM'=>'Laboratory Exams','FXM'=>'Physical Examination'];
      
?>
@include('funciones')
<script type="text/javascript">
  function borrarprevio() {
    $('#frreport_searche').remove();
  }

</script>


<style type="text/css">
        .myRSListGroupItem  {background: #7190C6; }
        .myRSFormInline  { font-family: arial, helvetica, sans-serif; 
                 margin-top: 0px;
                 margin-bottom: 0px;
                 color: #000000;
                }

        .myRSListGroupItem  a:hover { color: black; background: blue; }

        .myRSFormGroup  { font-family: arial, helvetica, sans-serif; 
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
                <form id="reportsearche" class="navbar-form navbar-left" action="javascript:LoadDataInView('report_searche', 'reportsearche','facturacion')">
                @csrf
                <input type="hidden" name="identification" value="{{$identification}}">
                <input type="hidden" name="url"  value='report.searche'>

                <input type="hidden" name="modelo" id="modelo" value="Interrogation" />
                <input type="hidden" name="_method" value="get">

                <div class="form-group myRSFormGroup ">
                  <label>From:</label>
                  <input type="date" name="Date_from" class="form-control" placeholder="Search">
                </div>
                <div class="form-group myRSFormGroup " style="margin-left: 15px; margin-right: 20px;">
                  <label> To:</label>
                  <input type="date" name="Date_to" class="form-control" placeholder="Search">
                </div>
              <button type="submit" class="btn btn-default glyphicon glyphicon-search"> Services</button>
            </form>
        </div>
            
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                              <div style="width: 100%; height: 30px; margin-top: 10px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px;">
                              
                                  <div class="form-inline myRSFormInline  blnc" style="width:15%;">Date</div>
                                  <div class="form-inline myRSFormInline  blnc" style="width:20%;">Service</div> 
                                  <div class="form-inline myRSFormInline  blnc" style="width:50%;">Details</div>
                                  <div class="form-inline myRSFormInline  blnc" style="width:10%; ">Doctor</div>
                                 
                              </div>  <br>    
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
                              
                             <a href="#" class="list-group-item myRSListGroupItem " style="height: 28px; margin-top: 1px; padding-top: 1px;" id="linea{{$idt}}">
                              
                                  <div class="form-inline myRSFormInline " style="float: left; width:15%; text-align: left;">{{$dat  }}</div>
                                  <div class="form-inline myRSFormInline " style="float:left; width:20%; text-align: left; padding-right: 20px;">{{$svc}}</div> 
                                  <div class="form-inline myRSFormInline " style="float:left; width:50%; max-width: 50%; max-height: 25px; font-size:xx-small; text-align:left; overflow: hidden;">{{$dtl}}</div>
                                  <div class="form-inline myRSFormInline " style="float: left; width:10%; overflow: hidden; font-size:xx-small;">{{$dct}}</div>
                                  
                            </a>
                           
              @endforeach
</div> 
</div>



                                