<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
use App\Login;
use App\Discharge;
use App\Services;
use App\Appointment;
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
          case 'Discharge': return $tmodelo= new Discharge; break;   
          case 'Appointment': return $tmodelo= new Appointment; break;
          
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
                                if (isset($request->campos)) { return $view->with('patient',$patient)->with('campos',$request->campos);}
                                return $view->with('patient',$patient);
                                }
        else { 

                if (isset($request->campos)) {  return  $view->with('campos',$request->campos);}
                return 'identification'; 
             }   
    }


    public function fleXmultifind(Request $request)
    {   
        $viewx=$this->indexView($request);
        $classdata=$this->modelo($request->modelo);
        $ert=strval($request->findit);
        
        if ($ert<>''){
                $patient = ($classdata)::where('id', 'like', "%{$request->findit}%")->
                                          orWhere('identification', '=', "{$request->findit}")->
                                          orWhere('identification', '=', "{$request->identification}")->orderBy('created_at', 'desc')->get();

                                 } else {$patient = ($classdata)::orderBy('created_at', 'desc')->get(); }

        if (isset($request->option)) {$patient->option=$request->option;}

        $jsonData = json_encode($patient);                         
        if (count($patient)>0) {  if (isset( $request->noview )) {return $patient;}
                                  return $viewx->with('patient',$patient);}

        if (isset( $request->noview )) {return $patient;}                          
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

 public function findbyDate(Request $request, $classdata)
    {   
        
        if (!($request->identification)) {return; }
        $ptn='';
        if (($request->Date_from)and($request->Date_to)) 
            { $ptn='0';} else { 
                              if ($request->Date_from) {$ptn='1';} else { 
                                                                        if ($request->Date_to){$ptn='2';}
                                                                      } 
                              }
        
        $carbon = new \Carbon\Carbon();
        
        $dateIn = ($request->Date_from)? $carbon->createFromDate($request->Date_from):'';
        $dateFi = ($request->Date_to)? $carbon->createFromDate($request->Date_to):'';

        switch ($ptn) {
           case '0': 
             $patient = ($classdata)::where('identification','=', "{$request->identification}")->
                                      where('created_at','>',$dateIn)->
                                      where('created_at','<',$dateFi)->orderBy('created_at','desc')->get();
             break;
           case '1':
             $patient = ($classdata)::where('identification','=', "{$request->identification}")->
                                      where('created_at','>',$dateIn)->orderBy('created_at','desc')->get();
             break;
           case '2':
             $patient = ($classdata)::where('identification','=', "{$request->identification}")->
                                      where('created_at','<', $dateFi)->orderBy('created_at','desc')->get();
             break;
           default:
             $patient = ($classdata)::where('identification','=', "{$request->identification}")->orderBy('created_at','desc')->get();
             break;
         } 
        return $patient;
    }

    public function findAppoinment(Request $request)
    {   
        $viewx=$this->indexView($request);
        $classdata=$this->modelo($request->modelo);
        $patient = ($classdata)::where('dr_code', '=', "{$request->dr_code}")->
                                 where('date', '=', "{$request->date}")->orderBy('time')->get();                                
        if (!count($patient)) { return $viewx->with('patient',$request); }
        return $viewx->with('patient',$patient);
    }


   public function destroy(Request $request, $classdata){
       
     if ($request->identification) {
                                    $campo='identification';
                                    $ert=$request->identification;
   } else {
            $campo='id';
            $ert=$request->id;
   }

     $patient=($classdata)::where($campo,'=', $ert)->first();

     $patient->delete();
     return $patient;  
	}

    public function almacena(Request $request) 
    {  
    	$view=$this->indexView($request);
    	$classdata=$this->modelo($request->modelo);
      $result=$this->Genstore($request, $classdata);
      if ($request->noview){return $result;}
      return $view->with('patient',$result); 
    }

    public function busca(Request $request) 
    { 
      if (!$request->noview){ $view=$this->indexView($request);} 
    	$classdata=$this->modelo($request->modelo);
      $result=$this->Genfind($request, $classdata);
      if ($request->noview){return $result;}
      return $view->with('patient',$result); 
    }

    public function buscaAdmission(Request $request) 
    { 
      if (!$request->noview){ $view=$this->indexView($request);} 
      $classdata=$this->modelo('Admission');
      $result=$this->Genfind($request, $classdata);
      $classdata=$this->modelo('Discharge');
      $result1=$this->Genfind($request, $classdata);
      if ($request->noview){return $result;}
      return $view->with('patient',$result)->with('discharge',$result1); 
    }

    public function Facturacion(Request $request)
    {     
      $lst=[0=>['Interrogation','CSL'],1=>['Discharge','HPT'],2=>['Exams','LXM'],3=>['Physical','FXM']];
      $carbon = new \Carbon\Carbon();
      $view=$this->indexView($request);
      $services=[];  
      $i=0;
        for ($y=0; $y<count($lst); $y++) { 
          
          $classdata=$this->modelo($lst[$y][0]);
          $result=$this->findbyDate($request, $classdata);
          
          foreach ($result as $elm) {
             $doc=($y==1)?$elm->user_id:substr($elm->id, 8+strlen($elm->identification));
             $doc= Login::where('user', $doc)->first();
             $doc= (isset($doc->surname))?$doc->surname:''; 
            $tmp=['code'=> $lst[$y][1],'identification'=> $elm->identification, 'date'=> substr($elm->created_at,0, 10),'id'=>$doc ];
           switch ($y) {
              case 0: $tmp['details']= substr($elm->cc, 0,100); break;
              case 1: $tmpd=(isset($elm->admission_date))?$elm->admission_date:$tmp['date'];
                      $dateIn = $carbon->createFromDate($elm->date);
                      $dateFi = $carbon->createFromDate($tmpd);

                      $tmp['details']=date_diff($dateFi, $dateIn)->days.' Day(s)'.', From: '.$tmpd.' to: '.$elm->date.'. '.substr($elm->discharge_reason, 0,100);  
                      $tmp['date']=$tmpd;  
              break;
              case 2: $tmp['details']=count($elm->exams).' laboratory exam(s): ';
                      for ($z=0; $z<count($elm->exams); $z++) { 
                        $coma=($z>0)?', ':'';
                        $tmp['details']=$tmp['details'].$coma.$elm->exams[$z][0];
                      }             
               break;
              case 3: $tmp['details']= 'A physical examination done'; break;
           }
           if (!($tmp['details'])) {$tmp['details']='.';}      
              $services[$i]=$tmp;
              $i=$i+1;  
          }

        }
        $services=collect($services)->sortBy('date');
        return $view->with('patient',$services);
    }


 public function FindConsultation(Request $request)
    {   /*Lista combinada de Interrogation, Exams y Physical*/  
      $lst=[0=>['Interrogation','CSL'],1=>['Physical','FXM'],2=>['Exams','LXM']];
      $request->noview=true;

      $view=$this->indexView($request);

      $services=[];  
      $i=0;
        for ($y=0; $y<count($lst); $y++) { 
          $request->modelo=$lst[$y][0];
          $classdata=$this->modelo($lst[$y][0]);
          $result=$this->fleXmultifind($request, $classdata);
            
          foreach ($result as $elm) { 
            $idx=substr($elm->id,0, 8);
            $tmp=['identification'=> $elm->identification, 'date'=> substr($elm->created_at,0, 10),'id'=>$elm->id ];
            $tmp['service'][$y]=true;

            if (!isset($services[$idx])) {
                 $services[$idx]=$tmp;
                 $i=$i+1;
             } else {$services[$idx]['service'][$y]=true;}
              
          }

        }

        $services=collect($services)->sortByDesc('date');
        return $view->with('patient',$services);
    }


     public function Comprobar(Request $request)
    {     
      $lst=[0=>['Interrogation','CSL'],1=>['Discharge','HPT'],2=>['Exams','LXM'],3=>['Physical','FXM']];
      $comprometidos=0;
        for ($y=0; $y<count($lst); $y++) { 
          $classdata=$this->modelo($lst[$y][0]);
          $result=$this->findbyDate($request, $classdata);
          $comprometidos=$comprometidos+count($result);  
        }
      return $comprometidos;
    }

    public function borra(Request $request) 
    {   
    	$classdata=$this->modelo($request->modelo);
      $result=$this->destroy($request, $classdata);
      dump($result);
      return $result; 
    }

    public function ChangePatient(Request $request)
    {
    	if(!isset($_SESSION)){session_start();}
      $_SESSION['identification'] = $request->identification;

      $classdata=$this->modelo('Admission');
      $result=$this->Genfind($request, $classdata);

      if ($result->admission_note) {$_SESSION['status']='1';} 
        else { if (isset($_SESSION['status'])) {unset($_SESSION['status']);}
      }

      return $request;
    }
}                     