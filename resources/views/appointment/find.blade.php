<?php  
      if(!isset($_SESSION)){ session_start(); }
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
              <option value="44240514037" >Estenos Martinez, Alicia</option>
              <option value="613675132765" >Jervacio Pena, Jhom</option>
              <option value="doctor1" >Diaz Soveron, Eulogio</option>
              <option value="doctor2" >Numero dos, Doctor</option>
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
                                    <div class="form-inline blnc" style="width:15%;">Time</div>
                                    <div class="form-inline blnc" style="width:35%;">Patient</div> 
                                    <div class="form-inline blnc" style="width:50%;">Details</div>
                                </div>  <br>   
                                 
      <div id="rejilla" style="height: 490px; max-height: 490px; overflow: auto;"></div>
  </div> 
</div>



@if (isset($patient)) 

   <script type="text/javascript">AppointArray();</script>
   @if (isset($patient[0]->dr_code))    <?php $dr_code=$patient[0]->dr_code ?>   @endif
   @if (isset($patient->dr_code))       <?php $dr_code=$patient->dr_code ?>      @endif
     

   <script type="text/javascript">  $('#setDr_code').val('<?php echo $dr_code; ?>'); </script>
@endif

@if (isset($patient[0])) 
   @foreach($patient as $patmt)
    <script type="text/javascript">LoadAppnt('{{$patmt->time}}','{{$patmt->identification}}','{{$patmt->details}}');</script>                               
   @endforeach
@endif

<div id="citaVTN" class="Appointment"  style="position: fixed; height: 100; top:215px; right:2; width: 50%; text-align: left; background: blue; padding: 20px; opacity: 80%; color: yellow; margin-left: 100px;" hidden>
  <a href="#" onclick="javascript:$('#citaVTN').hide()" style="float: right; color: white;">Close</a>
  <form id="MyPPNTMNT" action="javascript:SaveAndListUpdate()" method="post">
    @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="url"  value='appointment.find'>
    <input type="hidden" name="modelo"  value='Appointment'>

    <input type="hidden" name="id" id="appID" value="">
    <input type="hidden" name="dr_code" id="appDr_code"> 
    <input type="hidden" name="user" value="{{$_SESSION['dr_user']}}"> <!--  Codigo del Usuario que registra la sita -->

    <label>Time</label>
    <input type="time" id="appTime" name="time" required>
    <label>Date</label>
    <input type="date" id="appDate" name="date" required><br><br>

    <div style="float: left;">
        <label>Patient identification</label>
        <input type="text" name="identification" style="color: black;" autofocus required onchange="javascript: UpdateID()" id="appIdentification" placeholder="Patient id"> 
    </div>
    <div style="float: left; margin-left: 10px; margin-top: 5px; font-size: small; " id="appPName"></div>
    
    <div style="margin-top: 50px;">
      <label>Appointment details</label>
      <textarea style="width: 100%; height: 200px; color: black;" id="appDetails" name="details">
        
      </textarea>
    </div>

     <?php include(app_path().'/Includes/SaveButton.html') ?>
  </form>

</div>                


