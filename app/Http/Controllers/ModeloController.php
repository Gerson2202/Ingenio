<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\Modelo;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias=categoria::all();
        $modelos=Modelo::all();
        return view('modelos.index', compact('categorias','modelos'));
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
        $request->validate([
            'file'=>'required|image|max :1024',
            ]);
            
          $img= $request->File('file')->store('imagenes');
          $url=Storage::url($img);
          $modelo= new Modelo();
          $modelo->nombre=$request->nombre;
          $modelo->url=$url;
          $modelo->categoria_id=$request->categoria_id;
          $modelo->save();
          return redirect()->route('modelosIndex')->with('success', 'Los datos se han registrado correctamente.');
          
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $modelo = Modelo::findOrfail($id);
        return view('modelos.edit', compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $modelo = Modelo::findOrFail($id);
        $modelo->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        return redirect()->route('modelosIndex')->with('success', 'Los datos se han registrado correctamente.');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Modelo::findOrFail($id)->delete();  // Eliminar el equipo
        return response()->json(['success' => 'Modelo eliminado']);
    }
}
