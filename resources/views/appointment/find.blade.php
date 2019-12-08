<?php  
      if(!isset($_SESSION)){ session_start(); }
      use App\Login;
      $date=date("Y-m-d");
?>
@include('appointment.appFunction')

 @if (isset($patient))
           <?php 

                $date=(isset($patient[0]))?$patient[0]->date:$patient->date;  
           ?>
@endif


<div class="row" style="margin: 0px auto;">
  @csrf 
  <div class="navbar-fixed">
          <form id="appointmentfind" class="navbar-form navbar-left" action="javascript:LoadDataInView('appointment_find', 'appointmentfind','findAppoinment')">
          @csrf
        
          <input type="hidden" name="url"  value='appointment.find'>

          <input type="hidden" name="modelo" id="modelo" value="Appointment" />
          <input type="hidden" name="_method" value="get">

          <div class="form-group" style="padding-right: 40px;">
            <label>Physician:</label>
            <select name="dr_code" id="setDr_code" onchange="javascript:submit()" required >
              <?php 
                $Doctor=Login::where('speciality','<>','0')->orderBy('surname')->get();
              ?>
              @foreach($Doctor as $drptn)
                  <?php 
                     echo ("<option value='".$drptn->user."' >".$drptn->surname."</option>");
                   ?>                               
              @endforeach
            </select>
          </div>

          <div class="form-group" style="padding-right: 40px;">
            <label>Date:</label>
            <input type="date" name="date" id="setDate" class="form-control" value="{{$date}}" onchange="javascript:submit()()" required>
          </div>

        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> Spaces</button>
      </form>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                                <div style="width: 100%; height: 30px; margin-top: 10px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px;">
                                    <div class="form-inline FormInline  blnc" style="width:15%;">Time</div>
                                    <div class="form-inline FormInline  blnc" style="width:35%;">Patient</div> 
                                    <div class="form-inline FormInline  blnc" style="width:50%;">Details</div>
                                </div>  <br>   
                                 
      <div id="rejilla" style="height: 490px; max-height: 490px; overflow: auto;"></div>
  </div> 
</div>



@if (isset($patient)) 

   <script type="text/javascript">AppointArray(0);</script>
   @if (isset($patient[0]->dr_code))    <?php $dr_code=$patient[0]->dr_code ?>   @endif
   @if (isset($patient->dr_code))       <?php $dr_code=$patient->dr_code ?>      @endif
     

   <script type="text/javascript">  $('#setDr_code').val('<?php echo $dr_code; ?>'); </script>
@endif

@if (isset($patient[0])) 
   @foreach($patient as $patmt)
    <script type="text/javascript">LoadAppnt('<?php echo $patmt ?>',0);</script>                               
   @endforeach
@endif

<div id="citaVTN" class="Appointment" hidden>
  <a href="#" onclick="javascript:$('#citaVTN').hide()" style="float: right; color: black;" class="btn btn-default glyphicon">X</a>
  <form id="MyPPNTMNT" action="javascript:SaveAndListUpdate()" method="post">
    @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="url"  value='appointment.find'>
    <input type="hidden" name="modelo"  value='Appointment'>

    <input type="hidden" name="id" id="appID" value="">
    <input type="hidden" name="dr_code" id="appDr_code"> 
    <input type="hidden" name="user" value="{{$_SESSION['dr_user']}}"> <!--  Codigo del Usuario que registra la sita -->

    <label>Time: </label>
    <input type="time" id="appTime" name="time" required readonly>
    <label>Date: </label>
    <input type="date" id="appDate" name="date" required readonly><br><br>
    <div style="float: left;">
      <label>ID: </label>
      <input type="text" name="identification" 
                         id="appIdentification"
                         autofocus 
                         required 
                         onchange="javascript: UpdateID()" 
                         ondblclick="javascript:FindPatient('appPName,name,appPName,surname,appIdentification,identification')"
                         onclick="javascript:FindPatient('appPName,name,appPName,surname,appIdentification,identification')"
                         placeholder="Patient identification" 
                         autocomplete="off" > 
    </div> <br><br><br>
    <div>
      <div style="float: left; padding-right: 10px;">
        <label>Name: </label>
      </div>
      <div style="color:white; font-size: large; margin: 20px; margin-top: -10px;" id="appPName"></div>
    </div>
    
    
    <div style="margin-top: 50px;">
      <label>Appointment details</label>
      <textarea style="width: 100%; height: 200px; color: black;" id="appDetails" name="details">
        
      </textarea>
    </div>
    <div>
    <div  style="text-align: center; width: 50%; float: left;" >
        <button type="submit" class="btn btn-success glyphicon glyphicon-floppy-save" id="appSalvar"> Save</button>
    </div>
    </div>
  </form>

    <div  style="text-align: center; width: 50%;  float: left;"  >
        <button type="Delete" onclick="javascript: DelAppointment()" class="btn btn-danger glyphicon glyphicon-trash " id="appDelete"> Delete</button>
    </div>


</div>                


