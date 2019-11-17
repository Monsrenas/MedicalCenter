<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Patient;
use App\Interrogation;
use App\Physical;
use App\Lastmedical;
use App\Exams;
use App\Currentmedication;
use App\Socialhistory;
use App\Familyhistory;
use App\Surgicalhistory;
use App\Sustanceuse;
use App\Physiciansnote;
use App\Admission;
use App\medUser;

if(!isset($_SESSION)){
    session_start();
}

class DataController extends Controller
{
  public function debug_to_console( $data ) 
        { $output = $data; if ( is_array( $output ) ) $output = implode( ',', $output); echo ""; }
	public function modelo($ind)
    {
        switch ($ind) {
          case 'Patient': return $tmodelo= new Patient; break;
          case 'Interrogation': return $tmodelo= new Interrogation;break;
          case 'Physical': return $tmodelo= new Physical; break;
          case 'Lastmedical': return $tmodelo= new Lastmedical; break;    
          case 'Exams': return $tmodelo= new Exams; break;    
          case 'Currentmedication':return $tmodelo= new Currentmedication; break;
          case 'Socialhistory': return $tmodelo= new Socialhistory; break;
          case 'Familyhistory': return $tmodelo= new Familyhistory; break;
          case 'Surgicalhistory': return $tmodelo= new Surgicalhistory; break;
          case 'Sustanceuse': return $tmodelo= new Sustanceuse; break; 
          case 'Physiciansnote': return $tmodelo= new Physiciansnote; break; 
          case 'Admission': return $tmodelo= new Admission; break;   
          case 'medUser': return $tmodelo= new medUser; break;   
        }
    }

     public function indexView(Request $request){
     	    $view = View::make($request->url); 
	        if($request->ajax()){
	            return $view; 
	        }else return $view;
	}

    public function Genfind($request, $classdata)
    {  
    	$ert=strval($request->identification);	

    	if ($ert==''){
    	        	if (isset($_SESSION['identification'])) {
    	                   										 $ert=$_SESSION['identification'];
    	                									}
    	}          
        $patient = $classdata::where('identification','=', $ert)->first();

         if (!(is_null($patient)))  {
                                      return $patient;
                                    } 
        return $request;
    }

    public function Genstore(Request $request, $classdata)
    {  
       $ert=strval($request->identification);
       if ( (is_null($ert)) or ($ert=='') ) { return $request; }
                       
       $patient = $classdata::where('identification','=', $ert)->first();
        if (!is_null($patient)){ $patient->update($request->all()); }                
            else { if (!$request->identification='') $patient = $classdata::create($request->all()); }                      
        return $patient; 
    }

     public function IDstore(Request $request)
    {  
       $view=$this->indexView($request);
       $classdata=$this->modelo($request->modelo);
        
       $ert=strval($request->id);


       if ( (is_null($ert)) or ($ert=='') ) { return $request; }
                       
       $patient = $classdata::where('id','=', $ert)->first();
        if (!is_null($patient)){ $patient->update($request->all()); }                
            else { if (!$request->id='') $patient = $classdata::create($request->all()); }                      
        return $request; 
        return $view->with('patient',$patient);
    }

    public function multifind(Request $request)
    {   /*se esta actualizando*/
    	  $view=$this->indexView($request);
        $ert=strval($request->findit);
        if ($request->findit<>''){
                $patient = Patient::where('identification', 'like', "%{$request->findit}%")->
                                          orWhere('id', 'like', "%{$request->findit}%")->
                                          orWhere('name', 'like', "%{$request->findit}%")->
                                          orWhere('surname', 'like', "%{$request->findit}%")->get();
                                 } else { $patient = Patient::orderBy('surname', 'asc')->get();}

        if (!is_null($patient)) { 
                                return $view->with('patient',$patient);
                                }
        else { return 'identification'; }   
    }


    public function fleXmultifind(Request $request)
    {   
        $viewx=$this->indexView($request);

        $classdata=$this->modelo($request->modelo);

        
        $ert=strval($request->findit);
        
        if ($ert<>''){
                $patient = ($classdata)::where('id', 'like', "%{$request->findit}%")->
                                          orWhere('identification', '=', "{$request->findit}")->orderBy('created_at', 'desc')->get();

                                 } else {$patient = ($classdata)::orderBy('created_at', 'desc')->get(); }
        $jsonData = json_encode($patient);                         
        if (count($patient)>0) { return $viewx->with('patient',$patient);}

        return $viewx->with('patient',$patient); 
    }


 public function findbyId(Request $request)
    {   
        $viewx=$this->indexView($request);

        $classdata=$this->modelo($request->modelo);

        $ert=strval($request->findit); 

        if ($ert<>''){
                $patient = ($classdata)::where('id', '=', "{$request->findit}")->
                                          orWhere('identification', '=', "{$request->findit}")->orderBy('created_at', 'desc')->first();
                                  
                                 } else {$patient = ($classdata)::orderBy('created_at', 'desc')->first(); }

        if (is_null($patient)) {$abcd='{"id": "'.$request->id.'","identification": "'.$request->identification.'"}'; }
            else { $abcd=$patient->toJson();}
        
        return $viewx->with('patient',$abcd);
    }

   public function destroy(Request $request){ 
     $patient=Patient::where('identification','=', $request->identification)->first();
     $patient->delete();
     $patient = Patient::get();
     return $patient;  
	}

    public function almacena(Request $request) 
    {   
    	$view=$this->indexView($request);
    	$classdata=$this->modelo($request->modelo);
      $result=$this->Genstore($request, $classdata);
      return $view->with('patient',$result); 
    }

    public function busca(Request $request) 
    { dd($request->url);
      if (!$request->noview){ $view=$this->indexView($request);} 
    	$classdata=$this->modelo($request->modelo);
      $result=$this->Genfind($request, $classdata);


      if ($request->noview){return $result;}
      return $view->with('patient',$result); 
    }



    public function borra(Request $request) 
    {   
    	$classdata=$this->modelo($request->modelo);
      $result=$this->destroy($request, $classdata);
      return $result; 
    }

    public function ChangePatient(Request $request)
    {
    	if(!isset($_SESSION)){session_start();}
      $_SESSION['identification'] = $request->identification;
      return $request;
    }
}

