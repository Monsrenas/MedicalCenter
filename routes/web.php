<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if(!isset($_SESSION)){		session_start();		}


Route::get('/login', function () { return view('LoginPage');});


Route::group(['middleware' => 'IsAuten'], function(){

		if ((isset($_SESSION['dr_user']))&&($_SESSION['acceslevel']>4)) {
			Route::get('/', function () {    return view('AdminPanel.layout');   });

			Route::get('edituser','AccesController@edit_user');
			Route::post('changepassword', function () {
    													return view('AdminPanel.Changepassword');});
			Route::post('saveuser','AccesController@user_store');
			Route::get('deleteuser','AccesController@destroy');
			Route::post('dochangepassword','AccesController@change_password');
		} else {
				Route::get('/', function () {return view('layout.main');});

				if ((isset($_SESSION['dr_user']))){
								Route::get('edit', function () {return view('edit_patient');});
								Route::get('renderView', 'ScreenSeccion@index');
								Route::get('find', 'DataController@busca');
								Route::get('list', 'DataController@multifind');
								Route::get('flexlist', 'DataController@fleXmultifind');
								Route::get('findbyId', 'DataController@findbyId');
								Route::post('store', 'DataController@almacena');
								Route::post('IDstore', 'DataController@IDstore');
								Route::post('delete', 'DataController@borra');
								Route::get('patientcng', 'DataController@ChangePatient');

								Route::get('buscaAdmission', 'DataController@buscaAdmission');
								
							}		
		}

		
    });


/*User operation*/ 

Route::post('USERmultifind','AccesController@xmultifind');

Route::post('accestrue','AccesController@change_user');



Route::get('userlogout','AccesController@logoff');

Route::post('finduser','AccesController@find_user');




Route::get('UserCng/{iden}', function($iden){
												if(!isset($_SESSION)){		session_start();		} 
												$_SESSION['dr_user']=$iden;
												return  redirect('/');
});








/*Main Menu*/
/*
Route::get('/Patients', function () {
    return view('history.Patients');
});


Route::get('PatienCng/{iden}', function($iden){
	if(!isset($_SESSION)){
    session_start();
} 
	$_SESSION['identification']=$iden;
	return  redirect('/');
});

/*Patient operations*/ /*
Route::post('almacena', 'PatientController@almacena');
Route::post('almacenaNotas', 'PatientController@almacenaNotas');
Route::post('pfind','PatientController@pfind');
Route::post('add','PatientController@store');
Route::post('Genfind','PatientController@Genfind');
Route::get('multifind','PatientController@multifind');
Route::get('delete','PatientController@destroy');



/*User operation*/ /*

Route::post('USERmultifind','AccesController@xmultifind');

Route::post('accestrue','AccesController@change_user');

Route::post('changepassword', function () {
    return view('history.AdminPanel.Changepassword');
});

Route::get('userlogout','AccesController@logoff');
Route::post('edituser','AccesController@edit_user');
Route::post('finduser','AccesController@find_user');
Route::post('saveuser','AccesController@user_store');
Route::get('deleteuser','AccesController@destroy');
Route::post('dochangepassword','AccesController@change_password');

Route::get('UserCng/{iden}', function($iden){
	if(!isset($_SESSION)){
    session_start();
} 
	$_SESSION['dr_user']=$iden;
	return  redirect('/');
});*/