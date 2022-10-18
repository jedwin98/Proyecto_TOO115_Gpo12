@extends('layouts.plantilla')
@section('css')
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
    .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{ width: 100% !important; height: auto;}
</style>
@endsection


@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-header">
                    <h5>Laravel 8 Signature Pad Example - web-tuts.com</h5>
                </div>
                <div class="card-body">
    
                     
                         <div class="col-md-12">
                             <label class="" for="">Draw Signature:</label>
                             <br/>
                             <div id="sig"></div>
                             <br><br>
                             <button id="clear" class="btn btn-danger">Clear Signature</button>
                             <button class="btn btn-success">Save</button>
                             <textarea id="signature" name="signed" style="display: none"></textarea>
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