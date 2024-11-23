@extends('adminlte::page')
@section('title', 'Dasboard')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header"><h2>Modificar datos de modelo</h1></div>
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <!-- Columna para la primera tabla -->
                <div class="col-md-12 mb-4">
                    <form action="{{route('modeloUpdate',$modelo->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nombre</label>
                              <input value="{{ old('nombre', $modelo->nombre) }}" type="mac" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp"  required>
                         </div>
                         <div class="mb-3">
                            <label for="parrafo" class="form-label">Agregar descripcion</label>
                            @if (is_null($modelo->descripcion))
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Escribe tu párrafo largo aquí"></textarea>
                                @else
                                <textarea  class="form-control" id="descripcion" name="descripcion" rows="5" >
                                    {{ old('descripcion', trim($modelo->descripcion)) }}
                                </textarea>
                              @endif
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