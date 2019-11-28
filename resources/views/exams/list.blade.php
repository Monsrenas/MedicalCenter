<?php $identification=''; 
      $id='';

?>

 @if (isset($patient))
           <?php $identification=(isset($patient->identification))?$patient->identification:'';
                 $id=(isset($patient->id))?$patient->id:'';

                 $option=(isset($patient->option))?$patient->option:'N';
                 switch ($option) {
                   case '1': $titulo='Todos los examenes realizados al paciente '; break;
                   case '0': $titulo='Examenes solicitados'; break;
                   default: $titulo='Examenes solicitados y realizados. Indicados por: '.$_SESSION['username']; break;
                 }

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
                max-height: 65px;
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
        $cad=$cad+$SPname+'  '+userInf.name+' '+userInf.surname;
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

  @if  ($titulo)
    <div><h3>{{$titulo}}</h3></div>
  @endif             

<div class="col-xs-12 col-sm-12 col-md-12 list-group list-group-flush" style="margin: 0px auto;" >
                              <div style="width: 81%; height: 30px; margin-top: 5px; background: #7190C6; margin-bottom: -15px; border-style:solid; border-color:white; border-width:2px; position: fixed; z-index: 1;">
                                  <div class="form-inline blnc" style="width: 20%;">Date</div>
                                  <div class="form-inline blnc" style="width: 40%;">Exam </div>
                                  <div class="form-inline blnc" style="width: 40%;">Result</div>
                              </div>  <br><br>  

  <?php $i=0;   
    

  ?>
   @foreach($patient as $patmt)
                          <?php 
                              $idt=$patmt->identification;

                              $tmi=strlen($idt);

                              $idN=$patmt->id;
                              $userid=strval(substr($idN, $tmi+8));
                              
                              $Editable=($userid==$_SESSION['dr_user'])?true:false;
                              $borrable=(($_SESSION['acceslevel']>3)and$Editable);
                              $i=$i+1;
                              $contenido=false;

                              ?>
                              
                                
                                
                               

                             

                             <?php 
                              $Cadena="<a href='javascript:ShowNote(\"userd$idN\",$patmt)' class='list-group-item' style='max-height: 100px; height: 75px; overflow: hidden;' id='linea $idt'>";
                               $Cadena=$Cadena."<div class='form-inline colTx' style='width: 20%; color: white; font-size:small;'>".substr($patmt->created_at,0,10)."<div id='userd$idN'> </div></div>";
                            
                            
                              $lexams=(isset($patmt->exams))?$patmt->exams:null;
                              if ($lexams) {
                                  $txExam='';
                                  $txResu='';
                                  
                                  for ($i = 0; $i < count($lexams); $i++) {
                                      $resultado=( (isset($lexams[$i][1]) ) and($lexams[$i][1])); 
                                      $condicion1=(($option=="1")and($resultado));

                                      $condicion2=(($option=="0")and(!($resultado)));

                                      $condicion3=($option=='N');
                                      
                                      if (($condicion1)or($condicion2)or($condicion3)) {
                                            $txExam=$txExam." <li>".(isset($lexams[$i][0])?$lexams[$i][0]:'-')."</li>";
                                            $txResu=$txResu." <li>-".(isset($lexams[$i][1])?$lexams[$i][1]:'-')."</li>";
                                          $contenido=true;    
                                      }
                                  }

                                }

                             $Cadena=$Cadena."<div style='width: 70%; max-height: 70px; overflow: hidden;float: left;'><div class='form-inline' style='width:50%; float: left; text-align: left;'>".$txExam."</div><div class='form-inline' style='width:35%; float: left; text-align: left;'>".$txResu."</div></div>";

  ?>
                              @if ($Editable) 
                                  <?php  $xdata='&method=get&findit='.$idN;
$Cadena=$Cadena."<div class='form-inline' style='float: right; margin-right: 10px;'>  <form class='form-inline' id='edl$idN' action=\"javascript:editExamen('$xdata')\"><button type='submit' class='btn btn-default glyphicon glyphicon-pencil mio'></button></form></div>";
                                  ?>
                              @endif 
                        
<?php if ($contenido) {echo $Cadena."</a>";}  ?>                      
                             
   <script type='text/javascript'>LoadUserData('userd{{$idN}}','{{$userid}}' )</script>
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

      $who=$('#'+medico).html(); 
      $('#cabecera').html($fecha+'     <br>'+$who);
      $('#parr1').html(''); $('#parr2').html(''); $('#parr3').html(''); $('#parr4').html(''); $('#parr5').html('');
      $mdcn="<br><table><tr><th scope='row' WIDTH='300'>Exam</th><th WIDTH='400'>Results</th></tr>";
      for (var i =0 ; i <= reg.exams.length - 1; i++) {
        $mdcn=$mdcn+ '<tr>';
        $mdcn=$mdcn+'<td>'+String(reg.exams[i][0])+'</td>'+'<td>'+String(reg.exams[i][1])+'</td>'+'<td>';
        $mdcn=$mdcn+'</tr>';
      }
      $mdcn=$mdcn+'</table>';
      $('#parr1').html($mdcn);
    }

    function editExamen(xdata) {
      
      $('#qwerty').modal('show');
      PreLoadDataInView('#parr1', '&modelo=Exams&url=consultation.Exams'+xdata, 'findbyId');
    }    

    
</script>
