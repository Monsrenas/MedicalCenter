   <?php use App\Patient; ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Patient Data</h2>
            </div>
        </div>
    </div>

    @if (isset($patient))
           <?php 
            if (isset($patient->identification)){
                                $identification=$patient->identification;
            }  
           ?>     
    @endif   

    @if (!(isset($patient->name)))
        <?php                     
            $patient=new Patient;
            if (!isset($identification)) {$identification="";}
            
         ?>           
    @endif      


    <style type="text/css">

        .edicion .form-inline { font-family: arial, helvetica, sans-serif; 
                 margin-top: 10px;
                 margin-bottom: 0px;
                }

        .edicion .form-group { font-family: arial, helvetica, sans-serif; 
                 margin-right: 40px;
                 margin-left: 0px;
                }

         input { background: #AFC4E8; }
         select { background: #AFC4E8; }
    </style>
        
    <div class="row edicion" style="background: #6D8DC4; margin: 0 auto; ">
        
        <div class="col-xs-12 col-sm-12 col-md-12" id="dpatient" style="text-align: left;">
    
            
            <!--{{url('pfind')}}-->
            <form  action="javascript:LoadDataInView('edit_patient','formabase','find')" method="post" id="formabase" name="formabase">
                @csrf
                <input type="hidden" name="modelo" id="modelo" value="Patient" />
                <input type="hidden" name="url" id="url" value="edit_patient" />
                 <input type="hidden" name="_method" value="get">

                <input type="text" name="edition"  value="edition" hidden="true">

                <div class="form-inline">
                    <div class="form-group">

                        <strong> Identification: </strong>
                        <input type="text" name="identification" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Identification number" value='{{ $identification }}' maxlength="15" size="15"  pattern="|^[0-9   A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" onkeypress="return NoSpace(event);" id="identification" onBlur=' this.form.submit();' required> 
                    </div>    
                </div>
            </form>      
            <br>
            <form  action="javascript:GuardarUsuario()" method="post" id="editPatientForm" name="editPatientForm" enctype="multipart/form-data" autocomplete="off">
            @csrf
                <input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
                <input type="hidden" name="modelo" id="modelo" value="Patient" />
                <input type="hidden" name="url" id="url" value="edit_patient" />
                 <input type="hidden" name="_method" value="post">
                <div class="form-inline">    
                            <div class="form-group">
                                <strong> Nationality: </strong>
                                <?php include(app_path().'/Includes/paises.php') ?>
                                {{ paises() }}
                                <script type="text/javascript"> var nation="<?php  echo  $patient->nationality; ?>"; </script>
                            </div>
                            <!--
                             <div class="form-group">
                                <strong>Picture:</strong>
                                <input type="file" name="pictur" id="picture" class="form-inline" placeholder="Patien picture" value="{{ $patient->picture }}" accept="image/*">
                            </div>-->
                </div>

                <div class="form-inline">
                            <div class="form-group">
                                <strong>Surname:</strong>
                                <input type="text" name="surname" class="form-inline" placeholder="Patien surame" value="{{ $patient->surname }}" required>
                            </div>
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{ $patient->name }}" class="form-inline" placeholder="Patien name" required>
                            </div>
                            <div class="form-group">
                                <strong>Date of Birth:</strong>
                                <input type="date" name="DOB" value="{{ $patient->DOB }}" class="form-inline" placeholder="" required>
                            </div>
                </div>

                <?php $sexo=strval($patient->sex); ?>

                <div class="form-inline">
                            <div class="form-group">
                                
                                <div class="form-check form-check-inline">
                                    <strong>Sex:</strong>
                                  <input class="form-check-input" type="radio" name="sex" id="sex" value="M" <?php if ($sexo=="M") {echo "checked";}?> required>
                                  <label class="form-check-label" for="sex1">M</label>

                                  <input class="form-check-input" type="radio" name="sex" id="sex2" value="F" <?php if ($sexo=="F") { echo "checked"; } ?>  required>
                                  <label class="form-check-label" for="sex2">F</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <strong>Marital Status:</strong>
                                <select name="maritalStts"id="marital" required>
                                    <option value="S" >Single</option>
                                    <option value="M" >Married</option>
                                    <option value="D" >Divorced</option>
                                    <option value="W" >Widowed</option>
                                </select>
                                 <script type="text/javascript"> var marital="<?php  echo  $patient->maritalStts; ?>"; </script> 
                            </div>
                            <!--
                            <div class="form-group">
                                <strong>Blood group:</strong>
                                <select name="blood" id="myblood" required>
                                    <option value="O-" >O-</option>
                                    <option value="O+" >O+</option>
                                    <option value="A-" >A-</option>
                                    <option value="A+" >A+</option>
                                    <option value="B-" >B-</option>
                                    <option value="B+" >B+</option>
                                    <option value="AB-" >AB-</option>
                                    <option value="AB+" >AB+</option>
                                </select>
                                <script type="text/javascript"> var bloodtype="<?php  echo  $patient->blood; ?>"; </script>
                            </div>  -->
                </div>

                <div class="form-inline">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <input type="text" name="addres" value="{{ $patient->addres }}" class="form-inline" placeholder="Address"  maxlength="85" size="85" required>
                            </div>
                </div>

                <div class="form-inline">
                            <div class="form-group">
                                <strong>Telephone:</strong>
                                 <input type="text" name="telephone" value="{{ $patient->telephone }}" placeholder="telephone number" id="inputNumero" onkeypress="return soloNumeros(event);" required>
                            </div>
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" value="{{ $patient->email }}" class="form-inline" placeholder="email">
                            </div>

                </div>
                <br><br>
                <div class="form-inline" >
                            <div class="form-group">
                                <strong style="color: #3149D5;">Next of kin:</strong>
                                <input type="text" name="nxOfKin" value="{{ $patient->nxOfKin }}" class="form-inline" placeholder="Near relative" >
                            </div>
                            <div class="form-group">
                                <strong style="color: #3149D5;">Relationship:</strong>
                                <select name="relation" id="myrelation" >
                                    <option value="SP" >Spouse</option>
                                    <option value="PR" >Parents</option>
                                    <option value="SB" >Siblings</option>
                                    <option value="CH" >Children</option>
                                    <option value="GC" >Grandchildren</option>
                                    <option value="GP" >Grandparents</option>
                                    <option value="NN" >Nieces/Nephews</option>
                                    <option value="AU" >Aunts/Uncles</option>
                                    <option value="TC" >Great Grandchildren</option>
                                    <option value="TP" >Great Grandparents</option>
                                    <option value="GN" >Great Nieces/Nephews</option>
                                    <option value="CS" >Cousins</option>
                                    <option value="NG" >Neighbor</option>
                                </select>
                                <script type="text/javascript"> var srelation="<?php  echo  $patient->relation; ?>"; </script>
                            </div>
                </div>
                <div class="form-inline" style="color: #3149D5;">
                            <div class="form-group">
                                <strong>Contact information:</strong>
                                <input type="text" name="contact" value="{{ $patient->contact }}" class="form-inline" placeholder="Contac Infotmation"  maxlength="70" size="70" style="color: black;"  >
                            </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <br>
                </div>

            </form>
            </div>
 
        
    </div> <!-- Fin del <div class="row ">  -->
          
    <script>
            
        function GuardarUsuario(){
            var $id =$('#identification').val();
            SaveDataNoRefreshView('editPatientForm','store');
            $('#frlist_patient').remove();
            $('#fredit_patient').remove();
            NewPreLoadDataInView('#center_wind', '&modelo=Patient&url=list_patient&_method=get&findit='+$id, 'list','list_patient');        
    
        }    

        /**
         * Función que solo permite la entrada de numeros, un signo negativo y
         * un punto para separar los decimales
         */
        function soloNumeros(e)

        {
            // capturamos la tecla pulsada

            var teclaPulsada=window.event ? window.event.keyCode:e.which;
            // capturamos el contenido del input
            var valor=document.getElementById("inputNumero").value;
     
            if(valor.length<20)
            {
                // 13 = tecla enter
                // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
                // punto
                if(teclaPulsada==13)
                {
                    return false;
                }

                if(teclaPulsada==32)
                {
                    return false;
                }
     
                // devolvemos true o false dependiendo de si es numerico o no
                return /\d/.test(String.fromCharCode(teclaPulsada));
            }else{
                return false;
            }
        }


        function NoSpace(e)

        {
            // capturamos la tecla pulsada

            var teclaPulsada=window.event ? window.event.keyCode:e.which;
            // capturamos el contenido del input
            var valor=document.getElementById("inputNumero").value;
     
            if(valor.length<20)
            {
                // 13 = tecla enter
                // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
                // punto

                if(teclaPulsada==32)
                {
                    return false;
                }
     
                // devolvemos true o false dependiendo de si es numerico o no
                
                return true;
            }else{
                return false;
            }
        }

        function Marca(xL) {
            valor=document.getElementById($xL)
            alert("Prueba");
        }

        function iniSelect(elm, vlr){  

            $('#'+elm).val(vlr);

        }

        iniSelect("nation",nation);
        iniSelect("myrelation",srelation);
        iniSelect("marital",marital);
        iniSelect("myblood",bloodtype);
</script>