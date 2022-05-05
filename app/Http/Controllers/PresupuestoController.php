<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuesto;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuesto::all();
        return $presupuestos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
}
