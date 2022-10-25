@extends('layouts.plantilla')

@section('contenido')

<!-- Favicon.ico -->
<link rel="shortcut icon" type="image/x-icon" href="imgs/logo.jpeg">
<!-- Favicon.ico -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Asociados</h4>
            </div>
            <br>
            <table class="table text-md-nowrap" id="datatable">
                <thead>
                    <tr>
                        <th>Nombre 1</th>
                        <th>Nombre 2</th>
                        <th>Apellido 1</th>
                        <th>Apellido 2</th>
                        <th>Numero de Documento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Modal editar datos residencia -->
<div class="modal fade" id="editarDatosResidenciaModalCenter" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar datos de residencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="removevalidateform('modaleditardatosresidencia');">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form method="POST" id="modaleditardatosresidencia" class="needs-validation" novalidate>
        @csrf
            <label>Seleccione un pais</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="idpais" id="paisid" onchange="consultarciudadesdatosresidencia();">

            </select>
            <br>
            <br>
            <label>Seleccione una ciudad</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="idciudad" id="ciudadid">

            </select>
            <br>
            <br>
            <label>Residencia</label>
            <input type="text" class="form-control" id="inputresidencia" name="residencia" required>
            <div class="invalid-feedback">
                Por favor, revise el formato del texto ingresado.
            </div>
            <br>
            <label>Calle</label>
            <input type="text" class="form-control" id="inputcalle" name="calle" required>
            <div class="invalid-feedback">
                Por favor, revise el formato del texto ingresado.
            </div>
            <br>
            <label>Numero de vivienda</label>
            <input type="text" class="form-control" id="inputnumvivienda" name="numvivienda" required>
            <div class="invalid-feedback">
                Por favor, revise el formato del texto ingresado.
            </div>
            <br>
        </div>
            <div class="modal-footer">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </form>
        </div>
    </div>
    </div>

<!-- Script -->
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


<script>
    $('#paisid').select2({
        dropdownParent: $('#editarDatosResidenciaModalCenter'),
        width: '100%'
    });
    $('#ciudadid').select2({
        dropdownParent: $('#editarDatosResidenciaModalCenter'),
        width: '100%'
    });

    $(document).ready(function () {
        $('#datatable').DataTable({
            "responsive":true,
            "ajax": "{{route('asociados_data')}}",
            "type":"GET",
            "columns":[
                {data:'nombre1'},
                {data:'nombre2'},
                {data:'apellido1'},
                {data:'apellido2'},
                {data:'numero_documento'},
                {
                    "data": null,
                    render:function(data)
                    {
                    return "<button class='btn btn-warning' onclick='consultarpaisesdatosresidencia(" + data.id + ");'><i class='fa-solid fa-pen-to-square'></i> Editar datos de residencia</button>";
                    }
                    //defaultContent: "<button class='btn btn-warning' onclick='prueba({data:'id'})'>Editar</button> / <button class='btn btn-danger'>Eliminar</button>"
                }
            ],

            "language":{
                "decimal":        ".",
                "emptyTable":     "No hay datos disponibles en la tabla",
                "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty":      "Mostrando del 0 al 0 de un todal de 0 registros",
                "infoFiltered":   "(Filtrado de _MAX_ registros totales)",
                "lengthMenu":     "Mostrar _MENU_ registros por página",
                "loadingRecords": "Cargando...",
                "processing":     "",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "select": {
                    "rows": {
                        "1": "1 fila seleccionada",
                        "_": "%d filas seleccionadas"
                    }
                },
            } 
        });
        
    });

function consultarpaisesdatosresidencia(id){
    $("#editarDatosResidenciaModalCenter").modal("show");
    var comboPaises = document.getElementById("paisid");
    var comboCiudades = document.getElementById("ciudadid");

    $.ajax({
                    url:"{{route('paisesconsultarajax')}}",
                    type:"GET",
                    data:{
                        'asociadoId': id,
                    },
                    //dataType:"json",
                    success: function(test){
                        //console.log(test);
                        //console.log("legth "+test.paises.length);
                        for (var j = comboPaises.options.length; j >= 0; j--) {
                            comboPaises.remove(j);
                        }
                        for (var j = comboCiudades.options.length; j >= 0; j--) {
                            comboCiudades.remove(j);
                        }
                        for (var i = 0; i < test.paises.length; i++) {
                            const option = document.createElement('option');
                            const valornombre = test.paises[i].nombreMin;
                            const valoriso = test.paises[i].iso;
                            option.value = valoriso;
                            option.text = valornombre;
                            comboPaises.appendChild(option);
                        }
                        //comboPaises.value=test.datosPersonales[0].pais_iso;
                        document.getElementById("inputresidencia").value = test.residencia;
                        document.getElementById("inputcalle").value = test.calle;
                        document.getElementById("inputnumvivienda").value = test.vivienda;

                        for (var i = 0; i < test.ciudadesIni.length; i++) {
                            const option = document.createElement('option');
                            const valornombre = test.ciudadesIni[i].nombreCiudad;
                            const valorid = test.ciudadesIni[i].id;
                            option.value = valorid;
                            option.text = valornombre;
                            comboCiudades.appendChild(option);
                        }
                        comboPaises.value=test.paisIni;
                        comboCiudades.value=test.ciudadSelected;
                    }
    });
     //js para envio por ajax para la ventana de expediente
   $(document).ready(function() {
        $("#modaleditardatosresidencia").submit(function(e) {
        e.preventDefault();
        var element = document.getElementById("modaleditardatosresidencia");
        var comboPaises = document.getElementById("paisid");
        var comboCiudades = document.getElementById("ciudadid");
        var selectedPais = comboPaises.options[comboPaises.selectedIndex].value;
        var selectedCiudad = comboCiudades.options[comboCiudades.selectedIndex].value;
        var valinputresidencia = document.getElementById("inputresidencia").value;
        var valinputcalle = document.getElementById("inputcalle").value;
        var valinputnumvivienda = document.getElementById("inputnumvivienda").value;

        if (element.checkValidity() === true) {       
        Swal.fire({
            icon: 'info',
            title: 'Confirmar.',
            text: '¿Desea continuar?',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"{{route('datos_residencia_editar')}}",
                    type:"POST",
                    data:{
                        'IdAsociado': id,
                        'Pais': selectedPais,
                        'Ciudad': selectedCiudad,
                        'Residencia': valinputresidencia,
                        'Calle': valinputcalle,
                        'NumVivienda': valinputnumvivienda,
                        "_token": $("meta[name='csrf-token']").attr("content")
                    },
                    //dataType:"json",
                    success: function(test){
                        element.classList.remove("was-validated");
                        document.getElementById("inputresidencia").value="";
                        document.getElementById("inputcalle").value="";
                        document.getElementById("inputnumvivienda").value="";

                        if(test.estado === 'actualizado'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Hecho!.',
                                    text: 'Se registro correctamente el asociado',
                                    confirmButtonText: 'Ok',
                                })
                                $("#editarDatosResidenciaModalCenter").modal("hide");
                            }
                        if(test.estado === 'error'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ocurrio un error!.',
                                    text: 'No se pudo registrar el asociado',
                                    confirmButtonText: 'Ok',
                                })
                            }
                        }
                    });
            } else if (result.isDismissed) {
                Swal.fire('Se cancelo el registro del asociado', '', 'info')
            }
            })
        }
        });
    });
}
function consultarciudadesdatosresidencia(){
    var comboPaises = document.getElementById("paisid");
    var comboCiudades = document.getElementById("ciudadid");
    var selectedPais = comboPaises.options[comboPaises.selectedIndex].value;

    $.ajax({
                    url:"{{route('ciudadesconsultarajax')}}",
                    type:"GET",
                    data:{
                        'paisIso': selectedPais,
                    },
                    //dataType:"json",
                    success: function(test){
                        //console.log(test);
                        //console.log("legth "+test.paises.length);
                        for (var j = comboCiudades.options.length; j >= 0; j--) {
                            comboCiudades.remove(j);
                        }

                        for (var i = 0; i < test.ciudades.length; i++) {
                            const option = document.createElement('option');
                            const valornombre = test.ciudades[i].nombreCiudad;
                            const valorid = test.ciudades[i].id;
                            option.value = valorid;
                            option.text = valornombre;
                            comboCiudades.appendChild(option);
                        }
                    }
    });
}
</script>
@endsection




