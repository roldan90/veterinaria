<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\Desparasitacion;
use App\Models\Vacuna;
use Illuminate\Http\Request;

class Clientes extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index', 'create', 'edit']);
    }

    public function index()
    {
        $items = Cliente::all();
        return view('modules/clientes/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules/clientes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Cliente();
        $item->paterno = $request->paterno;
        $item->materno = $request->materno;
        $item->nombre = $request->nombre;
        $item->mascota = $request->mascota;
        $item->especie = $request->especie;
        $item->descripcion = $request->descripcion;
        $item->save();
        return redirect()->route('clientes-index');
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
        $item = Cliente::find($id);
        return view('modules.clientes.edit', compact('item'));
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
        $item = Cliente::find($id);
        $item->paterno = $request->paterno;
        $item->materno = $request->materno;
        $item->nombre = $request->nombre;
        $item->mascota = $request->mascota;
        $item->especie = $request->especie;
        $item->descripcion = $request->descripcion;
        $item->save();
        return redirect()->route('clientes-index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Cliente::find($id);
        $item->delete();
        return redirect()->route('clientes-index');
    }

    public function expediente($id) {
        $cliente = Cliente::find($id);
        $consultas = Consulta::where('cliente_id', $id)->get();
        $desparasitaciones = Desparasitacion::where('cliente_id', $id)->get();
        $vacunas = Vacuna::where('cliente_id', $id)->get();

        return view(
            'modules.clientes.expediente', 
            compact('cliente', 'consultas', 'desparasitaciones', 'vacunas')
        );
    }
}
