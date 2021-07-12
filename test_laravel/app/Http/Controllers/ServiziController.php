<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servizi;

class ServiziController extends Controller

{
    
  /*  public function servizi(Request $request){
        $conn = mysqli_connect("localhost","root","","hotel"); 
        $search = "SELECT * FROM servizi";
        $servizi =  mysqli_query($conn,$search);
        $array = array();
       
        if(mysqli_num_rows($servizi)>0){
           
            while($row = $servizi->fetch_assoc()) {
                $array[] = array(
                    'titolo' => $row["titolo"],
                    'immagine'=> $row["immagine"],
                    'descrizione'=> $row["descrizione"]
                );
            }
           $jsonStr = json_encode($array);
            echo ($jsonStr);
           
        }

    }*/



    public function getAllServiziUsingModel()
    {
        $servizi= servizi::all();
        return $servizi;
    }
}
