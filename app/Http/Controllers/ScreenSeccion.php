<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;

class ScreenSeccion extends Controller
{
    public function index(Request $request){
	        $view = View::make($request->url);
	         
	        if($request->ajax()){
	            return $view; 
	        }else return $view;
	}
}
