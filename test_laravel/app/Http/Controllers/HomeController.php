<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\contenuti;
use App\Models\preferiti;

class HomeController extends Controller
{
    public function home(Request $request){
		$username = Session::get('username');
		return view('homepage')->with('csrf_token',csrf_token())->with('username',$username);
    }
	
	
	
	public function contenutiHome(Request $request){
	    $query = contenuti::all();
		return $query;
    }
	
	
	public function search(Request $request){
        $filter = $request->input('filter');
        
	    $query = contenuti::where("titolo","like","%".$filter."%")->get(); 
		return $query;
    }
	
	public function checkPreferiti(Request $request){
        
		$username =  $request->input('username');
		$nome =  $request->input('nome');
		$query = preferiti::where("username",$username)->where("titolo",$nome)->get();
	
		if($query->count()>0){
			$elemento = array(
				'isPresent' => 'true',
			);
			$jsonStr = json_encode($elemento);
			echo ($jsonStr);
		}
		else{
			$elemento = array(
				'isPresent' => 'false',
			);
			$jsonStr = json_encode($elemento);
			echo ($jsonStr);
		}
	}
	
	public function addPreferiti(Request $request){
    	
		$username = Session::get('username');
		$titolo =  $request->input('titolo');
		$elemento = array(
			'aaa' => 'errore',
		);
		$jsonStr = json_encode($elemento);
		
		$preferito = new preferiti();
		$preferito->username = $username;
		$preferito->titolo = $titolo;
		$preferito->save();
		
		$elemento = array(
			'ok' => 'Inserimento effettuato con successo.',
			
		);
		$jsonStr = json_encode($elemento);
		return ($jsonStr);

	}
	
	public function removePreferiti(Request $request){
    	
		$username =  $request->input('username');
		$titolo =  $request->input('titolo');
	

		$delete= preferiti::where('username',$username)->where('titolo',$titolo)->delete();
		
			$elemento = array(
				'ok' => 'Rimozione effettuata con successo.',
			);
			$jsonStr = json_encode($elemento);
			return ($jsonStr);
		
			$elemento = array(
				'notOk' => 'Errore',
			);
			$jsonStr = json_encode($elemento);
			return ($jsonStr);
		
	}
}
?>