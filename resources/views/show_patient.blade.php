
<?php use App\Patient;
    $patientSTATUS='';
?>

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

    @if (isset($_SESSION['status']))
        <?php                     
            $statusTXT=($_SESSION['status']=='1')?'Hospitalized':'';
            $patientSTATUS=' ( Status: '.$statusTXT.' )'; 
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
        .tqtInterior {padding-left: 60px; }
    </style>

<div class="dropdown" style="">
  <button class="btn btn-default dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #7386A1; color: blue; height: 28px; border-radius: 0em; border-style: none;">
    <strong>Patient Information</strong>
    {{$patient->name}}  {{$patient->surname}} <span style="color: yellow;"> {{$patientSTATUS}} </span>
  </button>
<div class="dropdown-menu verde" aria-labelledby="dropdownMenuButton" style="max-width: 100%;">


     <form  action="javascript:LoadDataInView('formacompleta','find')" method="get" id="formacompleta" name="formacompleta" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
            <input type="hidden" name="modelo" id="modelo" value="Patient" />
            <input type="hidden" name="url" id="url" value="show_patient" />
            <input type="hidden" name="_method" value="get">
    </form>
                 
    <div class="row" style="padding: 1%; border-width:1px;  align: center;  width: 100%; margin-left: 2px; font-size: small; margin: 0px;">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <label>Identification: </label><a><big>  {{ $identification }}</big> </a> <br><br>   

        <div class="form-inline">
                    <div class="form-group">
                        <label>Surname:</label><a><big> {{ $patient->surname }}</big></a>
                    </div>
                    
                    <div class="form-group tqtInterior">
                        <label>Name:</label><a><big> {{ $patient->name }}</big></a>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth:</label><a><big> {{ $patient->DOB }}</big></a>
                    </div>
        </div> <br><br>


        <div class="form-inline">    
                    <div class="form-group">
                        <strong> Nationality: </strong>
                        <?php include(app_path().'/Includes/ArraysForSelect.php') ?>
                        <a><big> <?php  echo($pais[$patient->nationality]); ?></big></a>
                    </div>
        </div> <br><br>

        <div class="form-inline">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label>Sex:</label><a><big> {{$patient->sex}}</big></a>
                      </div>
                    </div>

                    <div class="form-group tqtInterior">
                        <label>Marital Status:</label>
                       <a><big> <?php  echo($maritalStts[$patient->maritalStts]); ?></big></a>   
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
                    <div class="form-group tqtInterior">
                        <label>Email:</label><a><big>  {{ $patient->email }}</big></a>
                    </div>
        </div>
        <br><br>
        @if (isset($patient->nxOfKin))
        <div class="form-inline" >

                    <div class="form-group">
                        <label>Next of kin:</label><a><big> {{ $patient->nxOfKin }}</big></a>
                    </div>
                    <div class="form-group tqtInterior">
                        <strong>Relationship:</strong>
                        <a><big> <?php  echo($Relationship[$patient->relation]); ?></big></a>
                    </div>
        </div>
        <div class="form-inline">
                    <div class="form-group">
                        <label>Contact information:</label><a><big> {{ $patient->contact }}</big></a>
                    </div>
        </div>
        @endif    
 
        
    </div> <!-- Fin del <div class="row ">  -->
</div>
</div> 

<script>
        $('#ptdt').find('input, textarea, button, select').attr('disabled','disabled');
</script>