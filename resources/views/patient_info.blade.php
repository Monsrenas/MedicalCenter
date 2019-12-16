
<?php use App\Patient;?>

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
         .infoPat {
            font-size: large;
            padding: 1%; border-width:1px;  
            align: center;  width: 100%; 
            margin-left: 2px; 
            margin: 0px;
         }
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
                 
    <div class="row infoPat" style="">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <label>Identification: </label><a><big>  {{ $identification }}</big> </a>    

        <div class="form-inline">
                    <div class="form-group">
                        <label>Surname:</label><a><big> {{ $patient->surname }}</big></a>
                    </div>
                    
                    <div class="form-group tqtInterior">
                        <label>Name:</label><a><big> {{ $patient->name }}</big></a>
                    </div>

                    <div class="form-group tqtInterior">
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
        @if (isset($patient->nxOfKin))
        <br><br>
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
