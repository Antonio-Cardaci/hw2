<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\contenuti;
use App\Models\preferiti;

class PreferitiController extends Controller
{
     public function preferiti(Request $request){
      
		$username = Session::get('username');
	   
		$listaPreferiti = preferiti::where("username",$username)->join('contenuti', 'preferiti.titolo', '=', 'contenuti.titolo')->get();
	  
		return view('preferiti')->with('preferiti',$listaPreferiti);
		
    }
}
