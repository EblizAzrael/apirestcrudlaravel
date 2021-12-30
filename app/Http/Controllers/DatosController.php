<?php

namespace App\Http\Controllers;

use App\Datos;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DatosController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Datos::all();
        return response()->json(['data' => $datos]);
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
        $fila_datos = Datos::create($request->all());
        
        return response()->json(['data' =>$fila_datos],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fila_datos = Datos::findOrFail($id);
        return response()->json(['data' => $fila_datos],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos $datos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fila_datos = Datos::findOrFail($id);
        
        if($request->has('dato1')){
            $fila_datos->dato1 = $request->dato1;
        }
        if($request->has('dato2')){
            $fila_datos->dato2 = $request->dato2;
        }
        if($request->has('dato3')){
            $fila_datos->dato3 = $request->dato3;
        }
        if(!$fila_datos->isDirty()){
            return $this->errorResponse('Se debe cambiar al menos un dato', 422);
        }
        
        $fila_datos->save();        
        return response()->json(['data' => $fila_datos],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fila_datos = Datos::findOrFail($id);
        $fila_datos->delete();        
        return response()->json(['data' => $fila_datos],200);
    }
}
