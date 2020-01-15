<?php 
use App\Exams;
    if(!isset($_SESSION)){ session_start(); }
    $user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
    $examlst='exmsList';
?>
 
 @if (isset($patient))
           <?php 
            $abcd=json_decode($patient);
            $patient=new Exams;  
            
           foreach ($abcd as $clave => $valor) {
                if (isset($abcd->{$clave})) {$patient->{$clave}=$abcd->{$clave};}
                }

           $id=$patient->id;  
           $identification=$patient->identification;
           //$examlst='exmlsr'.$id;
           ?>
@else
    <?php                     
            $patient=new Exams;
            if (!isset($identification)) {$identification="";}
            ?> 
    @if (isset($_SESSION['identification']))
           <?php 
                $identification=($_SESSION['identification']);  
                $id=str_replace(" ", "",$hoy.$identification.$user);
            ?>
    @endif
@endif


<style type="text/css">
    .exam {width: 460px; height: 22px;}
    .descr {width: 375px; height: 22px;}
    .imagt {width: 170px;}
    .imgT {width: 55%; float: left; text-align: left;}
    .imgI {width:100%; float: left; text-align: center; width: 40%; font-size: xx-small;}
    .imageitem { text-align: center; width: 100%;  background: blue; height: 100px; padding-top: 20px;
                            position: fixed; 
                            height: 100; 
                            top:370px; 
                            right:2; 
                            width: 70%; 
                            text-align: left; 
                            background: #748DC3; 
                            padding: 20px; 
                            margin-left: 30px;
      -webkit-box-shadow: 2px 28px 75px 19px rgba(0,0,0,0.75);
      -moz-box-shadow: 2px 28px 75px 19px rgba(0,0,0,0.75);
      box-shadow: 2px 28px 75px 19px rgba(0,0,0,0.75);
    }
    .ImgExamsView { height: 326px; max-height: 326px; overflow: auto scroll; background: #AFC4E8; 
                    border-width:1px; border-style:solid; border-color:#000000;
                }
    .imageVws { width: 400%; max-width: 300%; height: 125px; max-height: 125px; overflow: auto scroll;
                 background:#729CE4}
    .imgCube { width: 100px; height: 100px; float: left; margin-left: 2px; margin-top: 0px; background: #C3C3C3;
     border-width:1px; border-style:solid; border-color:#000000; overflow: hidden;}
     .cubeLNK { text-decoration: none; color: black; float: left;}
     .imgCubea img:hover
        {
          background:#F41A49;
          color:#F41A49;
          -webkit-transform: scale(0.95);
          -ms-transform: scale(0.95);
          transform: scale(0.95);
          box-shadow: inset 0 0 0 10px #F41A49;
          opacity:0.5;
        }

        .CubeText {width:30; height:5px; font-size:xx-small; text-align:justify; padding: 2px;
                    line-height: 8px; height: 5px; max-height: 5px;
                    }
        .pepe { width: 99px; height: 20px; opacity: 0%;}
       .pepe:hover { opacity: 100%; } 

       .editbt { margin: 0px; padding-bottom: 0px; padding-top: 0px;
                margin-top: 0px; float: left;
               }
       .delbt { margin: 0px; padding-bottom: 0px; padding-top: 0px;
                margin-top: 0px; float: right;
               }
</style>

<div style="padding: 1%;  align: center;  background: #7190C6; height: 370px; max-height: 370px;">
<form  action="javascript:SaveExams();" method="post" id="MyExams" accept-charset="UTF-8" enctype="multipart/form-data">
	@csrf
    <input type="hidden" name="_method" value="post">
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
    <input type="hidden" name="id"  placeholder="Consultation Id" value='{{ $id }}'>
	<input type="hidden" name="url"  value='consultation.Exams'>
	<input type="hidden" name="modelo"  value='Exams'>
    <div class="ImgExamsView">
    	<div class="form-group" id="examenes">
            <div style="background: white; width: 100%;">
                <strong>EXAM(S) :</strong>
            </div>
            <div>
               <div style="float: left; width: 50%; color: black; background: white;"><strong>Title</strong></div> 
               <div style="float: left; width: 50%; color: black; background: white;"><strong>Results</strong></div>
            </div><br>   

            <div id="<?php echo $examlst ?>" style="height:100px; max-height:90px; overflow:auto scroll; background:#729CE4"></div>
        </div>

        
        <div class="form-group" id="imagenes">
            <div style="background: white; width: 100%;">
                <strong>IMAGE(S) :</strong>
            </div>

            <div style="max-width: 100%; overflow: auto scroll; margin: 10px;">
                <div id="imageVws" class="imageVws"></div>
            </div>
            <div id="imagelst"></div>
        </div>
    </div>

    <a href="javascript:addExams('','')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Exams</a>

    <a href="javascript:addImage('','')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Image</a>

    @include('funciones')
    <?php SaveButton('MiExamsBoton');
          $created=(isset($patient->created_at)?substr($patient->created_at, 0,11):date('Y-m-d'))
     ?>
</form>	

<script type="text/javascript">
		
		var $xmed=0;
        var $ximg=0;
        var anterior=[];
        $accLvl=<?php echo $_SESSION['acceslevel']; ?>;
        
        var $ntgdd=('<?php echo( Antiguedad($created) ); ?>');
        if ($ntgdd<3) {activaBoton('MiExamsBoton','MyExams');}

        function SaveExams()
        {
            $('#EXAMSaveBTN').hide();   
            SaveDataNoRefreshView('MyExams','IDstore');
            saveFiles();
        }

        function saveFiles()
        {   var miForm=document.getElementById('MyExams');   

            var dataFile = new FormData(miForm);
            
            $.ajax({ 
                             url: "saveFiles",
                            type: "post", 
                        dataType: "html",
                            data: dataFile,
                           cache: false,
                     contentType: false, 
                     processData: false 
                                                           
                  }).done(function(subpage){  

                                    });
            $('.PaBRRR').remove();
        }

        function delelm($xeme, $ind)
        {   $('#MiExamsBoton').show();
            $('#c0'+$xeme[$ind]).remove();
            $('#c1'+$xeme[$ind]).remove();    
            $('#'+$xeme).remove();

            if ($xeme.substring(0,5)=='image') { ListaPaBorrarArchivo($ind);
                                                 $('#imgCube'+$ind).remove();
                                                 if (!($('.imageitem').length)) { $ximg=0; }
                                                 } else {
                                                           if (!($('.examitem').length)) {$xmed=0; }
                                                        }
                                                        
            if (($xmed==0)&&($ximg==0)){   $('#EXAMSaveBTN').hide();  }
            
        }

    function addExams($title, $Descrptn){ 
        $edtResu=($title)?'':'Disabled';
        $titlet="<input type='text' class='form-inline exam' name='exams["+$xmed+"][0]'  value='"+$title+"' style='width: 45%;' id=\"ImExams"+$xmed+"\" required>";
        $descrt="<input type='text' class='form-inline descr' name='exams["+$xmed+"][1]'  value='"+$Descrptn+"' style='width: 45%;' "+$edtResu+">";
        $bottDel=(($accLvl>3)||(!$title))? "<a href='javascript:delelm(\"exams"+$xmed+"\" ,"+$xmed+")' class='btn btn-success' style=' height: 22px'><span class='glyphicon glyphicon glyphicon-minus' aria-hidden='true' style='font-size:xx-small'></span></a>":"<a href='#' class='btn btn-success'><span class='glyphicon glyphicon' aria-hidden='true'></span></a>";
        $others="<div class='examitem' id=\"exams"+$xmed+"\">"+$titlet+$descrt+$bottDel+"</div>";
        
        var txt = document.getElementById('<?php echo $examlst ?>');
        txt.insertAdjacentHTML('beforeend', $others);
        $('#ImExams'+$xmed).focus();
        $xmed=$xmed+1;
       } 


  function addImage($title, $image){ 
        $('.imageitem').hide();
        $edtResu=($title)?'':'Disabled';
        
        $nameToSave="<input type='hidden' name='images["+$ximg+"][1]'  value='"+$image+"' id=\"ImgesSN"+$ximg+"\" required>";
        $titlet="<input type='text' class='form-inline imgT' name='images["+$ximg+"][0]'  value='"+$title+"' id=\"ImgsX"+$ximg+"\"  placeholder='Image title' required>";
        $image="<input type=\"file\" class='form-inline imgI' id='ImgsTL"+$ximg+"' name='ImgsTL["+$ximg+"]' onchange=\"javascript:muestraImg( this.value ,"+$ximg+")\">";
        $bottDel=(($accLvl>3)||(!$title))? "<a href='javascript:delelm(\"image"+$ximg+"\" ,"+$ximg+")' id=\"bDlt"+$ximg+"\" class='btn btn-success glyphicon-minus'><span aria-hidden='true'></span></a>":"<a href='#' class='btn btn-success'><span class='glyphicon glyphicon' aria-hidden='true'></span></a>";
        $others="<div id=\"image"+$ximg+"\">"+$nameToSave+$titlet+$image+$bottDel+"</div>";

        var txt = document.getElementById('imagelst');
        txt.insertAdjacentHTML('beforeend', $others);

        $('#ImgsX'+$ximg).focus();
        $ximg=$ximg+1;
       } 

    function addCube(ind, imgName)
    {   
        var title=$('#ImgsX'+ind).val(); 
    
        $('#ImgsX'+ind).on('change',function(){ addCube(ind, imgName);    });
   
        $imagen="<img id=\"imgFRM"+ind+"\" src=\"/storage/"+imgName+"\" style=\"margin-top: 2px;\" width='90' height='60'>";

        $text="<br><div class='CubeText'>"+title+"</div>";
        $botones="<a class='editbt btn glyphicon glyphicon-pencil' onclick='javascript: muestraImgForm(\"image"+ind+"\",\"imageitem\")'></a><a class='delbt btn glyphicon glyphicon-trash' href='javascript:delelm(\"image"+ind+"\" ,"+ind+")' ></a>";
        $botones="<div class='pepe'>"+$botones+"</div>";
        $InteriorCubeLNK="<div class='imgCube'>"+$imagen+$text+"</div>";
        $cubelink="<a id=\"imgCubeINT"+ind+"\" onclick='javascript: ImageZoom(\""+imgName+"\",\""+title+"\");'>"+$InteriorCubeLNK+"</a>";
        $cubelink="<div id=\"imgCube"+ind+"\" class='cubeLNK'>"+$botones+$cubelink+"</div>"
        if ($('#imgCube'+ind).length) { $('#imgCubeINT'+ind).html($InteriorCubeLNK);     }
        else {
                var txt = document.getElementById('imageVws');
                txt.insertAdjacentHTML('beforeend', $cubelink);
             }

        $('#image'+ind).hide();

    }

    function muestraImgForm (nombre, clase)
    {
    
        $('.'+clase).hide();
        $('#'+nombre).show();

    }

    function NewImgName(nombre){

    $prueba=Date().toString();
    $prueba=($prueba.substr(0,24));
    $ext=nombre.substr(nombre.indexOf('.'));
    while ($prueba.indexOf(' ')>0) {$prueba=$prueba.replace(" ","");
                                   $prueba=$prueba.replace(":","");}
      return 'img'+$prueba+$ext;    
    }


   function muestraImg(nombre, ind) 
   {
    ListaPaBorrarArchivo(ind);
    var NameGenerate=NewImgName(nombre);
    $('#ImgesSN'+ind).val(NameGenerate);
    modificaItem(ind);
    
    addCube(ind, NameGenerate);
    loadPreviewImage('ImgsTL'+ind, 'imgFRM'+ind);
   }    

   function modificaItem(ind)
   {
    $('#image'+ind).addClass('imageitem');
     
    $('#bDlt'+ind).attr("class", "btn-success glyphicon glyphicon glyphicon-trash");
    $('#image'+ind).append("<div style=\"margin-top:22px; float: right;\"><a onclick=\"javascript:$(\'#image"+ind+"\').hide()\" class=\"btn btn-success\">close</a></div>");
   }

   function ListaPaBorrarArchivo(ind)
   {
        if (anterior[ind]) {  
        $('#imagelst').append("<input class='PaBRRR' type='hidden' name='borrar[]' value='"+anterior[ind]+"'>");
    }
   }

   function ImageZoom(imagen, text)
   { 
      $('#thingshow').modal('show');  
      $img="<img src=\"/storage/"+imagen+"\">";
      $('#pa1').html($img);  
      $('#pa2').html(text);

   }

function loadPreviewImage(elemento, imgFrame)
{
    e=document.getElementById(elemento);
  
  // Creamos el objeto de la clase FileReader
        let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.files[0]);      

  // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function(){
          MyPreview = document.getElementById(imgFrame),
          MyPreview.src = reader.result;
        };
}

</script>

@if (isset($patient->exams))
    <?php $xyzabc=json_decode(json_encode($patient->exams), true); ?>
	@for ($i = 0; $i < count($xyzabc); $i++)
        <?php 
            $colExam=(isset($xyzabc[$i][0]))? $xyzabc[$i][0] : "";
            $colResu=(isset($xyzabc[$i][1]))? $xyzabc[$i][1] : "";
            $colImag=(isset($xyzabc[$i][2]))? $xyzabc[$i][2] : "";
         ?>
		<script> addExams('{{ $colExam }}','{{ $colResu }}'); </script>
	@endfor
@endif

@if (isset($patient->images))
    <?php $xyzabc=json_decode(json_encode($patient->images), true); $i=0 ?>
    @foreach($xyzabc as $mgnTM)
    
        <?php 
            $colExam=(isset($mgnTM[0]))? $mgnTM[0] : "";
            $colImag=(isset($mgnTM[1]))? $mgnTM[1] : "";
         ?>
        <script> 
            addImage('{{ $colExam }}','{{ $colImag }}');
            addCube('{{$i}}', '{{ $colImag }}'); 
            
            modificaItem('{{$i}}');
            anterior[{{$i}}]='{{ $colImag }}';

        </script>
        <?php $i=$i+1; ?>
    @endforeach
@endif 

</div>