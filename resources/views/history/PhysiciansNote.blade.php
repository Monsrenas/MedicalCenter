<?php $identification=''; 
      $id='';
      $cdate=date("Y-m-d");
      $carbon = new \Carbon\Carbon();
?>

 @if (isset($patient))
           <?php $identification=(isset($patient->identification))?$patient->identification:'';
                 $id=(isset($patient->id))?$patient->id:'';  
           ?>
@endif

@include ('speciality')

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
        .blnc {font-size: large; float:left; color: white;}
        .colTx { float:left;
                font-size: xx-small; 
                max-height: 45px;
                overflow: hidden;
                padding: 0 1em 1em 1em;
                line-height: 1em;
                text-align: justify;  
              }
    </style>

<script type="text/javascript">
    var $speciality=(<?php echo json_encode(specialityName('')) ; ?>);
        $speciality['N']='Nurse';

     function colorEsp(cod){ 
        if (cod=='N'){color='yellow';} else  {color='green';}
        
        if (cod>1) {color='blue';}
        
      return color;  
     }

    function LoadUserData (esp, id) { 

      data=$('#formaAuziliar').serialize();
      data=data+'&user='+id;
      
      $.post('finduser', data, function(userInf){ 
        if (userInf.speciality){$txtcolor=colorEsp(userInf.speciality);}
        if (userInf.speciality=='N'){$SPname='Nurse'}else {$SPname=$speciality[userInf.speciality-1]}
        $cad="<spam style='font-size: xx-small; color:"+$txtcolor+"'>";
        $cad=$cad+$SPname+'<br>'+userInf.name+' '+userInf.surname;
        $cad=$cad+'</spam>';
        
        $('#'+esp).html($cad);  
      })
      


    }
</script>

<form  method="post" id="formaAuziliar">
    @csrf
    <input type="hidden" name="modelo" id="modelo" value="Login" />
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="noview" value="true">
</form> 

<div class="row" style="margin: 0px auto;">
  @csrf 
            
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                              <div style="width: 81%; height: 30px; margin-top: 5px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px; position: fixed; z-index: 1;">
                                  <div class="form-inline blnc" style="width: 15%;">Date</div>
                                  <div class="form-inline blnc" style="width: 17%;">Subjective</div>
                                  <div class="form-inline blnc" style="width: 16%;">Evolution</div> 
                                  <div class="form-inline blnc" style="width: 16%">Assessment</div>
                                  <div class="form-inline blnc" style="width: 16%;">Treatment</div>
                                  <div class="form-inline blnc" style="width: 7%">Medication</div>
                              </div>  <br><br>  

  <?php $i=0;   
    

  ?>
   @foreach($patient as $patmt)
                          <?php 
                              $dateFi = $carbon->createFromDate($cdate);
                              $dateIn = $carbon->createFromDate(substr($patmt->created_at,0, 10));
                              $antiguedad=date_diff($dateFi,$dateIn);
                              

                              $idt=$patmt->identification;

                              $tmi=strlen($idt);

                              $idN=$patmt->id;
                              $userid=strval(substr($idN, $tmi+8));
                              
                              $Editable=($userid==$_SESSION['dr_user'])?true:false;
                              $borrable=(($_SESSION['acceslevel']>3)and$Editable);
                              $i=$i+1;?>
                                            
                             <a href="javascript:ShowNote('userd{{$idN}}',{{$patmt}})" class="list-group-item" style="height: 70px;" id="mNota{{$idN}}">
                                  <div class="form-inline colTx" style="width: 15%; color: white; font-size:small;">{{substr($patmt->created_at,0,10)}}  
                                        
                                    <div id='userd{{$idN}}'>
                                      <script type="text/javascript">LoadUserData('userd{{$idN}}','{{$userid}}' )</script>
                                    </div>
                                  </div>
                                  
                                  <div class="form-inline colTx" style="width:17%;"><?php echo (isset($patmt->subjective)?$patmt->subjective:''); ?></div> 
                                  <div class="form-inline colTx" style="width:16%;"><?php echo (isset($patmt->evolution)?$patmt->evolution:''); ?></div>
                                  <div class="form-inline colTx" style="width:16%;"><?php echo (isset($patmt->assessment)?$patmt->assessment:''); ?></div>  
                                  <div class="form-inline colTx" style="width:16%;"><?php echo(isset($patmt->treatment)?$patmt->treatment:''); ?></div>
                                  <div class="form-inline colTx" style="width:7%;">
                                    <?php

                                      $ldrug=(isset($patmt->drug))?$patmt->drug:null;
                                      if ($ldrug) {
                                                                            for ($i = 0; $i < count($ldrug); $i++) { 
                                                                                echo('<li>'.(isset($ldrug[$i][0])?$ldrug[$i][0]:'-').'</li>');
                                                                            } }

                                    ?>
                                  
                                  </div>
  
                                 @if ($borrable)    
                                  <div class="form-inline" style="float: right;">
                                    <form class="form-inline" action="javascript:elimina('DNT{{$idN}}','mNota{{$idN}}')" id='DNT{{$idN}}' >
                                      @csrf
                                      <input type="hidden" name="modelo" id="modelo" value="Physiciansnote" />
                                      <input type="hidden" name="_method" value="post">
                                      <input type="hidden" name="id" value='{{$idN}}'> 

                                      <button type="submit" class="colTx btn btn-default glyphicon glyphicon-trash btn-danger mio"></button>
                                    </form>
                                  </div>
                                  @endif 

                                  @if ($Editable)
                                  <div class="form-inline" style="float: right; margin-right: 10px;">
                                    <?php $xdata='&modelo=Physiciansnote&url=history.Edit_note&method=get&findit='.$idN; ?>
                                    <form class="form-inline" id='edl{{$idN}}' action="javascript:RefreshDataInView('#center_wind','{{$xdata}}','findbyId','history.Edit_note')">
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-pencil mio"></button>
                                    </form>
                                    <!--
                                    <form class="form-inline" id='edl{{$idN}}' action="javascript:RefreshDataInView('history.Edit_note','edl{{$idN}}','findbyId')">

                                      @csrf
                                        <input type="hidden" name="modelo" id="modelo" value="Physiciansnote" />
                                        <input type="hidden" name="url" id="url" value="history.Edit_note" />
                                        <input type="hidden" name="_method" value="get">
                                        <input type="hidden" name="findit" value='{{$idN}}'>
                                        <input type="hidden" name="identification" value=''>
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-pencil mio"></button>
                                    </form>-->
                                  </div>
                                  @endif 
                            </a>
                           
              @endforeach
</div> 
<div  style="position: fixed; height: 40x; bottom:0; right:0; width: 100%; margin-left: 1%; background: #7190C6;">
        <strong style="color: yellow;">Nurse</strong>  |  <strong style="color: green;">Doctor</strong>  |  <strong style="color: blue;">Specialist</strong>
    </div>
</div>



<script type="text/javascript">

    function ShowNote (medico,reg){
      $('#qwerty').modal('show');
      $fecha=reg.created_at.substr(0,10);
    
      /*$a=RtnValor(reg.identification,'cabecera');*/

      $who=$('#'+medico).html(); 
      $('#cabecera').html($fecha+'     <br>'+$who);
    
      $('#parr1').html("<strong>S: </strong>"+((reg.subjective)?reg.subjective:''));
      $('#parr2').html("<strong>O: </strong>"+((reg.evolution)?reg.evolution:''));
      $('#parr3').html("<strong>A: </strong>"+((reg.assessment)?reg.assessment:''));
      $('#parr4').html("<strong>P: </strong>"+((reg.treatment)?reg.treatment:''));

      $mdcn="<br><table><tr><th scope='row' WIDTH='250'>Drug</th><th WIDTH='100'>Dose</th><th>Frequency</th></tr>";
      for (var i =0 ; i <= reg.drug.length - 1; i++) {
        $mdcn=$mdcn+ '<tr>';
        $mdcn=$mdcn+'<td>'+String(reg.drug[i][0])+'</td>'+'<td>'+String(reg.drug[i][1])+'</td>'+'<td>'+String(reg.drug[i][2])+'</td>';
        $mdcn=$mdcn+'</tr>';
      }
      $mdcn=$mdcn+'</table>';
      $('#parr5').html($mdcn);
    }

    

    
</script>



