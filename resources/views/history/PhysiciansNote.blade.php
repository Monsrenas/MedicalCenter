<?php $identification=''; 
      $id='';
?>

 @if (isset($patient))
           <?php $identification=(isset($patient->identification))?$patient->identification:'';
                 $id=(isset($patient->id))?$patient->id:'';  ?>
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
        .blnc {font-size: large; float:left; color: white;}
        .colTx { float:left;
                font-size: xx-small; 
                max-height: 35px;
                overflow: hidden;
                padding: 0 1em 1em 1em;
                line-height: 1em;
                text-align: justify;  
              }
    </style>
<div class="row" style="margin: 0px auto;">
  @csrf 
            
<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                              <div style="width: 81%; height: 30px; margin-top: 5px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px; position: fixed; z-index: 1;">
                                  <div class="form-inline blnc" style="width: 10%;">Date</div>
                                  <div class="form-inline blnc" style="width: 18%;">Subjective</div>
                                  <div class="form-inline blnc" style="width: 18%;">Evolution</div> 
                                  <div class="form-inline blnc" style="width: 18%">Assessment</div>
                                  <div class="form-inline blnc" style="width: 18%;">Treatment</div>
                                  <div class="form-inline blnc" style="width: 5%">Medication</div>
                                 
                              </div>  <br><br>  

  <?php $i=0;   ?>
   @foreach($patient as $patmt)
                          <?php 
                              $idt=$patmt->identification;
                              $idN=$patmt->id;
                              $i=$i+1;   dd($patmt); ?>
                                            
                             <a href="javascript:ShowNote({{$patmt}})" class="list-group-item" style="height: 60px;" id="linea{{$idt}}">
                                  <div class="form-inline colTx" style="width: 10%; color: white; font-size: small;">{{substr($patmt->created_at,0,10)}}</div>
                                  <div class="form-inline colTx" style="width:18%;"><?php echo (isset($patmt->subjective)?$patmt->subjective:''); ?></div> 
                                  <div class="form-inline colTx" style="width:18%;"><?php echo (isset($patmt->evolution)?$patmt->evolution:''); ?></div>
                                  <div class="form-inline colTx" style="width:18%;"><?php echo (isset($patmt->assessment)?$patmt->assessment:''); ?></div>  
                                  <div class="form-inline colTx" style="width:18%;"><?php echo(isset($patmt->treatment)?$patmt->treatment:''); ?></div>
                                  <div class="form-inline colTx" style="width:5%;">
                                    <?php
                                      $ldrug=isset($patmt->drug)?$patmt->drug:null;
                                      for ($i = 0; $i < count($ldrug); $i++) { 
                                          echo('<li>'.(isset($ldrug[$i][0])?$ldrug[$i][0]:'-').'</li>');
                                      } 
                                    ?>
                                  
                                  </div>
  
                                 @if (2==2)    
                                  <div class="form-inline" style="float: right;">
                                    <form class="form-inline" action="javascript:elimina('D{{$idt}}','linea{{$idt}}')" id='D{{$idt}}' >
                                      @csrf
                                      <input type="hidden" name="modelo" id="modelo" value="Patient" />
                                      <input type="hidden" name="_method" value="post">
                                      <input type="hidden" name="identification" value='{{$idt}}'> 

                                      <button type="submit" class="colTx btn btn-default glyphicon glyphicon-trash btn-danger mio"></button>
                                    </form>
                                  </div>
                                  @endif 

                                  @if (100>1)
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
</div>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Note</button>-->

<div id="qwerty" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="cabecera"></h4>
      </div>
     <div style="padding: 2em;">
        <p id="parr1" style="text-align: justify;"> </p>
        <p id="parr2" style="text-align: justify;"> </p>
        <p id="parr3" style="text-align: justify;"> </p>
        <p id="parr4" style="text-align: justify;"> </p>

        <strong>Medication</strong>
        <p id="parr5" style="text-align: justify;"> </p>

     </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function ShowNote (reg){
      $('#qwerty').modal('show');
      $fecha=reg.created_at.substr(0,10);
    
      $a=RtnValor(reg.identification,'cabecera');

      $('#cabecera').html($fecha+'    ');
      if (reg.subjective) {$('#parr1').html("<strong>S: </strong>"+reg.subjective);}
      if (reg.evolution) {$('#parr2').html("<strong>O: </strong>"+reg.evolution);}
      if (reg.assessment) {$('#parr3').html("<strong>A: </strong>"+reg.assessment);}
      if (reg.treatment) {$('#parr4').html("<strong>P: </strong>"+reg.treatment);}

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



