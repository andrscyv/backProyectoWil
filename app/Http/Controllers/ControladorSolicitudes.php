<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;

class ControladorSolicitudes extends Controller
{
    //

    public function nuevaSolicitud(Request $r){

    	$nom = $r->input('nom');
    	$mail = $r->input('mail');
    	$nomEmp = $r->input('nomEmp');
    	$tel = $r->input('tel');
    	$body = $r->input('body');

    	$sol = new Solicitud;
    	$sol->nombre = $nom;
    	$sol->correo = $mail;
    	$sol->empresa = $nomEmp;
    	$sol->telefono = $tel;
    	$sol->descripcion = $body;

    	$sol->save();

    	return view('solicitud');


    }
}
