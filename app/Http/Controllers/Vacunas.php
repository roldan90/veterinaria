<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vacuna;
use Illuminate\Http\Request;

class Vacunas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index', 'create', 'edit']);
    }
    
    public function index()
    {
        $items = Vacuna::join('cliente', 'vacuna.cliente_id', '=', 'cliente.id')
                            ->select(
                                'cliente.paterno as paterno',
                                'cliente.materno as materno',
                                'cliente.nombre as nombre',
                                'cliente.mascota as mascota',
                                'vacuna.id as id_vacuna',
                                'vacuna.descripcion as descripcion',
                                'vacuna.created_at as fecha'
                            )
                            ->get();
        return view('modules/vacunas/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('modules/vacunas/create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Vacuna();
        $item->cliente_id = $request->id_cliente;
        $item->descripcion = $request->descripcion;
        $item->save();
        return redirect()->route('vacunas-index');
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
        $vacunas = Vacuna::find($id);
        return view('modules.vacunas.edit', compact('clientes', 'vacunas'));
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
        $item = Vacuna::find($id);
        $item->cliente_id = $request->id_cliente;
        $item->descripcion = $request->descripcion;
        $item->save();
        return redirect()->route('vacunas-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Vacuna::find($id);
        $item->delete();
        return redirect()->route('vacunas-index');
    }
}
