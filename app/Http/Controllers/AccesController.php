<?php

namespace App\Http\Controllers;
use App\Login;

use Illuminate\Http\Request;

class AccesController extends Controller
{
    public function index()
    {
        return Login::all();
    }


    public function change_user(Request $request)
    {	/*se esta actualizando*/
        if(!isset($_SESSION)){
                                session_start();
                            }
        $usr=strval($request->user);
        $psw=strval($request->password);
        $incriptPsw=bcrypt($psw);
        $matchThese = ['user' => $usr, 'password' => $psw];
        $matchTheseOld = ['user' => $usr, 'password' => $incriptPsw];

    	$user = Login::where($matchThese)->
                       orWhere($matchTheseOld)->first();
        
    	if (!is_null($user)) {     
                                $_SESSION['dr_user'] = $user->user;
                                $_SESSION['username' ]= $user->name." ".$user->surname;
                                $_SESSION['acceslevel']= (int) $user->acceslevel;
                                $_SESSION['speciality']= ((isset($user->speciality)) ? $user->speciality:"");
                                
                                if ($user->password=='12345') {
                                                                return view('AdminPanel.Changepassword')->with('error','You must change the password');}
                                return redirect('/');
    			 				}

    	else { if (isset($_SESSION['dr_user'])) { 
                                                unset($_SESSION['dr_user']);
                                                unset($_SESSION['username']);
                                                unset($_SESSION['acceslevel']);
                                                unset($_SESSION['speciality']); 
                                              }	
             }
        return redirect('login');       
	}

    public function find_user(Request $request)
    {   /*se esta actualizando*/                 
        $usr=strval($request->user);
        $matchThese = ['user' => $usr];
        $user = Login::where($matchThese)->first();
        if (isset($request->noview)) { return $user;}
        return view('AdminPanel.editUser')->with('userdata',$user);       
    }

  public function change_password(Request $request)
    {   /*se esta actualizando*/
        if ($request->password<>$request->rnew) {return view('AdminPanel.Changepassword')->with('error','New password and repeat password are diferent');}                     
        $usr=strval($request->user);

          $request->password = bcrypt($request->password);

        $matchThese = ['user' => $usr];
        $user = Login::where($matchThese)->first();

        if (is_null($user)) {return view('AdminPanel.Changepassword')->with('error','Wrong username');}

        if ($user->password<>$request->current) {return view('AdminPanel.Changepassword')->with('error','User password incorrect');}
         if (!is_null($user)){  
                                $user->password=$request->password;
                                $user->save();
                                }
        return redirect('/login');       
    }


    public function xmultifind(Request $request)
    {   /*se esta actualizando*/
        $ert=strval($request->findit);
        if ($request->findit<>''){
                $user = Login::where('identification', 'like', "%{$request->findit}%")->
                                          orWhere('user', 'like', "%{$request->findit}%")->
                                          orWhere('name', 'like', "%{$request->findit}%")->
                                          orWhere('surname', 'like', "%{$request->findit}%")->get();
                                 } else { $user = Login::get();}

        if (!is_null($user)) {  
                                return view('AdminPanel.Userindex')->with('user',$user);
                                }
        else { return view('AdminPanel.layout')->with('user',$user); }   
    }

    public function edit_user(Request $request)
    {   /*se esta actualizando*/               
        $usr=strval($request->user);
        $psw=strval($request->password);
        $matchThese = ['user' => $usr];

        $user = Login::where($matchThese)->first();
        if (is_null($user)) { $user=$request; }

        return view('AdminPanel.editUser')->with('userdata',$user);    
    }

    public function user_store(Request $request)
    {   
       $ert=strval($request->user);
       if  (isset($request->rstpass)&&$request->rstpass='on') {$request["password"]='12345';}
       
       $usr = Login::where('user','=', $ert)->first();
        if (!is_null($usr)){ $usr->update($request->all()); }                
            else { if (!$request->user='') $usr = Login::create($request->all()); }                       
        return view('AdminPanel.editUser')->with('userdata',$usr);
    }

    public function destroy(Request $request){ 
    $user=Login::where('user','=', $request->user)->first();
    $user->delete();
     $user = Login::get();
    return view('AdminPanel.Userindex')->with('user',$user);  
    }


    public function logoff(Request $request) {

        if(!isset($_SESSION)){
        session_start();
    } 
    session_destroy();

    return redirect('/login');
    }
}
