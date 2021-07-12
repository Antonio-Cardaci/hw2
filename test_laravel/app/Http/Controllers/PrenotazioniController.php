<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contenuti;
use App\Models\prenotazioni;
use Session;

class PrenotazioniController extends Controller
{
    
	
	public function prenotazioni(){
		$stanze = contenuti::all();
		$prenotazioni=prenotazioni::all();
		return view('prenotazioni')->with('csrf_token',csrf_token())->with('stanze', $stanze)->with('prenotazioni', $prenotazioni);
    }
	
	
	public function checkPrenotazioni(Request $request){
		$username = Session::get('username');
		$dataDa = $request->input('dataDa');
		$dataA = $request->input('dataA');
		
		$prenotazione = prenotazioni::where("username",$username)->join('contenuti','prenotazioni.id_stanza','=','contenuti.id')->where("data_prenotazione",$dataDa)->where("data_fine_prenotazione",$dataA)->get();
		//$jsonStr = json_encode($elemento);
		return $prenotazione;
	}

	public function addPrenotazione(Request $request){
		$username = Session::get('username');
		$dataDa = $request->input('dataDa');
		$dataA = $request->input('dataA');
		$idStanza = $request->input('id_stanza');

		$prenotazione = new prenotazioni();
		$prenotazione->username = $username;
		$prenotazione->data_prenotazione = $dataDa;
		$prenotazione->id_stanza = $idStanza;
		$prenotazione->data_fine_prenotazione = $dataA;
		
		$prenotazione->save();

		if($prenotazione){

			$jsonData = array(
				'result' => 'ok',
				'message' => 'Prenotazione effettuata con successo.',
			);
				
			
	    }else{
			$jsonData = array(
			'result' => 'notOk',
			'message' => 'Si e\' verificato un errore, riprovare',
			);
	 	}
		$jsonStr = json_encode($jsonData);
		return $jsonStr;
	}


public function removePrenotazione(Request $request){
		$username = Session::get('username');
		$idStanza = $request->input('id_stanza');
		
		

		$delete= prenotazioni::where('username',$username)->where('id_stanza',$idStanza)->delete();
	
		if($delete){
			$elemento = array(
				'result' => 'ok',
				'message' => 'Cancellazione effettuata con successo.',
			);
		}
		else {
			$elemento = array(
				'result' => 'notOk',
				'message' => 'Si e\' verificato un errore, riprovare',
			);
		}
		$jsonStr = json_encode($elemento);
		return ($jsonStr);
	}

}		
?>		
