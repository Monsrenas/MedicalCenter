<?php  if(!isset($_SESSION)){session_start();}
        $_SESSION['user']='44240514037';
/*224
   74
32*/
?>

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
    text-align: center;
 }

 nav.navbar ul.nav li a:hover{
    color:white;

    -webkit-box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
-moz-box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
box-shadow: inset 5px 5px 11px 6px rgba(3,51,128,1);
    background: #7190C4;
 }
</style>


<?php include(app_path().'/Includes/menu_data.php');?>


<nav class="navbar navbar-default" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header" style="text-align: center; padding-right: 20px;">
      <a class="" href="#" style=" color:#C3F836; font-size: x-large; ">
        <img src="../images/menu/mainLogo.png" alt="" width="40%" margin="1" style="margin-top: 6px; margin-right: -10px;"><br><strong>Medical Center</strong> </a>
    </div>
    <ul class="nav navbar-nav">
      <?php 
        foreach ($menuItem as $clave => $valor) {
        $info=json_encode($menuItem[$clave]);

        echo "<li id='$clave'><a onclick= 'ShowOp($info)'   href='#' ><img src='../images/menu/$clave.png' alt='Icon  $clave' width='80px' margin='1'><br>$clave</a></li>";
      }
      ?>
    </ul>
 
    <ul class="nav navbar-nav navbar-right" >
      <li><a><span ></span>USER: Nombre </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
  <div id="parrafo"></div>
</nav>

<form  id="llave" action="{{url('renderView')}}" method="get" >
  @csrf
  <input type="hidden" name="_method" value="GET">
  <input type="hidden" id="enlace" name="enlace" value="">
</form> 

<script type="text/javascript">

  function ShowOp($arreglo){
          $('#left_wind').empty();
          $('.contenidoCentro').hide();
          $arreglo.forEach(BuildMenu);
      }

  function BuildMenu(elemento, indice){

           if (typeof(elemento)=='object') {

              AddMenuItem(elemento);
           } else { 
                                                      if (elemento==' edit_patient ') {
                                                        var previo="#fr"+elemento.trim()
                                                        if ($(previo).length) {$(previo).remove()}
                                                      }
                        
                    $('#enlace').val(elemento);
                    var data=$('#llave').serialize();

                    $.post('renderView', data, function(subpage){

                        $ventana=((indice=="0") ? "#left_wind":"#center_wind");
                        ShoWindow(elemento, $ventana, subpage);
                       
                    })                       
                 
                  }
  }


    function AddMenuItem(elemento, indice){

        if (elemento[2]) {

            var xdata=elemento[2]+'&url='+elemento[1];

           $("#left_wind").append( "<a  onclick= 'NewPreLoadDataInView(\"#center_wind\",\""+xdata+"\",\""+elemento[3]+"\", \""+elemento[1]+"\")' class='btn btn-default btn-lg btn-block' href='#' style='background: #3149D5; color: #AFC4E8;'>"+elemento[0] + "</a>");
        }else{

        $("#left_wind").append( "<a  onclick= 'BuildMenu(\" "+elemento[1] + " \",1)' class='btn btn-default btn-lg btn-block' href='#' style='background: #3149D5; color: #AFC4E8;'  >"+elemento[0] + "</a>");
        }
  }

function ShoWindow(elemento, ventana, subpage){

                        $frm= "#fr"+elemento.trim();
                        
                        if (ventana=="#center_wind"){$('.contenidoCentro').hide();
                              if ( $($frm).length ) {
                              // hacer algo aquí si ya la opcion tiene un div con contenido
                                $($frm).show();
                              } else {   
                                    $(ventana).append("<div class='contenidoCentro' id='"+"fr"+elemento.trim()+"'></div>");
                                    $($frm).append(subpage);
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

function SaveDataNoRefreshView(forma,vista) {

var data=$('#'+forma).serialize();

$.post(vista, data, function(subpage){
  alert('Operacion Exitosa'); })

}

function NewPreLoadDataInView(ventana, xdata, control,elemento) {
    var data=$('#llave').serialize();
    data=data+xdata;
        
    $.post(control, data, function(subpage){
      ShoWindow(elemento,ventana,subpage);
    })
}

function elimina(forma, linea) {
  var data=$('#'+forma).serialize();
  a=confirm('Desea borrar la informacion del cliente '+forma); 
  if (a) {
        $.post('delete', data, function(subpage){ 
          $('#'+linea).remove(); }); }
}

function cambiaPaciente(forma)
{
  var data=$('#'+forma).serialize();
  $('#center_wind').empty();
    $.post('patientcng', data, function(subpage){  
      PreLoadDataInView('#right_wind', '&modelo=Patient&url=show_patient', 'find'); })
}

/* Util para ventanas que cargan datos automaticamente*/
function CrearVista(ventana, vista) {
$('#enlace').val(vista);
var data=$('#llave').serialize();
$.post('renderView', data, function(subpage){                             
                            $(ventana).empty().append(subpage);
                        })  
}

function AbreConsulta(ventana, vista){ 
   
  $('#botonNewconsulta').empty();
  CrearVista(ventana, vista);

}


function CargaConsulta(ventana, vista){ 
   
  $('#botonNewconsulta').empty();
  CrearVista(ventana, vista);

}

function PreLoadDataInView(ventana, xdata, control) {

    var data=$('#llave').serialize();
    data=data+xdata;
        
    $.post(control, data, function(subpage){
      $(ventana).empty().append(subpage); })
}




/* Borrables  */

  
</script>

