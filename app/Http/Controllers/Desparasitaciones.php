<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Desparasitacion;
use Illuminate\Http\Request;

class Desparasitaciones extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index', 'create', 'edit']);
    }
    public function index()
    {
        $items = Desparasitacion::join('cliente', 'desparasitacion.cliente_id', '=', 'cliente.id')
                            ->select(
                                'cliente.paterno as paterno',
                                'cliente.materno as materno',
                                'cliente.nombre as nombre',
                                'cliente.mascota as mascota',
                                'desparasitacion.id as id_desparasitacion',
                                'desparasitacion.descripcion as descripcion',
                                'desparasitacion.created_at as fecha'
                            )
                            ->get();
        return view('modules/desparasitaciones/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('modules/desparasitaciones/create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Desparasitacion();
        $item->cliente_id = $request->id_cliente;
        $item->descripcion = $request->descripcion;
        $item->save();
        return redirect()->route('desparasitaciones-index');
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
        $clientes = Cliente::all();
        $desparasitaciones = Desparasitacion::find($id);
        return view('modules.desparasitaciones.edit', compact('clientes', 'desparasitaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Desparasitacion::find($id);
        $item->cliente_id = $request->id_cliente;
        $item->descripcion = $request->descripcion;
        $item->save();
        return redirect()->route('desparasitaciones-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Desparasitacion::find($id);
        $item->delete();
        return redirect()->route('desparasitaciones-index');
    }
}
