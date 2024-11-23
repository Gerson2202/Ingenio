<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
Use App\Models\Equipo;
use App\Models\Modelo;
use App\Models\proveedor;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Print_;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $equipos= Equipo::with('modelos','proveedores')->get();
        $modelos= Modelo::all();
        $categorias= categoria::all();
        $proveedores= proveedor:: all();
        // return $equipos;
        
        
         return view('equipos.index', compact('modelos', 'equipos','categorias','proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo_id'=> 'required',
            'mac'=> 'required|unique:equipos',
            'estado'=> 'required',
        ]);
         $equipo= new Equipo();
         $equipo->modelo_id=$request->modelo_id;
         $equipo->mac=$request->mac;
         $equipo->proveedor_id=$request->proveedor_id;
         $equipo->estado=$request->estado;
         $equipo->precio=$request->precio;
         $equipo->save();
        // Equipo::create($request->all());
        return redirect()->route('equiposIndex')->with('success', 'Los datos se han registrado correctamente.');
        
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
        $equipo = Equipo::with(['modelos', 'proveedores'])->findOrFail($id);
        $modelos= Modelo::all();
        $categorias= categoria::all();
        $proveedores= proveedor:: all();
        return view('equipos.edit', compact('equipo','modelos','categorias','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $request->validate([
            'modelo_id'=> 'required',
            'mac'=> 'required|unique:equipos',
            'estado'=> 'required',
        ]);
        $equipo->update([
            'estado' => $request->input('estado'),
            'mac' => $request->input('mac'),
            'precio' => $request->input('precio'),
            'modelo_id' => $request->input('modelo_id'),
            'proveedor_id' => $request->input('proveedor_id'),
        ]);
        return redirect()->route('equiposIndex')->with('success', 'Los datos se han registrado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Equipo::findOrFail($id)->delete();  // Eliminar el equipo
        return response()->json(['success' => 'Equipo eliminado']);
    }
}
