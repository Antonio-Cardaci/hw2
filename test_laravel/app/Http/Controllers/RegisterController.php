<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User;

class RegisterController extends Controller
{
    //Questo controller implementa la logica della registrazione
    

    public function register(Request $request)
    {
        //$conn = mysqli_connect("localhost","root","","hotel");
       /* $username = $_POST['username'];
        $password = $_POST['password'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];*/
        $username= $request->input('username');
        $password = $request->input('password');
        $nome= $request->input('nome');
        $cognome= $request->input('cognome');
        $email= $request->input('email');
       // $search = "SELECT * FROM users WHERE username = '$username'";
        $utente= User::where('username',$username)->get();
        //return $utente;
       // $utente =  mysqli_query($conn,$search);

        if($utente->count()>0){
            $jsonData = array(
                'result' => 'notOk',
                'message' => "Username gia' utilizzato",
                );
                
                $jsonStr = json_encode($jsonData);
                return $jsonStr;
        }
       else{
		   
			$insert = User::insert(
				['username' =>$username, 'password' => $password, 'nome' => $nome, 'cognome' => $cognome, 'email' => $email]
			);
			

           if($insert){
                $jsonData = array(
                'result' => 'ok',
                'message' => 'Registrazione avvenuta con successo'
                );
                
               $jsonStr = json_encode($jsonData);
               return $jsonStr;
              
          } else{
                $jsonData = array(
                'result' => 'notOk',
                'message' => 'Si e\' verificato un errore, riprovare',
                );
                
               $jsonStr = json_encode($jsonData);
                return $jsonStr;
          }
        
    }
}
}
