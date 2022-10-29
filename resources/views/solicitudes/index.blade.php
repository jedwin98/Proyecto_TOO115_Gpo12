@extends('layouts.plantilla')

@section('contenido')

<!-- Favicon.ico -->
<link rel="shortcut icon" type="image/x-icon" href="imgs/logo.jpeg">
<!-- Favicon.ico -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Solicitudes</h4>
            </div>
            <br>
            <table class="table text-md-nowrap" id="datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $item)
                    <tr>
                        <td> {{$item->datosPersonales->nombre1 . " " .  $item->datosPersonales->nombre2   . " " .  $item->datosPersonales->apellido1    . " " .  $item->datosPersonales->apellido2 }} </td>
                        <td>{{ $item->estado_solicitud }} </td>
                        <td> <form action="{{ route('solicitudes.show', $item->id) }}" method="GET"><input class="btn btn-success" type="submit" value="Ver detalle"></form> </td>

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection