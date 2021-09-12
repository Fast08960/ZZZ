<?php

namespace App\Http\Controllers;

use App\Models\BasicDates;
use App\Models\Studys;
use App\Models\WorksJobs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $datos = BasicDates::get();
        return view("index", compact('datos'));
    }

    public function create(){
        $date = date("Y-m-d");
        $date_max = strtotime ('-18 year' , strtotime($date)); 
        $date_max = date ('Y-m-d',$date_max);
        return view("create", compact('date_max', 'date'));
    }

    public function store(Request $request){
        $basic = BasicDates::create([
            'cedula' => $request['cedula'],
            'nombre1' => $request['nombre1'],
            'nombre2' => $request['nombre2'],
            'apellido1' => $request['apellido1'],
            'apellido2' => $request['apellido2'],
            'telefono' => $request['telefono'],
            'direccion' => $request['direccion'],
            'correo' => $request['correo'],
            'genero' => $request['genero'],
            'nacionalidad' => $request['nacionalidad'],
            'estado_civil' => $request['estado_civil'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'rh' => $request['rh'],
        ]);

        if(isset($request['titulo']) && count($request['titulo']) != 0){
            foreach ($request['titulo'] as $key => $tit) {
                Studys::create([
                    'id_basicos' => $basic->id,
                    'titulo' => $tit,
                    'entidad_educativa' => $request['entidad_educativa'][$key],
                    'fecha_terminacion' => $request['fecha_terminacion'][$key],
                ]);
            }
        }


        if(isset($request['empresa']) && count($request['empresa']) != 0){
            foreach ($request['empresa'] as $key => $emp) {
                WorksJobs::create([
                    'id_basicos' => $basic->id,
                    'empresa' => $emp,
                    'cargo' => $request['cargo'][$key],
                    'fecha_inicio' => $request['fecha_inicio'][$key],
                    'fecha_terminacion' => $request['fecha_terminacion_jobs'][$key] ?? null,
                ]);
            }
        }

        flash("Hoja de vida creada correctamente")->success()->important();
        return redirect()->route('index');

    }



    public function edit($id){

    }

    public function show($id){
        return $id;
    }

    public function update($id, Request $request){

    }

    public function destroy($id){

    }

    public function verifyCedula(Request $request){
        if(isset($request['cedula'])){
            $ced = BasicDates::where('cedula', $request['cedula'])->first();
            if($ced == null){
                return response()->json(['res' => true]);
            }
            return response()->json(['res' => false]);
        }
    }
}
