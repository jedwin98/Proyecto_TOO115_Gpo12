@extends('layouts.plantilla')

@section('contenido')
<div class="container py-5">
<div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Cuenta de Aportaciones: {{ $cuenta_aportacione->id }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="datatable">
                    <tbody>
                        <tr>
                            <th>Cuota:</th>
                            <td>{{ $cuenta_aportacione->cuota }}</td>
                            <th>Primera cuota:</th>
                            <td>{{ $cuenta_aportacione->primera_cuota }}</td>
                            <th>Forma de Pago:</th>
                            <td>{{ $cuenta_aportacione->forma_pagos->nombre_forma_de_pago }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection