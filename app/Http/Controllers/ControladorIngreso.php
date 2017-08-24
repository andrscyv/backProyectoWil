<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class ControladorIngreso extends Controller
{
    //
    public function valida(Request $request){
    	$nom = $request->input('txUsu');
    	$pswd = $request->input('txCont');

    	$user =  Usuario::where(
    		[ 	['nomUsuario' , '=', $nom],
    			['password', '=', $pswd]
    		])->first();

    	if($user){
            session(['idUser' => $user->id]);
            session(['esPrimera' => 'true']);

    		if($user->tipo == 'alumno')
    			return redirect('WIL/alumnos.html');
    		else
    			return redirect('WIL/miembros.html');
    	}
    	else
    		return redirect('WIL/index.html');
    }

    public function logOut(Request $request){
       // session(['esPrimera'=>'false']);
        $request->session()->forget('idUser');

    }

    public function ingreso(Request $request){

        if($request->session()->has('idUser')){

        $idUsu = session('idUser');
        return Usuario::where('usuarios.id',$idUsu)->select('usuarios.nombre','usuarios.nivel','usuarios.nivel')->get();

        }
        else
            return 'error';
    //}
    }
}
