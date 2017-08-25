<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Tarea;
use App\Pendiente;
use App\UsuarioPendiente;
use App\Comentario;

class ControladorMiembros extends Controller
{
    //

    public function pendientes(Request $request){

    	
        $idUsu = session('idUser');
        //return Usuario::find(2)->tareas()->get();
        return Usuario::join('pendiente_usuarios','usuarios.id','=','pendiente_usuarios.usuario_id')
        				->join('pendientes','pendiente_usuarios.pendiente_id','pendientes.id')
        				->where("usuarios.id",$idUsu)
        				->select('pendientes.asunto','pendientes.descripcion','pendientes.id')
        				->get();
    }

    public function infoUsuario(Request $request){

        //if(session('esPrimera')=='true'){

        $idUsu = session('idUser');
        //$idUsu = $request->input('idUsu');
        $request->session()->put('esPrimera', 'false');
        //dd(session('ingreso'));
        return Usuario::where('usuarios.id',$idUsu)->select('usuarios.nombre','usuarios.nivel','usuarios.nivel')->get();
    //}
    }

    public function tareas(Request $request){
        $idUsu = session('idUser');
        return Tarea::where('usuario_id',$idUsu)
                    ->select('titulo','descripcion','fechaEntrega as fechaFin','id')
                    ->get();
    }

    public function agregaTarea(Request $request){
        $tarea = new Tarea;

        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->fechaIni = $request->input('fechaIni');
        $tarea->fechaEntrega = $request->input('fechaFin');
        $tarea->usuario_id = session('idUser');

        $tarea->save();
        return $tarea->titulo;


    }

    public function bajaTarea(Request $request){
        $tarea = Tarea::find($request->input('id'));
        $tarea->delete();
    }

    public function insertaPendiente(Request $request){
        $pen = new Pendiente;
        $rel = new PendienteUsuario;

        $pen->asunto = $request->input('asunto');
        $pen->descripcion = $request->input('desc');
        $pen->fechaIni = $request->input('fechaIni');
        $pen->fechaEntrega = $request->input('fechaEntrega');

        $pen->save();
        $idP = $pen->id;



    }

    public function listaMiembros(){
        return Usuario::select('nombre')->get();
    }

    public function insertaComentario(Request $request){
        $com = new Comentario;
        $com->pendiente_id = $request->input('idPendiente');
        $com->usuario_id = session('idUser');   
        $com->texto = $request->input('texto');

        $com->save();
    }

}
 