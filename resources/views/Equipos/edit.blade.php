@extends('adminlte::page')
@section('title', 'Dasboard')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header"><h2>Modificar datos de equipo</h1></div>
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <!-- Columna para la primera tabla -->
                <div class="col-md-12 mb-4">
                    <form action="{{route('equipoUpdate', $equipo->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Estado</label>
                            <select name="estado" class="form-control" value="" required>
                                <option value="{{ $equipo->estado }}"></option>
                                <option value="nuevo" >nuevo</option>
                                <option value="usado" >Usado</option>  
                            </select>
                            <div class="valid-feedback"> </div>
                      </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">mac</label>
                              <input value="{{ old('nombre', $equipo->mac) }}" type="mac" class="form-control" id="mac" name="mac" aria-describedby="emailHelp"  required>
                         </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">precio</label>
                              <input type="number" value="{{ old('correo', $equipo->precio) }}" class="form-control" id="precio" name="precio" aria-describedby="emailHelp"  required>
                          </div>
                          
                          <div class="mb-3">        
                                <label>Modelo de equipo</label>
                                @if (is_null($equipo->modelos_id))
                                    <select name="modelo_id" class="form-control" >
                                        @foreach ($modelos as $modelo)
                                        <option value="{{$modelo->id}}">{{$modelo->nombre}}</option>
                                        @endforeach                           
                                    </select>  
                                @else
                                <select name="modelo_id" class="form-control">
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ $modelo->nombre }}" 
                                                {{ old('modelo_id', $equipo->modelos->nombre) == $modelo->nombre ? 'selected' : '' }}>
                                            {{ $modelo->nombre }}
                                        </option>
                                     @endforeach                         
                                </select>    
                                @endif
                                                       
                            </div>
                            <div class="mb-3">        
                                <label>Proveedor</label>
                                   {{-- validamos si el campo es null --}}
                                    @if (is_null($equipo->proveedor_id))
                                    <select name="proveedor_id" class="form-control" >
                                        @foreach ($proveedores as $proveedor)
                                          <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                        @endforeach                           
                                    </select> 
                                    @else
                                        <select name="proveedor_id" class="form-control">
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}" 
                                                        {{ old('proveedor_id', $equipo->proveedores->nombre) == $proveedor->nombre ? 'selected' : '' }}>
                                                    {{ $proveedor->nombre }}
                                                </option>
                                            @endforeach                         
                                        </select>  
                                    @endif
                                                      
                            </div>
                            
                        
                          <button type="submit" class="btn btn-primary">Guardar</button>
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