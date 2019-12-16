
<style type="text/css">
    #appointmentList * { list-style:none; margin-left: -10px; line-height: 6px; }
    #appointmentList li{ line-height:180%; text-align: left;}
    #appointmentList li a{color:#222; text-decoration:none;}
    #appointmentList li a:before{ content:"\025b8"; color:#ddd; margin-right:1px;}
    #appointmentList input[name="list"] {  
        position: absolute;
        left: -1000em;
        }
    #appointmentList label:before{ content:"\025b8"; margin-right:1px;}
    #appointmentList input:checked ~ label:before{ content:"\025be";}
    #appointmentList .interior{display: none;}
    #appointmentList input:checked ~ ul{display:block;}
    .MyAppListTree {overflow: auto; max-height: 400px; height: 400px;}
    .xcant {float: right; padding-left: 15px; font-size: x-small; color: blue; }
</style>
<script type="text/javascript">
    var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];

    function addDoctor($specia, $user, op){
        arbolStyle=op;
        $id='aList';
        $id=$id+($specia+$user).replace('-','');
        $id=$id.replace('-','');
        $year=$specia.substr(0,4);
        $mes=$specia.substr(5,2);
        $dia=$specia.substr(8,2);
        var txt = document.getElementById('setDr_code');

        $accion='javascript:cambiaDatos(\"'+$specia+'\",\"'+$user+'\")';
        for (var i = 0; i < txt.options.length; i++) {
                                                        if ((txt.options[i].value==$user)) {$name=txt.options[i].text}
                                                     }
        
        if (op==1) {$ax=$specia; $specia=$user; $user=$ax;}

        var $others="<li id='docNote'> <input type='checkbox' name='list' id='"+$id+"' > <label for='"+$id+"'>"+((op==1)?$specia:$name)+" </label> <ul class='interior'></ul></li>";

        var $others="<div class=\"btn\" onclick='"+$accion+"'  id='"+$id+"'>"+((op==1)?$user:$name)+"</div>";

        if (op==0)  {  
                       if (!$('#year'+$year).length) {  addDate('year'+$year, $year,'');    }
                       if (!$('#mes'+$year+$mes).length) { addDate('mes'+$year+$mes, monthNames[$mes-1], 'espacioyear'+$year); }
                       if (!$('#dia'+$year+$mes+$dia).length) { addDate('dia'+$year+$mes+$dia, $dia, 'espaciomes'+$year+$mes); }
                       if (!($('#'+$id).length)) { $('#espaciodia'+$year+$mes+$dia).append($others);}                
                    } else  {    
                                if (!$('#'+$specia).length) { addDate($specia, ((op==1)?$name:$specia),''); }
                                if (!($('#'+$id).length)) { $('#espacio'+$specia).append($others); 
                                                                                                                      } 
                                                           

                            }
       }


    function addDate($Nspeciality, $name, $position){   
        $idELM=$Nspeciality;
        var ELM = document.getElementById($idELM);
        $position=($position)?$position:'appointmentList';
        if (ELM==null) {
                $Dbtn="<div class='row d-block' style='width:80%; text-align:right;'> <a class=' btn btn-success' style='font-size:xx-small; margin:-1px; background:none; '><span class='glyphicon glyphicon-plus float-md-right ' ></span> Add doctor</a></div>";

                $others="<li><input type='checkbox' name='list' id='"+$idELM+"'> <label for='"+$idELM+"'  style='background:white; font-size:small; padding: 4px;'> "+$name+"</label> <ul class='interior'><div id='espacio"+$idELM+"'></div> </ul></li>";
                
                var txt = document.getElementById($position);
                txt.insertAdjacentHTML('beforeend', $others);
            }
       } 


    function cambiaDatos($date, $user){
        $('#notelayout').hide();
        $('#setDr_code').val($user);
        $('#setDate').val($date);
        LoadDataInView('appointment_find', 'appointmentfind','findAppoinment');
    }   
</script>