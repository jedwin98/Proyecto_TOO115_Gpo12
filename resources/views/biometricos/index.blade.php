@extends('layouts.plantilla')
@section('css')
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
    .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{ width: 100% !important; height: auto;}
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
                <h3> Paso 6</h3>
                
                <div class="form-group">
                    <label for="description">Ingresar fotografia</label>
                    <form method="POST" action="{{ route('biometricos.store') }}">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera" style="height:auto;width:auto; text-align:left;"></div>
                            <br/>
                            <input type=button class="btn btn-success" value="Tomar foto" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6">
                            <div id="results">Tu foto aparecerá aquí...</div>
                        </div>
                        <br>
                        <div class="card-header">
                            <h5>Paso 7: ingresa tu firma</h5>
                        </div>
                        <div class="card-body">
                        <div class="col-md-12">
                            <label class="" for="">Dibuja tu firma:</label>
                            <br/>
                            <div id="sig"></div>
                            <br><br>
                            <button id="clear" class="btn btn-danger">Borrar Firma</button>
                            <textarea id="signature" name="signed" style="display: none"></textarea>
                        </div>
                        </div>


                      <div class="col-md-12 text-center">
                            <br/>

                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Gurdar datos</button>
                        </div>
                    </div>
                    </form>
                    <script language="JavaScript">
                        Webcam.set({
                            width: 490,
                            height: 350,
                            image_format: 'jpeg',
                            jpeg_quality: 90
                        });
                        
                        Webcam.attach( '#my_camera' );
                        
                        function take_snapshot() {
                            Webcam.snap( function(data_uri) {
                                $(".image-tag").val(data_uri);
                                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                            } );
                        }
                    </script>
                   
                           



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
    



@endsection    