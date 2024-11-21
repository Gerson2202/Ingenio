<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores= proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        proveedor::create($request->all());
        return redirect()->route('proveedoresIndex')->with('success', 'Los datos se han registrado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $proveedor= proveedor::findOrfail($id);
       return view('proveedores.show', compact('proveedor'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor = proveedor::findOrFail($id);
        $proveedor->update([
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
        ]);
        return redirect()->route('proveedoresIndex')->with('success', 'Los datos se han registrado correctamente.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        proveedor::findOrFail($id)->delete();  // Eliminar el equipo
        return response()->json(['success' => 'Equipo eliminado']);
    }
}
