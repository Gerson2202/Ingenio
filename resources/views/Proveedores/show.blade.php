@extends('adminlte::page')
@section('title', 'Dasboard')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header"><h2>Modificar datos de proveedor</h1></div>
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <!-- Columna para la primera tabla -->
                <div class="col-md-12 mb-4">
                    <form action="{{route('proveedorUpdate',$proveedor->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nombre</label>
                              <input value="{{ old('nombre', $proveedor->nombre) }}" type="mac" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp"  required>
                         </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Telefono</label>
                              <input type="text" value="{{ old('telefono', $proveedor->telefono) }}" pattern="^\d{10}$" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp"  required>
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Correo</label>
                              <input type="email" value="{{ old('correo', $proveedor->correo) }}" class="form-control" id="correo" name="correo" aria-describedby="emailHelp"  required>
                          </div>
                        
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <!-- Columna para la primera tabla -->
                <div class="col-md-12 mb-4">
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    
@stop