<style type="text/css">



nav.navbar {
    background-color: #FFFFFF;
}
.navbar-nav .nav li a{
  color: yellow  !important; 
}

/*Mouse encima*/
nav.navbar ul.nav li a{
    color:black;
    text-align: center;
 }

 nav.navbar ul.nav li a:hover{
    color:white;
    background: #324E66;
 }
</style>

<?php include(app_path().'/Includes/menu_data.php');?>


<nav class="navbar navbar-default" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
          <img src="../images/ClinLogo.png" alt="" width="50%" margin="1" style="margin-top: -22px; margin-right: -10px;">
      </a>
      <a class="navbar-brand" href="#"><span style="font-size: large; color: black;">Medical Center</span></a>
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

<form  id="llave" action="{{url('/wil')}}" method="get" >
  @csrf
  <input type="hidden" name="_method" value="GET">
  <input type="hidden" id="enlace" name="enlace" value="">
</form> 

<script type="text/javascript">

  function ShowOp($arreglo){
          $('#left_wind').empty();
          $('#right_wind').empty();
          $arreglo.forEach(BuildMenu);
      }

  function BuildMenu(elemento, indice){
            
           if (typeof(elemento)=='object') {

              AddMenuItem(elemento);
           } else {   
                     (indice==0) ? $ventana='#left_wind' : $ventana='#right_wind';
                                                $('#enlace').val(elemento);
                                                var data=$('#llave').serialize();
                                                    $.post('/wil', data, function(subpage){
                                                    $($ventana).empty().append(subpage);
                                                })                       
                     
                     }
  }


    function AddMenuItem(elemento, indice){

        $("#left_wind").append( "<a  onclick= 'BuildMenu(\" "+elemento[1] + " \",1)' class='btn btn-default btn-lg btn-block' href='#' >"+elemento[0] + "</a>");
  }

  function ajaxRenderSection(url) {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('#right_wind').empty().append($(data)); 
            },
            error: function (data) {
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }

</script>