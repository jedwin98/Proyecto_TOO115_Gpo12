@extends('layouts.plantilla')

@section('contenido')

<!-- Favicon.ico -->
<link rel="shortcut icon" type="image/x-icon" href="imgs/logo.jpeg">
<!-- Favicon.ico -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Usuarios</h4>
            </div>
            <br>
                <a href="#" data-toggle="modal" data-target="#crearUsuarioModalCenter" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Agregar Usuario</a>
            <br>
           <br>
            <table class="table text-md-nowrap" id="datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo Electronico</th>
                        <th>Fecha de Creacion</th>
                        <th>Fecha de Actualizacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Modal crear usuarios -->
<div class="modal fade" id="crearUsuarioModalCenter" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="removevalidateform('modalcrearusuario');removecheck('modalCrear');">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form method="POST" id="modalcrearusuario" class="needs-validation" novalidate>
            @csrf
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="invalid-feedback">
                Este campo no puede quedar vacio.
            </div>
            <br>
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autocomplete="email">
            <div class="invalid-feedback">
                Por favor, revise el formato del texto ingresado.
            </div>
            <br>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required minlength="8" autocomplete="new-password">
            <div class="invalid-feedback">
                Este campo no puede quedar vacio, ni tener menos de 8 caracteres.
            </div>
            <br>
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required minlength="8" autocomplete="new-password">
            <div class="invalid-feedback">
                Este campo no puede quedar vacio, ni tener menos de 8 caracteres.
            </div>
            <br>
            <label>Roles</label>
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="AdministradorCrearCheck">
                <label class="form-check-label" for="AdministradorCheck">
                    Administrador
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="EjecutivoCrearCheck">
                <label class="form-check-label">
                    Ejecutivo
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="JuntaDirectivaCrearCheck">
                <label class="form-check-label">
                    Junta directiva
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="AsociadoCrearCheck">
                <label class="form-check-label">
                    Asociado
                </label>
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
<!-- Modal editar usuarios -->
<div class="modal fade" id="editarUsuarioModalCenter" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="removevalidateform('modaleditarusuario');removecheck('modalEditar');">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form method="POST" id="modaleditarusuario" class="needs-validation" novalidate>
        @csrf
            <label for="inputnombreusuario">Nombre</label>
            <input type="text" class="form-control" id="inputnombreusuario" name="nombreusuario" required>
            <div class="invalid-feedback">
                Este campo no puede quedar vacio.
            </div>
            <br>
            <label for="inputcorreousuario">Correo Electronico</label>
            <input type="text" class="form-control" id="inputcorreousuario" name="correousuario" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <div class="invalid-feedback">
                Por favor, revise el formato del texto ingresado.
            </div>
            <br>
            <label>Roles</label>
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="AdministradorCheck">
                <label class="form-check-label">
                    Administrador
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="EjecutivoCheck">
                <label class="form-check-label">
                    Ejecutivo
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="JuntaDirectivaCheck">
                <label class="form-check-label">
                    Junta directiva
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="AsociadoCheck">
                <label class="form-check-label">
                    Asociado
                </label>
            </div>
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
    $(document).ready(function () {
        $('#datatable').DataTable({
            "responsive":true,
            "ajax": "{{route('usuarios_data')}}",
            "type":"GET",
            "columns":[
                {data:'name'},
                {data:'email'},
                {data:'created_at'},
                {data:'updated_at'},
                {
                    "data": null,
                    render:function(data)
                    {
                    return "<button class='btn btn-warning' onclick='consultarUsuario(" + data.id + ")'><i class='fa-solid fa-pen-to-square'></i> Editar</button> <button class='btn btn-danger' onclick='eliminarUsuario(" + data.id + ")'><i class='fa-solid fa-trash-can'></i> Eliminar</button>";
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

function removecheck(modal){
    if(modal === "modalEditar"){
        $('#AdministradorCheck').prop('checked', false);
        $('#EjecutivoCheck').prop('checked', false);
        $('#JuntaDirectivaCheck').prop('checked', false);
        $('#AsociadoCheck').prop('checked', false);
    }
    if(modal === "modalCrear"){
        $('#AdministradorCrearCheck').prop('checked', false);
        $('#EjecutivoCrearCheck').prop('checked', false);
        $('#JuntaDirectivaCrearCheck').prop('checked', false);
        $('#AsociadoCrearCheck').prop('checked', false);
    }
}

function consultarUsuario(id){
                $.ajax({
                    url:"{{route('consultarusuariosajax')}}",
                    type:"GET",
                    data:{
                        'IdUsuario': id,
                    },
                    //dataType:"json",
                    success: function(test){
                        $("#editarUsuarioModalCenter").modal("show");
                        //console.log(test);
                        document.getElementById("inputnombreusuario").value = test.Usuario[0].name;
                        document.getElementById("inputcorreousuario").value = test.Usuario[0].email;
                        for(var i=0;i<=test.Usuario[0].roles.length-1;i++){
                            //console.log(test.Usuario[0].roles[i].name);
                            if(test.Usuario[0].roles[i].name == "administrador"){
                                $('#AdministradorCheck').prop('checked', true);
                            }
                            if(test.Usuario[0].roles[i].name == "ejecutivo"){
                                $('#EjecutivoCheck').prop('checked', true);
                            }
                            if(test.Usuario[0].roles[i].name == "junta_directiva"){
                                $('#JuntaDirectivaCheck').prop('checked', true);
                            }
                            if(test.Usuario[0].roles[i].name == "asociado"){
                                $('#AsociadoCheck').prop('checked', true);
                            }
                        } 
                        }
                    });

 //js para envio por ajax para la ventana de editar usuario
 $(document).ready(function() {
        $("#modaleditarusuario").submit(function(e) {
        e.preventDefault();
        var element = document.getElementById("modaleditarusuario");
        var valinputnombreusuario = document.getElementById("inputnombreusuario").value;
        var valinputcorreo = document.getElementById("inputcorreousuario").value;
        var rolesAssign = [];
        var rolesUnassign = [];

        //Asignar roles cuando esta marcado el checkbox
        if ($('#AdministradorCheck').is(':checked')) {
           rolesAssign.push("administrador");
        }
        if ($('#EjecutivoCheck').is(':checked')) {
           rolesAssign.push("ejecutivo");
        }
        if ($('#JuntaDirectivaCheck').is(':checked')) {
           rolesAssign.push("junta_directiva");
        }
        if ($('#AsociadoCheck').is(':checked')) {
           rolesAssign.push("asociado");
        }

        //Quitar roles cuando esta desmarcado el checkbox
        if ($('#AdministradorCheck').is(':checked')==false) {
           rolesUnassign.push("administrador");
        }
        if ($('#EjecutivoCheck').is(':checked')==false) {
            rolesUnassign.push("ejecutivo");
        }
        if ($('#JuntaDirectivaCheck').is(':checked')==false) {
            rolesUnassign.push("junta_directiva");
        }
        if ($('#AsociadoCheck').is(':checked')==false) {
            rolesUnassign.push("asociado");
        }

        if (element.checkValidity() === true) { 
            //console.log(rolesAssign);   
            //console.log(rolesUnassign);     
        Swal.fire({
            icon: 'info',
            title: 'Confirmar.',
            text: '¿Desea continuar?',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"{{route('editar_usuario')}}",
                    type:"POST",
                    data:{
                        'NombreUsuario': valinputnombreusuario,
                        'CorreoUsuario': valinputcorreo,
                        'IdUsuario': id,
                        'RolesAssign': rolesAssign,
                        'RolesUnassign': rolesUnassign,
                        "_token": $("meta[name='csrf-token']").attr("content")
                    },
                    //dataType:"json",
                    success: function(test){
                        element.classList.remove("was-validated");
                        document.getElementById("inputnombreusuario").value="";
                        document.getElementById("inputcorreousuario").value="";
                        $("#editarUsuarioModalCenter").modal("hide");
                        $('#datatable').DataTable().ajax.reload();

                        if(test.estado === 'actualizado'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Hecho!.',
                                    text: 'Se actualizo correctamente el usuario',
                                    confirmButtonText: 'Ok',
                                })
                            }
                        if(test.estado === 'error'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ocurrio un error!.',
                                    text: 'No se pudo actualizar el usuario',
                                    confirmButtonText: 'Ok',
                                })
                            }
                        }
                    });
            } else if (result.isDismissed) {
                Swal.fire('Se cancelo la actualizacion del usuario', '', 'info')
            }
            })
        }
        });
    });
}
//js para envio por ajax para la ventana de crear usuario
$(document).ready(function() {
        $("#modalcrearusuario").submit(function(e) {
        e.preventDefault();
        var element = document.getElementById("modalcrearusuario");
        var valinputnombreusuario = document.getElementById("name").value;
        var valinputcorreo = document.getElementById("email").value;
        var valcontra = document.getElementById("password").value;
        var valcontraconfirm = document.getElementById("password-confirm").value;
        var rolesAssign = [];

        //Asignar roles cuando esta marcado el checkbox
        if ($('#AdministradorCrearCheck').is(':checked')) {
           rolesAssign.push("administrador");
        }
        if ($('#EjecutivoCrearCheck').is(':checked')) {
           rolesAssign.push("ejecutivo");
        }
        if ($('#JuntaDirectivaCrearCheck').is(':checked')) {
           rolesAssign.push("junta_directiva");
        }
        if ($('#AsociadoCrearCheck').is(':checked')) {
           rolesAssign.push("asociado");
        }

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
                    url:"{{route('crear_usuario')}}",
                    type:"POST",
                    data:{
                        'NombreUsuario': valinputnombreusuario,
                        'CorreoUsuario': valinputcorreo,
                        'ContraseñaUsuario': valcontra,
                        'ContraseñaConfirmUsuario': valcontraconfirm,
                        'RolesAssign': rolesAssign,
                        "_token": $("meta[name='csrf-token']").attr("content")
                    },
                    //dataType:"json",
                    success: function(test){
                        element.classList.remove("was-validated");
                        document.getElementById("name").value="";
                        document.getElementById("email").value="";
                        document.getElementById("password").value="";
                        document.getElementById("password-confirm").value="";
                        removecheck('modalCrear');
                        $("#crearUsuarioModalCenter").modal("hide");
                        $('#datatable').DataTable().ajax.reload();

                        if(test.estado === 'creado'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Hecho!.',
                                    text: 'Se creo correctamente el usuario',
                                    confirmButtonText: 'Ok',
                                })
                            }
                        if(test.estado === 'error'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ocurrio un error!.',
                                    text: test.mensaje,
                                    confirmButtonText: 'Ok',
                                })
                            }
                        }
                    });
            } else if (result.isDismissed) {
                Swal.fire('Se cancelo la creacion del usuario', '', 'info')
            }
            })
        }
        });
    });

function eliminarUsuario(id){
    Swal.fire({
        icon: 'warning',
        title: '¿Estas seguro que deseas realizar esta accion?',
        text: '¡No podras revertir esto!',
        showCancelButton: true,
        confirmButtonText: 'Ok',
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"{{route('eliminar_usuario')}}",
                type:"POST",
                data:{
                    'IdUsuario': id,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                //dataType:"json",
                success: function(test){
                    $('#datatable').DataTable().ajax.reload();

                    if(test.estado === 'eliminado'){
                            Swal.fire({
                                icon: 'success',
                                title: 'Hecho!.',
                                text: 'Se elimino correctamente el usuario',
                                confirmButtonText: 'Ok',
                            })
                        }
                    if(test.estado === 'error'){
                            Swal.fire({
                                icon: 'error',
                                title: 'Ocurrio un error!.',
                                text: 'No se pudo eliminar el usuario correctamente',
                                confirmButtonText: 'Ok',
                            })
                        }
                    }
                });
        } else if (result.isDismissed) {
            Swal.fire('Se cancelo la eliminacion del usuario', '', 'info')
        }
    })
}
</script>
@endsection




