
<?php use App\Patient;?>

   @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    

    @if (isset($patient))
           <?php    $patient=$patient[0];
                    $identification=$patient->identification; 
                    $patientActive=true;
           ?>
    @else              
           <?php                     
            $patient=new Patient;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>           
    @endif

   <style type="text/css">
         .verde {background: #E3F8CD;
                    border-style:solid; border-color:#C5F596;
                }
        .form-inline { font-family: arial, helvetica, sans-serif; 
                 margin-top: 0px;
                 margin-bottom: 0px;
                }

        .form-group { font-family: arial, helvetica, sans-serif; 
                 margin-right: 0px;
                 margin-left: 0px;
                }
    </style>

<div class="dropdown" style="margin-left: -6px;">
  <button class="btn btn-default dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <strong>Patient Information</strong> <br>
    {{$patient->name}} {{$patient->surname}}
  </button>
<div class="dropdown-menu verde" aria-labelledby="dropdownMenuButton" style="margin-left: -100px; max-width: 145%;">


     <form  action="javascript:LoadDataInView('formacompleta','find')" method="get" id="formacompleta" name="formacompleta" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
            <input type="hidden" name="modelo" id="modelo" value="Patient" />
            <input type="hidden" name="url" id="url" value="show_patient" />
            <input type="hidden" name="_method" value="get">
    </form>
                 
    <div class="row" style="padding: 1%; border-width:1px;  align: center;  width: 100%; margin-left: 2px; font-size: x-small; margin: 0px;">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <label>Identification: </label><a><big>  {{ $identification }}</big> </a>    

        <div class="form-inline">
                    <div class="form-group">
                        <label>Surname:</label><a><big> {{ $patient->surname }}</big></a>
                    </div>
                    
                    <div class="form-group">
                        <label>Name:</label><a><big> {{ $patient->name }}</big></a>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth:</label><a><big> {{ $patient->DOB }}</big></a>
                    </div>
        </div>


        <div class="form-inline">    
                    <div class="form-group">
                        <strong> Nationality: </strong>
                        <?php include(app_path().'/Includes/paises.php') ?>
                        <a>
                        {{ paises() }}
                        </a>
                        <script type="text/javascript"> var nation="<?php  echo  $patient->nationality; ?>"; </script>
                    </div>
        </div>

        <div class="form-inline">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label>Sex:</label><a><big> {{$patient->sex}}</big></a>
                      </div>
                    </div>

                    <div class="form-group">
                        <label>Marital Status:</label>
                        <a >
                        <select name="maritalStts"id="marital" required disabled="true">
                            <option value="S" >Single</option>
                            <option value="M" >Married</option>
                            <option value="D" >Divorced</option>
                            <option value="W" >Widowed</option>
                        </select>
                        </a>
                         <script type="text/javascript"> var marital="<?php  echo  $patient->maritalStts; ?>"; </script>    
                    </div>
        </div>
        <br><br>
        <div class="form-inline">
                    <div class="form-group">
                        <label>Address: </label><a><big> {{ $patient->addres }}</big></a>
                    </div>
        </div>

        <div class="form-inline">
                    <div class="form-group">
                        <label>Telephone:</label><a><big> {{ $patient->telephone }}</big></a>
                    </div>
                    <div class="form-group">
                        <label>Email:</label><a><big>  {{ $patient->email }}</big></a>
                    </div>
        </div>
        <br><br>
        <div class="form-inline" >

                    <div class="form-group">
                        <label>Next of kin:</label><a><big> {{ $patient->nxOfKin }}</big></a>
                    </div>
                    <div class="form-group">
                        <a>
                        <strong>Relationship:</strong>
                        <select name="relation" id="myrelation" required disabled="true">
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
                        </a>
                        <script type="text/javascript"> var srelation="<?php  echo  $patient->relation; ?>"; </script>
                    </div>
        </div>
        <div class="form-inline">
                    <div class="form-group">
                        <label>Contact information:</label><a><big> {{ $patient->contact }}</big></a>
                    </div>
        </div>
            
 
        
    </div> <!-- Fin del <div class="row ">  -->
</div>
</div>
          
    <script>
 
        $('#ptdt').find('input, textarea, button, select').attr('disabled','disabled');
        function iniSelect(elm, vlr){  document.getElementById(elm).value=vlr;}

        iniSelect("nation",nation);
        iniSelect("myrelation",srelation);
        iniSelect("marital",marital);

        if(document.forms[1].length > 0) {
                                        
                                        if(document.forms[1].elements.length > 0) {
                                                                                    document.forms[1].elements[1].focus();
                                                                                  }
                                        for (i = 2; i < document.forms[2].elements.length; i++) {
                                                                               
                                                                            document.forms[2].elements[i].disabled =true; 
                                                                           
                                                                         };
                                       }

  
    

</script>