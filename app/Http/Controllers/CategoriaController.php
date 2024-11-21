<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias= categoria::all();
        return view('categoria.index', compact('categorias'));
        
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
        categoria::create($request->all());
        return redirect()->route('categoriasIndex')->with('success', 'Los datos se han registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria= categoria::findOrfail($id);
        return view('categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $request->input('nombre'),
        ]);
        return redirect()->route('categoriasIndex')->with('success', 'Los datos se han registrado correctamente.');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        categoria::findOrFail($id)->delete();  // Eliminar el equipo
        return response()->json(['success' => 'Equipo eliminado']);
    }
}
