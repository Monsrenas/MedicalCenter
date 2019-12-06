
<style type="text/css">
        .list-group-item {background: #E3F8CD; }
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
                            color: yellow; 
                            margin-left: 100px;
                          }
    </style>

<script type="text/javascript">
    function AppointArray(){

        var hr=8;

        for (var i = 0; i < 12; i++) {
          for (var j = 0; j <= 45; j++) {
            hds=hr+i;
            miFecha = new Date('1','1','1',hds,j,'0');
            hds=miFecha.toString().substring(16,24);
            $hID=('hspc'+hds.replace(':','')).substring(0,8);
            $cade="<div id='I"+$hID+"' hidden> </div>"
            $cade=$cade+"<div id='P"+$hID+"' style='width:35%; float: left;text-align: left; overflow:hidden;'> </div>" 
            $cade=$cade+"<div id='D"+$hID+"' style='width:50% float: left; text-align: left;'> </div>"
            $hora="<a href='#' class='list-group-item' style='height:22px; margin-top:1px; padding-top: 1px;overflow:hidden;' onclick='showAPPnt(\""+$hID+"\")'> <div style='width: 15%; text-align: left; padding-left: 4px; float: left;' id='H"+$hID+"'>"+hds+"</div>"+$cade+"</a>";
            $('#rejilla').append($hora);
            j=j+14;

          }
        }


    }

    function showAPPnt(idLn){
        $horaC=$('#H'+idLn).text();
        
        $identification=($('#I'+idLn).text()).trim();
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
    }

    function UpdateID(){
      var $doctor=$('#setDr_code').val();
      var $fecha=(($('#appDate').val()).replace('-','')).toString();
          $fecha=$fecha.replace('-','');
      var $hora=(($('#appTime').val()).replace(':','')).substring(0,4);
      $('#appID').val($doctor+$fecha+$hora);
    }

    function LoadAppnt(mtime, identification, details){
      var idSpc=mtime.toString();
          idSpc="hspc"+(idSpc.replace(':','')).substring(0,4);
          $('#I'+idSpc).html(identification);
          RegisterRTN('&identification='+identification+'&modelo=Patient',[['#P'+idSpc,'name'],['#P'+idSpc,'surname']]);
          
          $('#D'+idSpc).html(details);
    };

    function SaveAndListUpdate(){
      SaveDataNoRefreshView('MyPPNTMNT','IDstore');
      var mtime=$('#appTime').val();
      var identification=$('#appIdentification').val();
      var details=$('#appDetails').val();
      LoadAppnt(mtime, identification, details); 
      $('#citaVTN').hide();
    }

    function FindPatient(campos)
    { $('#qwerty').modal('show');

      var data=$('#llave').serialize();
      data=data+'&url=appointment.patient&campos='+campos;      
      
      $.post('list', data, function(subpage){
        $("#parr1").html(subpage);
      });

      


    }
</script>