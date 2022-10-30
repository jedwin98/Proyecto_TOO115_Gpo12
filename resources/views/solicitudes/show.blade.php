@extends('layouts.plantilla')

@section('contenido')

<!-- Favicon.ico -->
<link rel="shortcut icon" type="image/x-icon" href="imgs/logo.jpeg">
<!-- Favicon.ico -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Solicitud Numero: {{ $solicitud->id }}</h4>
            </div>
            <br>
            <div class="card-header">
                <h5>Datos Personales</h5>
            </div>
            <div class="card-body">
            <table class="table table-bordered" id="datatable">
                  <tbody>
                    
                    <tr>
                        <th>Nombres:  </th>
                        <td>{{ $solicitud->datosPersonales->nombre1 . " " .  $solicitud->datosPersonales->nombre2   . " " .  $solicitud->datosPersonales->nombre3  }} </td>
                        <th rowspan="4">Fotografia:  </th>
                        <td rowspan="4"><img src="{{ asset($solicitud->biometrica->foto_biometrica) }}" alt="" style=" max-width: 50%; max-height: 50%;"> </td>


                    </tr>
                    <tr>
                        <th>Apellidos:  </th>
                        <td> {{ $solicitud->datosPersonales->apellido1    . " " .  $solicitud->datosPersonales->apellido2 }} </td>
                    </tr>
                    <tr>
                        <th>Email:  </th>
                        <td> {{ $solicitud->user->email }} </td>         
                    </tr>
                    <tr>
                        <th>Estado de la solicitud:  </th>
                        <td> <b>{{ $solicitud->estado_solicitud}}</b>  </td>         
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento:  </th>
                        <td> {{ $solicitud->datosPersonales->fecha_nacimiento }} </td>
                        <th>Genero:  </th>
                        <td> {{ $solicitud->datosPersonales->genero->nombre_genero }} </td>
                    </tr>
                    <tr>
                        <th>Estado Civil:  </th>
                        <td> {{ $solicitud->datosPersonales->estado_civil }} </td>
                        @if ($solicitud->datosPersonales->estado_civil != "Soltero (a)")
                        <th>Conyuge:  </th>
                        <td> {{ $solicitud->datosPersonales->conyugue }} </td>
                        @endif
                    </tr>
                    
                  </tbody>
            </table>  

            <table class="table table-bordered">
                 <tbody>
                    <tr>
                        <th>Tipo documento:  </th>
                        <td>{{ $solicitud->datosPersonales->tipoDocumento->nombre_documento }} </td>
                        <th>Numero documento:  </th>
                        <td> {{ $solicitud->datosPersonales->numero_documento  }} </td>
                    </tr>
                
                    @if ($solicitud->datosPersonales->tipoDocumento->id == 1)
                    
                            <tr>
                                <th>Numero de NIT:  </th>
                                <td>{{ $solicitud->datosPersonales->pdf_nit }} </td>
                                <th>Numero de NUP:  </th>
                                <td> {{ $solicitud->datosPersonales->pdf_nup  }} </td>
                                <th>Numero de ISSS:  </th>
                                <td> {{ $solicitud->datosPersonales->pdf_isss  }} </td>
                            </tr>
                      
                    
                    @endif
                    
                   </tbody>
                </table>  
                </div> 

                <div class="card-header">
                    <h5>Datos financieros</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Profesion:</th> <td> {{ $solicitud->datosPersonales->asociado->profesion }}</td>
                                <th>Lugar de trabajo:</th> <td> {{ $solicitud->datosPersonales->asociado->lugar_trabajo }}</td>
                            </tr>
                            <tr>
                                <th>Salario:</th> <td> {{ "$" .  $solicitud->datosPersonales->asociado->salario }}</td>
                                <th>Otros:</th> <td> </td>
                            </tr>
                            
                        </tbody>
                    </table>

                </div>


                <div class="card-header">
                    <h5>Dirección</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Pais:</th> <td> {{ $solicitud->ubicacion->pais->nombreMin }}</td>
                                <th>Ciudad:</th> <td> {{ $solicitud->ubicacion->ciudad->nombreCiudad }}</td>
                            </tr>
                            <tr>
                                <th>Residencia:</th> <td> {{ $solicitud->datosPersonales->direccion->residencia }}</td>
                                <th>Calle:</th> <td> {{ $solicitud->datosPersonales->direccion->calle }}</td>
                            </tr>
                            <tr>
                                <th>Numero de vivienda</th><td> {{ $solicitud->datosPersonales->direccion->num_vivienda }} </td>
                            </tr>
 
                        </tbody>
                    </table>

                </div>
                <div class="card-header">
                    <h5>Beneficiarios</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($solicitud->datosPersonales->asociado->beneficiarios as $item)
                                <tr>
                                    <th>Nombre:</th> <td> {{ $item->nombre_beneficiario }}</td>
                                    <th>Edad:</th> <td> {{ $item->edad_beneficiario }}</td>
                                </tr>
                                <tr>
                                    <th>Parentezco:</th> <td> {{ $item->perentezco }}</td>
                                    <th>Porcentaje:</th> <td> {{$item->porcentaje_beneficiario}} </td>
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>

                </div>
                <div class="card-header">
                    <h5>Refrencias</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($solicitud->datosPersonales->asociado->referencias as $item)
                                <tr>
                                    <th>Nombre:</th> <td> {{ $item->nombre_referencia }}</td>
                                    <th>Tipo:</th> <td> {{ $item->tipo_referencia }}</td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th> <td> {{ $item->telefono_referencia }}</td>
                                    <th>Email:</th> <td> {{$item->correo_referencia}} </td>
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>

                </div>
                <div class="card-header">
                    <h5>Firma</h5>
                </div>
                <div class="card-body">
                    <img src="{{ asset($solicitud->biometrica->firma_biometrica) }}" alt="" style=" max-width: 100%; max-height: 100%;"> 

                </div>
                @if ($user_log != $solicitud->user_id)
                <div>
                    <form action="{{ route('solicitudes.edit', $solicitud->id) }}" method="GET"><input class="btn btn-success" type="submit" value="Aprobar"></form>
                  <form action=" {{ route('solicitudes.store') }}" method="POST"> <input type="hidden" name="soli" value="{{ $solicitud->id }}" > @csrf <input class="btn btn-danger" type="submit" value="Rechazar"></form>
                </div> 
                @endif
                
             
        </div>
    </div>
</div>
@endsection