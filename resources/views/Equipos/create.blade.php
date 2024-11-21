@extends('adminlte::page')
@section('title', 'Dasboard')

@section('content_header')
    <h1>Ingresar equipos</h1>
@stop

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tipo</label>
                    <select name="selectNombre" id="selectNombre" class="form-control" required>
                        <option value=""></option>
                    </select>
                    <div class="valid-feedback"> </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value=""  required>
                    <div class="valid-feedback"> </div>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Estado</label>
                    <select name="estado" class="form-control" value="" required>
                        <option value=""></option>
                        <option value="nuevo" >Nuevo</option>
                        <option value="usado" >Usado</option>
                        <option value="revision" >Revision</option>
                        <option value="de-baja" >De baja</option>
                    
                    </select>
                    <div class="valid-feedback"> </div>
                </div>

                
                </div>
               <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Imagen</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input name="img" type="file" class="custom-file-input" id="" required> 
                        <label name="img" class="custom-file-label" for="">Cargar imagen</label>
                    </div>
                    <div class="valid-feedback"> </div>
                </div>
                </div>
                </div> 
            </div>

    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop