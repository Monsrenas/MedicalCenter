<?php  if(!isset($_SESSION)){ session_start(); }
       /* $_SESSION['dr_user']='44240514037';
    
        $_SESSION['dr_user']='613675132765';*/

        function PasientAct(){

          return (isset($_SESSION['identification']))? $_SESSION['identification']:null;
        }

        function OptionByLevel($op){
          $acces=$_SESSION['acceslevel'];
          $speci=$_SESSION['speciality'];
          
          if (($op==0)or($acces==4)) {return true;}
          
          if ((($op>4))and(($speci=="N")or($acces==1))) {return true;}
          if ((($op>0)and($op<4))and($acces>2)) {return true;}
          
          return false;
        }

        ?>

@if (isset($_SESSION['identification']))
    <script type="text/javascript">var Pacienteactivo="{{$_SESSION['identification']}}";</script>
    <form  id='pasient_act' action="javascript:LoadDataInView('{{$_SESSION['identification']}}','find')">
      @csrf
      <input type="hidden" name="modelo" id="modelo" value="Patient" />
      <input type="hidden" name="_method" value="get">
      <input type="hidden" name="identification" value="{{$_SESSION['identification']}}"> 
    </form>
    @else 
    <script type="text/javascript">var Pacienteactivo="";</script>
 @endif
<style type="text/css">



nav.navbar {
    background-color: #ADC5E8;
}
.navbar-nav .nav li a{
  color: yellow  !important; 
}

/*Mouse encima*/
nav.navbar ul.nav li a{
    color:#3953A7;
    opacity: 100%;
    text-align: center;
 }

 nav.navbar ul.nav li a:hover{
    color:white;

    -webkit-box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
-moz-box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
    background: #7190C4;
 }

 .navbar-nav.navbar-center {
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
}

.loco {background: #7190C4;
-webkit-box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
-moz-box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
}

.active {background: #7190C4;
-webkit-box-shadow: inset 3px 3px 7px 3px rgba(3,51,128,1);
-moz-box-shadow: inset 3px 3px 7px 3px rgba(3,51,128,1);
box-shadow: inset 3px 3px 7px 3px rgba(3,51,128,1);
opacity: 100%;
}

.disabled {opacity: 30%;}
</style>

<?php include(app_path().'/Includes/menu_data.php');?>

<div class="row navbar-fixed-top" id="work" style=" background-color: #ADC5E8; ">

  <div class="col-2 col-md-2" id="" style="text-align: center;"> 
    <img src="../images/menu/medicalCenterLogo2.png" alt="" width="70%" margin="1" style="margin-top: 6px;">
  </div>
  
  <div class="col-8 col-md-8" id="" style=" min-height: 116px; max-height: 116px; background-color: #ADC5E8; ">
      <nav class="navbar" style="margin-bottom: 0px;" role="navigation">
        <div class="container-fluid" style=" text-align: center; align-items: center;">    
          <ul class="nav navbar-nav navbar-center" style="width: 690px; ">
        
            <?php
              $i=0; 
              $pAc=PasientAct();
              if ($_SESSION['acceslevel']>=5)  {$menuItem=$userITEMS;} else {$menuItem=$patientITEMS;}
              foreach ($menuItem as $clave => $valor) {
                    if (OptionByLevel($i)){  
                            $info=json_encode($menuItem[$clave]);
                            $oPStatus=((($i>0)and($i<5))and(!$pAc))?'disabled':'';
                            echo "<li class='dependen $oPStatus' id='$clave'><a class='disabled' onclick='ShowOp($info, \"$clave\")' href='#'><img src='../images/menu/$clave.png' alt='Icon  $clave' width='40px' margin='1'><br>$clave</a></li>";
                              
                    }
                    $i++;
              }
            ?>  
          </ul>
          
        </div>
         <ul class="nav navbar-nav navbar-center" style="margin-left: 2px; margin-top: 80px; width: 102%;">
             <div class="" id="right_wind" style=" width: 100%; float: left;"></div> 
          </ul>
        <div id="parrafo"></div>
      </nav>
  </div>
  
  <div class="col-2 col-md-2" id="" style="background: #7190C6; min-height: 116px; max-height: 116px; color: #3864D9;">
    <ul class="nav navbar-nav navbar-right" >
      <li><span >USER: {{ $_SESSION['dr_user' ]}}</span></li>
      <li><span >{{ $_SESSION['username' ]}}</span></li>
      <li><a href="{{ url('userlogout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</div>



<form  id="llave" action="{{url('renderView')}}" method="get" >
  @csrf
  <input type="hidden" name="_method" value="GET">
  <input type="hidden" id="enlace" name="url" value="">
</form> 


<script type="text/javascript">
  var $antr='';
  var $antr='';
  function ShowOp($arreglo,$op){
  
          if ($('#'+$op).attr('Class')=='dependen disabled') {return ;} /*Si no hay paciente activo */
         

          if ($antr) {
            $('#'+$anop).attr("class", $antr);}
          $antr=$('#'+$op).attr("class");      
          $anop=$op;
           $('#'+$op).attr("class", "active");

          
          $('#left_wind').empty();
          $('.contenidoCentro').hide();
          $arreglo.forEach(BuildMenu);
      }

  function BuildMenu(elemento, indice){

           if (typeof(elemento)=='object') {
              AddMenuItem(elemento);
           } else {                                   if (elemento==' edit_patient ') {
                                                        var previo="#fr"+elemento.trim()
                                                        if ($(previo).length) {$(previo).remove()}
                                                      }
                    $ventana=((indice=="0") ? "#left_wind":"#center_wind");                                  
                    NewPreLoadDataInView($ventana,'&url='+elemento, 'renderView', elemento)   
                  }
  }


    function AddMenuItem(elemento, indice){
        $btnID='btn'+elemento[1].replace('.', '_');
        if (elemento[2]) {
          var xdata=elemento[2]+'&url='+elemento[1];
          var accion1="<a id='"+$btnID+"' onclick= 'NewPreLoadDataInView(\"#center_wind\",\""+xdata+"\",\""+elemento[3]+"\", \""+elemento[1]+"\")' class='btn btn-default btn-lg btn-block' href='#' style='background: #3149D5; color: #AFC4E8;'>"+elemento[0] + "</a>";
          var accion2="<a id='"+$btnID+"' onclick= 'RefreshDataInView(\"#center_wind\",\""+xdata+"\",\""+elemento[3]+"\", \""+elemento[1]+"\")' class='btn btn-default btn-lg btn-block' href='#' style='background: #3149D5; color: #AFC4E8;'>"+elemento[0] + "</a>";

          $("#left_wind").append((elemento[4])? accion2:accion1 );
        }else{

        $("#left_wind").append( "<a id='"+$btnID+"' onclick= 'BuildMenu(\" "+elemento[1]+" \",1)' class='btn btn-default btn-lg btn-block' href='#' style='background: #3149D5; color: #AFC4E8;'  >"+elemento[0] + "</a>");
        }
  }

function ShoWindow(elemento, ventana, subpage){      
                        $frm= "fr"+elemento.trim(); /*nombre del elemento HTML */
                        $frm= $frm.replace('.', '_');
                        
                        if (ventana=="#center_wind"){$('.contenidoCentro').hide();  
                              if ( $('#'+$frm).length ) { 
                                // hacer algo aquí si ya la opcion tiene un div con contenido
                                $('#'+$frm).show();
                              } else {   

                                    $(ventana).append("<div class='contenidoCentro' id='"+$frm+"'></div>");
                                    
                                    $('#'+$frm).append(subpage);
                              }
                        } else { $(ventana).append(subpage);}

}

function RefreshWindow(elemento, ventana, subpage){      
                        $frm= "fr"+elemento.trim(); /*nombre del elemento HTML */
                        $frm= $frm.replace('.', '_');
                        
                        if (ventana=="#center_wind"){$('.contenidoCentro').hide();  
                              if ( $('#'+$frm).length ) { 
                                // hacer algo aquí si ya la opcion tiene un div con contenido
                                $('#'+$frm).html(subpage);
                                $('#'+$frm).show();
                              } else {   
                                    $(ventana).append("<div class='contenidoCentro' id='"+$frm+"'></div>");
                                    $('#'+$frm).append(subpage);
                              }
                        } else { $(ventana).append(subpage);}
}

function LoadDataInView(elemento, forma,vista) { 
    var data=$('#'+forma).serialize();
    var previo="#fr"+elemento.trim()
    if ($(previo).length) {$(previo).remove()}

    $.post(vista, data, function(subpage){
        ShoWindow(elemento,"#center_wind",subpage);
    })

}

function RefreshDataInView(ventana, xdata, vista,elemento) {
    var data=$('#llave').serialize();
    data=data+xdata;      
    
    $.post(vista, data, function(subpage){
        RefreshWindow(elemento,ventana,subpage);
    })
}

function SaveDataNoRefreshView(forma,vista) {
    var data=$('#'+forma).serialize();
    $.post(vista, data, function(subpage){  
        alert('Successful operation'); 
    })
}

function PreLoadDataInView(ventana, xdata, vista) { 
    var data=$('#llave').serialize();
    data=data+xdata;  
    
    $.post(vista, data, function(subpage){ 
        $(ventana).empty().append(subpage); 
    })  .fail(function() {
    $(ventana).empty().append("Error al cargar datos");
  })
}

function NewPreLoadDataInView(ventana, xdata, vista,elemento) {
    var data=$('#llave').serialize();
    data=data+xdata; 
       
    $.post(vista, data, function(subpage){
        ShoWindow(elemento,ventana,subpage);
    })
}

function RtnValor(id, putIN){
  var data=$('#llave').serialize();
  data=data+'&noview=abc&modelo=Patient&_method=get&identification='+id;

  $.post('find', data, function(valor){
        $('#'+putIN).html(valor.name); 
    }) 
}

function elimina(forma, linea) {
  var data=$('#'+forma).serialize();
  a=confirm('You want to erase patient information '+forma); 
  if (a) {
            $.post('delete', data, function(subpage){ 
                $('#'+linea).remove(); 
            }); 
         }
}

/*Especificos*/

function cambiaPaciente(forma)
{
    var data=$('#'+forma).serialize();
    $('#center_wind').empty();
    $.post('patientcng', data, function(subpage){  
                                  PreLoadDataInView('#right_wind', '&modelo=Patient&url=show_patient', 'find'); 
                                  Pacienteactivo="<?php echo (isset($_SESSION['identification']))? $_SESSION['identification']:''; ?>";
                                  NewPreLoadDataInView('#center_wind', '&modelo=Patient&url=patient_info', 'find','patient_info');
                                  $(".dependen").attr("class", "dependen"); /*activa menu*/
                                }
    );
}

/* Util para ventanas que cargan datos automaticamente*/
function CrearVista(ventana, vista) {
    var data=$('#llave').serialize();
    data=data+'&url='+vista;
    $.post('renderView', data, function(subpage){                           
                                                  $(ventana).empty().append(subpage);
                                                }
    );  
}

function AbreConsulta(ventana, vista){ 
   
  /*$('#botonNewconsulta').empty();*/
  CrearVista(ventana, vista);
  CrearVista('#Physical', 'consultation.PhysicalExamination');
  CrearVista('#Laboratory', 'consultation.Exams');
}


function CargaConsulta(ventana, xdata, control){ 
  PreLoadDataInView('#Physical', '&modelo=Physical&url=consultation.PhysicalExamination'+xdata, 'findbyId');
  PreLoadDataInView('#Laboratory', '&modelo=Exams&url=consultation.Exams'+xdata, 'findbyId');
  PreLoadDataInView('#Interrogation', '&modelo=Interrogation&url=consultation.interrogation'+xdata, 'flexlist');
}

function AltaMedica(identification){ 
  a=confirm('Estar operacion efectua el alta medica del paciente, Desea Continuar ? ');
  if (!a) {return}
   SaveDataNoRefreshView('MyDischarge','store');
   var data=$('#MyAdmission').serialize();

   $.post('delete', data, function(result){  
                $('#frAdmission_admission').remove();
                $('#frAdmission_discharge').remove();
                alert('Discharge done successful'); 
            }); 
}

 if (Pacienteactivo) {cambiaPaciente('pasient_act');}


</script>


<!-- /*224
   74
  32*/


function LoadDataInView(elemento, forma,vista) {
    var data=$('#'+forma).serialize();
    var previo="#fr"+elemento.trim()
    if ($(previo).length) {$(previo).remove()}
    $.post(vista, data, function(subpage){
        ShoWindow(elemento,"#center_wind",subpage);
    })

}

                  /*
                    $('#enlace').val(elemento);

                    var data=$('#llave').serialize();

                    $.post('renderView', data, function(subpage){
                        $ventana=((indice=="0") ? "#left_wind":"#center_wind");
                        ShoWindow(elemento, $ventana, subpage);
                       
                    })                       
                 */ -->