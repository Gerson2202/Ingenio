@extends('adminlte::page')
@section('title', 'Dasboard')

@section('content_header')
    <h1>Equipos</h1>
    <!-- Agregar enlaces a los archivos CSS y JS de DataTables desde CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('content')

{{-- MODAL --}}

<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar equipo</button>
        
          {{-- Mensaje de error agg equipo --}}

                @if($errors->any())
                <div>
                    <h2> <strong class="text-red">Error</strong></h2>
                        <ul>
                        
                            <li class="text-red">
                            Se encontro un error al intentar subir los datos , porfavor revisa que la mac no este repetida o que los campos no esten vacios.
                            </li>
                        
                        </ul>
                    </div>
            @endif
            {{-- Mensaje de exito agg equipo --}}
            @if(session('success'))
                <div>
                    <br>
                    <div class="alert alert-success" id="success-message">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
    </div>
    <div class="card-body">
        <div class="container mt-5">
          <div class="row">
            <!-- Columna para la primera tabla -->
            <div class="col-md-12 mb-4">
              {{-- INICIO DE TABLA EQUIPOS --}}
              <table class="display table table-striped table-bordered" id="tablaEquipos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Modelo</th>
                        <th>Estado</th>
                        <th>Mac</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{$equipo->id}}</td>
                        <td>{{$equipo->modelos ? $equipo->modelos->nombre : 'no disponible' }}</td>
                        <td>{{$equipo->estado}}</td>
                        <td>{{$equipo->mac}}</td>
                        <td>{{$equipo->proveedores ? $equipo->proveedores->nombre : 'no disponible' }}</td>
                        <td>{{$equipo->precio}}</td>
                        <td>
                          <!-- Botón Editar -->
                          <a href="{{ route('equipoEdit', $equipo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                          
                          <!-- Botón Eliminar -->
                          <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $equipo->id }})">Eliminar</button>
                        </td>
                      </tr>
                  @endforeach   
                </tbody>
              </table>
              {{-- FIN TABLA EQUIPOS --}}
            </div>
            
          </div>
        </div>
    </div>
</div> 
<!-- Button trigger modal -->


  <!-- Modal Agg equipos -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar equipos</h1>    
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- INICIO DE FORMULARIO EQUIPOS --}}
          <form action="{{route('equipoStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <div class="mb-3">
                    <label>Estado</label>
                      <select name="estado" class="form-control" >                       
                        <option value=""></option>
                        <option value="nuevo" >Nuevo</option>
                        <option value="usado" >Usado</option>
                    </select>
                </div>
              </div>
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mac</label>
                    <input type="mac" class="form-control" id="mac" name="mac" aria-describedby="emailHelp" placeholder="mac">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" placeholder="mac">
              </div>
              <div class="mb-3">
                    <div class="mb-3">
                        <label>Modelo de equipo</label>
                          <select name="modelo_id" class="form-control" >
                            @foreach ($modelos as $modelo)
                              <option value="{{$modelo->id}}">{{$modelo->nombre}}</option>
                            @endforeach                           
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                      <label>Proveedor</label>
                        <select name="proveedor_id" class="form-control" >
                          @foreach ($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                          @endforeach                           
                      </select>
                  </div>
              </div>
                {{-- <div class="mb-3">
                    <div class="input-group">
                        <div class="custom-file">
                          <input name="img" type="file" class="custom-file-input" id="" required> 
                          <label name="img" class="custom-file-label" for="">Cargar imagen</label>
                        </div>
                        <div class="valid-feedback"> </div>
                    </div>
                </div> --}}
               
                <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          {{-- FIN DE FORMUALRIO --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Guardar</button> --}}
        </div>
      </div>
    </div>
  </div>
    <hr>
    

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
      // Activar DataTable en la tabla de usuarios
      $(document).ready(function() {
          $('#tablaEquipos').DataTable();
      });
    </script>
    <script>
      function confirmDelete(id) {
              Swal.fire({
                  title: '¿Estás seguro?',
                  text: "¡Este registro se eliminará permanentemente!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: '¡Sí, eliminar!',
              }).then((result) => {
                  if (result.isConfirmed) {
                      // Llamar a la función para eliminar (aquí se usa un formulario para enviar el delete)
                      deleteRecord(id);
                  }
              });
          }
  
          function deleteRecord(id) {
              $.ajax({
                  url: '/equipo/' + id,  // Ruta para eliminar
                  type: 'GET',
                  data: {
                      "_token": "{{ csrf_token() }}",  // Token CSRF
                  },
                  success: function(response) {
                      // Eliminar la fila de la tabla
                      $('#equipo-' + id).remove();
                      Swal.fire('Eliminado', 'El equipo ha sido eliminado', 'success');
                      location.reload(); //recargar la pagina al finalizar 
                  },
                  error: function(error) {
                      Swal.fire('Error', 'Hubo un problema al eliminar el registro', 'error');
                  }
              });
          }
    </script>
    </script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        // Espera a que el DOM esté completamente cargado
        document.addEventListener('DOMContentLoaded', function () {
            // Verifica si hay un mensaje de éxito
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                // Después de 5 segundos (5000 milisegundos), oculta el mensaje
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 4000); // 5000 ms = 5 segundos
            }
        });
    </script>
@stop