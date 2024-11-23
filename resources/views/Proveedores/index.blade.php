@extends('adminlte::page')
@section('title', 'Dasboard')

@section('content_header')
    <h1>Proveedores</h1>
    <!-- Agregar enlaces a los archivos CSS y JS de DataTables desde CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Para eliminar con confirmación -->
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Proveedor</button>
        
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
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{$proveedor->id}}</td>
                        <td>{{$proveedor->nombre }}</td>
                        <td>{{$proveedor->telefono}}</td>
                        <td>{{$proveedor->correo}}</td>
                        <td>
                            <!-- Botón Editar -->
                            <a href="{{ route('proveedorShow', $proveedor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <!-- Botón Eliminar -->
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $proveedor->id }})">Eliminar</button>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Proveedores</h1>    
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- INICIO DE FORMULARIO --}}
          <form action="{{route('proveedorStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="mac" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" required>
               </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                    <input type="text" pattern="^\d{10}$" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder="321585.." required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Gmail.com" required>
                </div>
              
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
                url: '/proveedor/' + id,  // Ruta para eliminar
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
  
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

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