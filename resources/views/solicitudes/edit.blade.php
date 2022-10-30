@extends('layouts.plantilla')
@section('css')
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<link href="{{ asset('css/form_registro_asociado.css') }}" rel="stylesheet">
<style>
    .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{ width: 100% !important; height: auto;}
    #sig2 canvas{ width: 100% !important; height: auto;}
</style>
@endsection

@section('contenido')
    <br>
    <div class="container">
        <div class="card">
        <div class="card-header text-center">
            Registro de datos para asociado
        </div>
        <div class="card-body">
            
           <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Firma del Acta de ingreso</h3>
                
                <div class="form-group">
                    <label for="description">Ingresar firmas para el Acta</label>
                    <form method="post" action="{{ route('solicitudes.update', $solicitud) }}">
                        @csrf
                        @method('put')
                    <div class="row">
                       
                        <div class="col-md-12">
                            <br>
                            <label class="" for="">Firma del presidente:</label>
                            <br/>
                            <div id="sig"></div>
                            <br><br>
                            <button id="clear" class="btn btn-danger">Borrar Firma</button>
                            <textarea id="signature" name="signed" style="display: none"></textarea>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <label class="" for="">Firma del secretario:</label>
                            <br/>
                            <div id="sig2"></div>
                            <br><br>
                            <button id="clear2" class="btn btn-danger">Borrar Firma</button>
                            <textarea id="signature2" name="signed2" style="display: none"></textarea>
                        </div>


                      <div class="col-md-12 text-center">
                            <br/>

                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Gurdar datos</button>
                        </div>
                    </div>
                    </form>

                </div>              
            </div>
        </div>
    </div>
        </div>
        </div>
            
    </div>


     <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature").val('');
        });
    </script>
    <script type="text/javascript">
        var sig2 = $('#sig2').signature({syncField: '#signature2', syncFormat: 'PNG'});
        $('#clear2').click(function(e) {
            e.preventDefault();
            sig.signature('clear2');
            $("#signature2").val('');
        });
    </script>
    



@endsection    