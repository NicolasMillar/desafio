<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AncestorController extends Controller
{
    

    function IsAncestor(Request $request){

        //funcion para validar recursiva
        function validar($tree, $u, $v){
            if ($u == $v) {
                return "Yes";
            }
            if(array_key_exists($u, $tree)){
                foreach($tree[$u] as $clave){
                    return validar($tree, $clave, $v);
                }
            }
            return "No";
        }

        //obtencion de datos
        $input = $request->input('input');
        $verficar = explode("\n", $input);
        $finalInput = array();
        $test = array();
        for($i=0; $i<sizeof($verficar); $i++){
            array_push($test, explode(" ", $verficar[$i]));
        }
        for($i=0; $i<sizeof($test); $i++){
            for($j=0; $j<sizeof($test[$i]); $j++){
                if(intval($test[$i][$j]) !== 0){
                    array_push($finalInput, intval($test[$i][$j]));
                }
            }
        }

        //creacion del arbol
        $tree = array();
        $i=2;
        for($cont = 1; $cont < $finalInput[0]; $cont++){
            $tree[$finalInput[$i]][]=$finalInput[($i+1)];
            $i=$i+2;
        }

        //verificacion de ancentros
        $response = array();
        for($cont=0; $cont < $finalInput[1]; $cont++){
            array_push($response, validar($tree, $finalInput[$i], $finalInput[($i+1)]));
            $i=$i+2;
        }
        return view('welcome', compact('response'));
    }

}
