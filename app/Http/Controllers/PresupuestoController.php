<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuesto;
use Illuminate\Support\Facades\DB;

class PresupuestoController extends Controller
{
    /* Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function all($instancia)
    {
        $presupuestos = DB::table('presupuestos')->where([['instancia', '=', $instancia]])->get();
        return $presupuestos;
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $presupuesto = new Presupuesto;
        $presupuesto->fecha_creacion  = $request->fecha_creacion;
        $presupuesto->nombre          = $request->nombre;
        $presupuesto->nombre_unidad   = $request->nombre_unidad;
        $presupuesto->num_presupuesto = $request->num_presupuesto;
        $presupuesto->instancia       = $request->instancia;
        $presupuesto->importe         = $request->importe;

        $presupuesto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $presupuesto = Presupuesto::findOrFail($request->id);
        $presupuesto->fecha_creacion  = $request->fecha_creacion;
        $presupuesto->nombre          = $request->nombre;
        $presupuesto->nombre_unidad   = $request->nombre_unidad;
        $presupuesto->num_presupuesto = $request->num_presupuesto;
        $presupuesto->instancia       = $request->instancia;
        $presupuesto->importe         = $request->importe;

        $presupuesto->save();
        return $presupuesto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $presupuesto = Presupuesto::destroy($request->id);
        return $presupuesto;
    }

    public function cambiarInstancia(Request $request) {

        //reemplacé el find con esto tomado del metodo all
        $presupuesto = DB::table('presupuestos')->where('id', '=', $request->id)->get();
        $presupuesto->instancia = $request->instancia;
        $presupuesto->save();
        return $presupuesto;
    }
}
