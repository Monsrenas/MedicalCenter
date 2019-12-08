<?php  
      if(!isset($_SESSION)){ session_start(); }
      use App\Appointment;
      $dr_name=$_SESSION['username'];
      $date=date("Y-m-d");  $stime=substr(date("Y-m-d h:i:s"), 11);
      $DoneDate=$date;  $DoneTime=$stime;

      $dr_user=$_SESSION['dr_user'];
      
      if (!(isset($patient))) {$MYpatient=Appointment::where('date', $date )->where('dr_code', $dr_user )->orderBy('time')->get();}
      else {$MYpatient=$patient;}
         
?>
@include('appointment.appFunction')

 @if (isset($MYpatient))
            <?php
               
              $date=(isset($MYpatient[0]))? $MYpatient[0]->date  :  $date;
              (isset($MYpatient->date))? $MYpatient->date : $date;  
                            
           ?>
@endif


<div class="row" style="margin: 0px auto;">
  @csrf 
  <div class="navbar-fixed">
          <form id="appointmentdone" class="navbar-form navbar-left" action="javascript:LoadDataInView('appointment_done', 'appointmentdone','findAppoinment')">
          @csrf
                  
          <input type="hidden" name="url"  value='appointment.done'>

          <input type="hidden" name="modelo" id="modelo" value="Appointment" />
          <input type="hidden" name="_method" value="get">

          <div class="form-group" style="padding-right: 40px;">
            <label>Physician:</label>
            <input type="hidden" name="dr_code" id="mYappDr_code" value="{{$_SESSION['dr_user']}}"> {{$dr_name}}
          </div>



          <div class="form-group" style="padding-right: 40px;">
            <label>Date:</label>
            <input type="date" name="date" id="mYsetDate" class="form-control" value="{{$date}}" onchange="javascript:submit()()" required>
          </div>

        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> Appointments</button>
        <strong> <span style="margin-left: 20px;"> List for execution of medical appointments </span> </strong>
      </form>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                                <div style="width: 100%; height: 30px; margin-top: 10px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px;">
                                    <div class="form-inline FormInline  blnc" style="width:15%;">Time</div>
                                    <div class="form-inline FormInline  blnc" style="width:35%;">Patient</div> 
                                    <div class="form-inline FormInline  blnc" style="width:50%;">Details</div>
                                </div>  <br>   
                                 
      <div id="mYrejilla" style="height: 490px; max-height: 490px; overflow: auto;"></div>
  </div> 
</div>


@if (isset($MYpatient)) 
   <script type="text/javascript">AppointArray(1);</script>
   @if (isset($MYpatient[0]->dr_code))    <?php $dr_code=$MYpatient[0]->dr_code ?>   @endif
   @if (isset($MYpatient->dr_code))       <?php $dr_code=$MYpatient->dr_code ?>      @endif
@endif
  
@if (isset($MYpatient[0])) 
   @foreach($MYpatient as $patmt)
      <?php  $regist=json_encode($patmt);  ?> 
    <script type="text/javascript">LoadAppnt('<?php echo $regist?>',1);</script>                               
   @endforeach
@endif   

<form id="DoneAppointment" action="javascript:SaveAppointmentDone('DoneAppointment','IDstore');" method="post">
    @csrf
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="url"  value='appointment.done'>
    <input type="hidden" name="modelo"  value='Appointment'>

    <input type="hidden" name="id" id="doneappID" value="">

    <input type="time" id="DoneappTime" name="time_done" value="{{$DoneTime}}" required readonly hidden>
    <input type="date" id="DoneappDate" name="date_done" value="{{$DoneDate}}" required readonly hidden>
    <input type="hidden" id="DoneappStatus" name="status" value="1">
  </form>            


