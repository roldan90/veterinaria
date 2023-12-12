<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Consulta;
use Illuminate\Http\Request;

class Consultas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index', 'create', 'edit']);
    }
    public function index()
    {
        $items = Consulta::join('cliente', 'consulta.cliente_id', '=', 'cliente.id')
                            ->select(
                                'cliente.paterno as paterno',
                                'cliente.materno as materno',
                                'cliente.nombre as nombre',
                                'cliente.mascota as mascota',
                                'consulta.id as id_consulta',
                                'consulta.diagnostico as diagnostico',
                                'consulta.created_at as fecha'
                            )
                            ->get();
        return view('modules/consultas/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('modules/consultas/create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Consulta();
        $item->cliente_id = $request->id_cliente;
        $item->diagnostico = $request->diagnostico;
        $item->save();
        return redirect()->route('consultas-index');
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
        $consultas = Consulta::find($id);
        return view('modules.consultas.edit', compact('clientes', 'consultas'));
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
        $item = Consulta::find($id);
        $item->cliente_id = $request->id_cliente;
        $item->diagnostico = $request->diagnostico;
        $item->save();
        return redirect()->route('consultas-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Consulta::find($id);
        $item->delete();
        return redirect()->route('consultas-index');
    }
}
