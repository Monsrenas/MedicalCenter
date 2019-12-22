
<style type="text/css">
        .ListGroupItem {background: #E3F8CD; }
        .FormInline { font-family: arial, helvetica, sans-serif; 
                 margin-top: 0px;
                 margin-bottom: 0px;
                 color: #000000;
                }

        .ListGroupItem  a:hover { color: black; background: blue; }

        .form-group { font-family: arial, helvetica, sans-serif; 
                 margin-right: 0px;
                 margin-left: 0px;
                }
        .mio { width: 35px; height: 37px; background: #7190C6; border: none;}
        .blnc {font-size: large; float:left; color: white; overflow: hidden; }
        .dbd {overflow: hidden; max-height: 29px;}
        .Appointment label {margin-left: 10px;}
        .Appointment input {color: black; }
        .Appointment       {position: fixed; 
                            height: 100; 
                            top:245px; 
                            right:2; 
                            width: 50%; 
                            text-align: left; 
                            background: #748DC3; 
                            padding: 20px; 
                            margin-left: 100px;
                            -webkit-box-shadow: 2px 28px 75px 19px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 28px 75px 19px rgba(0,0,0,0.75);
box-shadow: 2px 28px 75px 19px rgba(0,0,0,0.75);
                          }
    </style>

<script type="text/javascript">
    
    /* General los espacios de horarios para cita (Vacia)*/
    function AppointArray(op){
        var $prfj=['','mY'];
        var bClo=(op==1)?'background: white;':'';

        var hr=8;
        var dateToday=<?php echo str_replace("-", "", date("Y-m-d")); ?>;
        if (op==0)  {
            var searDate=$('#setDate').val();
                searDate=(searDate.replace('-','')).replace('-','');
        }
              
        for (var i = 0; i < 12; i++) {
          for (var j = 0; j <= 45; j++) {
            hds=hr+i;
            miFecha = new Date('1','1','1',hds,j,'0');
            hds=miFecha.toString().substring(16,24);
            $hID=('hspc'+hds.replace(':','')).substring(0,8);
            $hID=$prfj[op]+$hID;
            $cade="<div id='I"+$hID+"' hidden> </div>";
            $cade=$cade+"<div id='P"+$hID+"' style='width:35%; float: left;text-align: left; overflow:hidden;"+bClo+"'> </div>" ;
            $cade=$cade+"<div id='D"+$hID+"' style='width:50% float: left; text-align: left;"+bClo+"'> </div>";
            
            accion="";
            if ((op==0)&&(dateToday<=searDate)) {accion="onclick='showAPPnt(\""+$hID+"\")'";} 
              
            $hora="<a href='#' class='list-group-item ListGroupItem ' style='height:22px; margin-top:1px; padding-top: 1px;overflow:hidden; "+bClo+"' "+accion+" id='V"+$hID+"'> <div style='width: 15%; text-align: left; padding-left: 4px; float: left;"+bClo+"' id='H"+$hID+"'>"+hds+"</div>"+$cade+"</a>";
            $('#'+$prfj[op]+'rejilla').append($hora);
            j=j+14;

          }
        }


    }


     /*Carga la informacion en la ventana de edicion de citas y la muestra*/
    function showAPPnt(idLn){
        $horaC=$('#H'+idLn).text();
        
        $identification=($('#I'+idLn).text()).trim();

        if ($identification){ $('#appIdentification').attr("readonly","readonly");
                              $('#appDelete').removeAttr("disabled");
         } 
          else {$('#appIdentification').removeAttr("readonly");
                $('#appDelete').attr("disabled","disabled");
               }

         $doctor=$('#setDr_code').val();
         var $fecha=(($('#setDate').val()).replace('-','')).toString();
             $fecha=$fecha.replace('-','');

        $('#appID').val($doctor+$fecha+idLn.substring(4,8));
        $('#appDr_code').val($('#setDr_code').val());
        $('#appDate').val($('#setDate').val());
        $('#appTime').val($horaC);
        $('#appIdentification').val($identification); 
        $('#appDetails').val($('#D'+idLn).text());
        $('#appPName').html($('#P'+idLn).text());

        
        $('#citaVTN').show();
        $('#appIdentification').focus();
    }

    function UpdateID(){
       
    }

    function markLikeDone (idSpc)
    {
      /* Colores para citas cumplimentadas*/
      $('#H'+idSpc).css('color','#D1D1D1');
      $('#P'+idSpc).css('color','#D1D1D1');
      $('#D'+idSpc).css('color','#D1D1D1');
      $('#V'+idSpc).prop("onclick", null).off("click");
                     
    }  

    /*Carga los datos en los espacios de horarios para cita */
    function LoadAppnt(regist, op){
      
      
      var regist=JSON.parse(regist);
      var mdate=regist['date'];
      var mtime=regist['time'];
      var identification=regist['identification'];
      var details=regist['details']; 
      var $prfj=['','mY'];
      var idSpc=mtime.toString();
      
      
          idSpc="hspc"+(idSpc.replace(':','')).substring(0,4);
          idSpc=$prfj[op]+idSpc;
          $('#I'+idSpc).html(identification);
          RegisterRTN('&identification='+identification+'&modelo=Patient',[['#P'+idSpc,'name'],['#P'+idSpc,'surname']]);
          
          if (op==1) {    $('#V'+idSpc).click(     function() { CumplimentarCita(idSpc); }     );     }

          $('#D'+idSpc).html(details);

          /* Colores para citas cumplimentadas*/
          if (regist['status']=='1') { markLikeDone (idSpc);}
          
    };

    /*Guarda la informacion de la ventana de edicion de citas y actualiza la casilla correspondiente*/
  
    function SaveAndListUpdate(){
      SaveDataNoRefreshView('MyPPNTMNT','IDstore');
      $('#frappointment_done').remove();
      var mtime=$('#appTime').val();
      var identification=$('#appIdentification').val();
      var details=$('#appDetails').val();
      regist="\{\"time\":\""+mtime+"\",\"identification\":\""+identification+"\",\"details\":\""+details+"\" \}";
      LoadAppnt(regist,0); 
      $('#citaVTN').hide();
    }


    /*Carga la herrramienta de busqueda de pacientes para seleccionar uno, 
      devuelve el valor seleccionado a la ventana de edicion de citas*/

    function FindPatient(campos)
    { $('#qwerty').modal('show');

      var data=$('#llave').serialize();
      data=data+'&url=appointment.patient&campos='+campos;      
      clearModal();
      $.post('list', data, function(subpage){
        $("#parr1").html(subpage);
      });
    }

    function CumplimentarCita(idLn)
    {
      a=confirm('You want to execute appointment ?');
      if (!a) return;
      var $horaC=$('#H'+idLn).text();
      var $doctor=$('#mYappDr_code').val();
      var $fecha=(($('#mYsetDate').val()).replace('-','')).toString();
          $fecha=$fecha.replace('-','');
      $identification=($('#I'+idLn).text()).trim();    
      <?php $DoneDate=date("Y-m-d");  $DoneTime=substr(date("Y-m-d h:i:s"), 11); ?>
      $id=$doctor+$fecha+idLn.substring(6,10);
      $('#doneappID').val($id);
      $('#DoneAppointment').submit();

      markLikeDone (idLn);

      $('#ACT_Identification').val($identification); 
      
    }


    function SaveAppointmentDone(forma,vista) {
        var data=$('#'+forma).serialize();
        $.post(vista, data, function(subpage){  
            cambiaPaciente('pasient_act'); 

          })
    }

    /*Borra cita desde ventana de edicion y la oculta*/

    function DelAppointment() {
        $horaC=$('#appTime').val();
        $('#appIdentification').val("");;
        elimina('MyPPNTMNT', '');
        idLn=('hspc'+$horaC.replace(':','')).substring(0,8);
        $('#D'+idLn).html(' ');
        $('#P'+idLn).html(' ');    
        $('#citaVTN').hide();   
    }
</script>