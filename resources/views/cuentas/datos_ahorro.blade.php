@extends('layouts.plantilla')

@section('contenido')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Cuenta de Ahorro: {{ $cuenta_ahorro->id }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="datatable">
                    <tbody>
                        <tr>
                            <th>Corte anterior:</th>
                            <td>{{ $cuenta_ahorro->fecha_ultimo_corte }}</td>
                            <th>Próximo corte:</th>
                            <td>{{ $cuenta_ahorro->fecha_este_corte }}</td>
                            <th>Interés:</th>
                            <td>{{ $cuenta_ahorro->interes }}</td>
                        </tr>
                        <tr>
                            <th>Saldo Anterior:</th>
                            <td>{{ $cuenta_ahorro->saldo_anterior }}</td>
                            <th>Saldo Actual:</th>
                            <td>{{ $cuenta_ahorro->saldo_actual }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection