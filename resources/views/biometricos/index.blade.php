@extends('layouts.plantilla')

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
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera" style="height:auto;width:auto; text-align:left;"></div>
                            <br/>
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6">
                            <div id="results">Your captured image will appear here...</div>
                        </div>
                        <div class="col-md-12 text-center">
                            <br/>
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
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
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="sixthStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(5)">Anterior</button>
            </div>
        </div>
    </div>
        </div>
        </div>
            
    </div>
@endsection    