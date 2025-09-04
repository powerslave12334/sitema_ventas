<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
?>

<?php
if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    ?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?php echo $respuesta ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php
    unset($_SESSION['mensaje']);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bienvenido a Ventec
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i> Agregar nuevo proveedor
                        </button>
                    </h1>



                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de proveedores</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container">
            <div class="col-md-12">

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">proveedores registrados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display:block">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <center>ID</center>
                                    </th>
                                    <th>
                                        <center>Nombre Proveedor</center>
                                    </th>
                                    <th>
                                        <center>celular Proveedor</center>
                                    </th>
                                    <th>
                                        <center>telefono Proveedor</center>
                                    </th>
                                    <th>
                                        <center>empresa Proveedor</center>
                                    </th>
                                    <th>
                                        <center>correo Proveedor</center>
                                    </th>
                                    <th>
                                        <center>direccion Proveedor</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($proveedores_datos as $proveedores_dato) {
                                    $id_proveedor = $proveedores_dato['id_proveedor'];
                                    $nombre_proveedor = $proveedores_dato['nombre_proveedor'];
                                    $celular_proveedor = $proveedores_dato['celular'];
                                    $telefono_proveedor = $proveedores_dato['telefono'];
                                    $empresa_proveedor = $proveedores_dato['empresa'];
                                    $email_proveedor = $proveedores_dato['email'];
                                    $direccion_proveedor = $proveedores_dato['direccion'];
                                    ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $contador = $contador + 1 ?></center>
                                        </td>
                                        <td> <?php echo $nombre_proveedor; ?></td>
                                        <td>
                                            <a href="https://wa.me/<?php echo $celular_proveedor; ?>"
                                                class="btn btn-success">
                                                <i class="fa fa-phone"></i>
                                                <?php echo $celular_proveedor; ?>
                                            </a>
                                        </td>
                                        <td> <?php echo $telefono_proveedor; ?></td>
                                        <td> <?php echo $empresa_proveedor; ?></td>
                                        <td> <?php echo $email_proveedor; ?></td>
                                        <td> <?php echo $direccion_proveedor; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-update<?php echo $id_proveedor; ?>">
                                                <i class="fa fa-pencil-alt"></i> Actualizar
                                            </button>
                                            <!-- modal para actualizar categorias -->
                                            <div class="modal fade" id="modal-update<?php echo $id_proveedor; ?>">
                                                <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Actualizacion del proveedor</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="Nombre">Nombre del proveedor</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $nombre_proveedor; ?>">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_nombre">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Celular">Celular del
                                                                            proveedor</label>
                                                                        <input id="Celular" type="text" class="form-control"
                                                                            value="<?php echo $celular_proveedor; ?>">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_celular">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Telefono">Telefono del
                                                                            proveedor</label>
                                                                        <input id="Telefono" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $telefono_proveedor; ?>">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_telefono">* Este campo es
                                                                            requerido</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="Empresa">Empresa del
                                                                            proveedor</label>
                                                                        <input id="Empresa" type="text" class="form-control"
                                                                            value="<?php echo $empresa_proveedor; ?>">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_empresa">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Correo">Correo del proveedor</label>
                                                                        <input id="Correo" type="email" class="form-control"
                                                                            value="<?php echo $email_proveedor; ?>">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_correo">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Direccion">Direccion del
                                                                            proveedor</label>
                                                                        <input id="Direccion" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $direccion_proveedor; ?>">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_direccion">* Este campo es
                                                                            requerido</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="button"
                                                                id="btn_update<?php echo $id_proveedor; ?>"
                                                                class="btn btn-success">Actualizar categoria</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                <script>
                                                    $('#btn_update<?php echo $id_proveedor; ?>').click(function () {

                                                        var id_proveedor = '<?php echo $id_proveedor; ?>'
                                                        var Nombre = $('#Nombre').val();
                                                        var Celular = $('#Celular').val();
                                                        var Telefono = $('#Telefono').val();
                                                        var Empresa = $('#Empresa').val();
                                                        var Correo = $('#Correo').val();
                                                        var Direccion = $('#Direccion').val();


                                                        if (Nombre == "") {
                                                            $('#Nombre').focus();
                                                            $('#lbl_nombre').css('display', 'block');
                                                        } else if (Celular == "") {
                                                            $('#Celular').focus();
                                                            $('#lbl_celular').css('display', 'block');
                                                        } else if (Telefono == "") {
                                                            $('#Telefono').focus();
                                                            $('#lbl_telefono').css('display', 'block');
                                                        } else if (Empresa == "") {
                                                            $('#Empresa').focus();
                                                            $('#lbl_empresa').css('display', 'block');
                                                        } else if (Correo == "") {
                                                            $('#Correo').focus();
                                                            $('#lbl_correo').css('display', 'block');
                                                        } else if (Direccion == "") {
                                                            $('#Direccion').focus();
                                                            $('#lbl_direccion').css('display', 'block');
                                                        } else {
                                                            var url = "../app/controllers/proveedores/update_de_proveedores.php";
                                                            $.get(url, {
                                                                id_proveedor: id_proveedor,
                                                                Nombre: Nombre,
                                                                Celular: Celular,
                                                                Telefono: Telefono,
                                                                Empresa: Empresa,
                                                                Correo: Correo,
                                                                Direccion: Direccion
                                                            }, function (datos) {
                                                                $('#respuesta').html(datos);
                                                            });
                                                        }
                                                    });
                                                </script>
                                                <div id="respuesta_update<?php echo $id_proveedor; ?>"></div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-delete<?php echo $id_proveedor; ?>">
                                                <i class="fa fa-trash"></i> delete
                                            </button>
                                            <!-- modal para actualizar categorias -->
                                            <div class="modal fade" id="modal-delete<?php echo $id_proveedor; ?>">
                                                <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">eliminacion del proveedor</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="Nombre">Nombre del proveedor</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $nombre_proveedor; ?>"
                                                                            disabled>
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_nombre">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Celular">Celular del
                                                                            proveedor</label>
                                                                        <input id="Celular" type="text" class="form-control"
                                                                            value="<?php echo $celular_proveedor; ?>"
                                                                            disabled>
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_celular">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Telefono">Telefono del
                                                                            proveedor</label>
                                                                        <input id="Telefono" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $telefono_proveedor; ?>"
                                                                            disabled>
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_telefono">* Este campo es
                                                                            requerido</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="Empresa">Empresa del
                                                                            proveedor</label>
                                                                        <input id="Empresa" type="text" class="form-control"
                                                                            value="<?php echo $empresa_proveedor; ?>"
                                                                            disabled>
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_empresa">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Correo">Correo del proveedor</label>
                                                                        <input id="Correo" type="email" class="form-control"
                                                                            value="<?php echo $email_proveedor; ?>"
                                                                            disabled>
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_correo">* Este campo es
                                                                            requerido</small>

                                                                        <label for="Direccion">Direccion del
                                                                            proveedor</label>
                                                                        <input id="Direccion" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $direccion_proveedor; ?>"
                                                                            disabled>
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_direccion">* Este campo es
                                                                            requerido</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="button"
                                                                id="btn_eliminar<?php echo $id_proveedor; ?>"
                                                                class="btn btn-danger">eliminar proveedor</button>
                                                        </div>
                                                        <div id="respuesta_delete<?php echo $id_proveedor; ?>"></div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                <script>
                                                    $('#btn_eliminar<?php echo $id_proveedor; ?>').click(function () {

                                                        var id_proveedor = '<?php echo $id_proveedor; ?>'

                                                        var url2 = "../app/controllers/proveedores/delete_de_proveedores.php";
                                                        $.get(url2, {
                                                            id_proveedor: id_proveedor
                                                        }, function (datos) {
                                                            $('#respuesta').html(datos);
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        <center>ID</center>
                                    </th>
                                    <th>
                                        <center>Nombre Proveedor</center>
                                    </th>
                                    <th>
                                        <center>celular Proveedor</center>
                                    </th>
                                    <th>
                                        <center>telefono Proveedor</center>
                                    </th>
                                    <th>
                                        <center>empresa Proveedor</center>
                                    </th>
                                    <th>
                                        <center>correo Proveedor</center>
                                    </th>
                                    <th>
                                        <center>direccion Proveedor</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos que mostrar",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPosFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }

            },

            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy'
                }, {
                    extend: 'pdf',
                }, {
                    extend: 'csv',
                }, {
                    extend: 'excel',
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
            {
                extend: 'colvis',
                text: 'Visol de columnas'
            }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- modal para registro de categorias -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Nombre">Nombre del proveedor</label>
                                <input id="Nombre" type="text" class="form-control">
                                <small style="color: red; display: none;" id="lbl_nombre">* Este campo es
                                    requerido</small>

                                <label for="Celular">Celular del proveedor</label>
                                <input id="Celular" type="text" class="form-control">
                                <small style="color: red; display: none;" id="lbl_celular">* Este campo es
                                    requerido</small>

                                <label for="Telefono">Telefono del proveedor</label>
                                <input id="Telefono" type="text" class="form-control">
                                <small style="color: red; display: none;" id="lbl_telefono">* Este campo es
                                    requerido</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Empresa">Empresa del proveedor</label>
                                <input id="Empresa" type="text" class="form-control">
                                <small style="color: red; display: none;" id="lbl_empresa">* Este campo es
                                    requerido</small>

                                <label for="Correo">Correo del proveedor</label>
                                <input id="Correo" type="email" class="form-control">
                                <small style="color: red; display: none;" id="lbl_correo">* Este campo es
                                    requerido</small>

                                <label for="Direccion">Direccion del proveedor</label>
                                <input id="Direccion" type="text" class="form-control">
                                <small style="color: red; display: none;" id="lbl_direccion">* Este campo es
                                    requerido</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btn-create" class="btn btn-primary">Guardar</button>

            </div>
            <div id="respuesta"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script>
    $('#btn-create').click(function () {
        // alert("guardar");
        var Nombre = $('#Nombre').val();
        var Celular = $('#Celular').val();
        var Telefono = $('#Telefono').val();
        var Empresa = $('#Empresa').val();
        var Correo = $('#Correo').val();
        var Direccion = $('#Direccion').val();


        if (Nombre == "") {
            $('#Nombre').focus();
            $('#lbl_nombre').css('display', 'block');
        } else if (Celular == "") {
            $('#Celular').focus();
            $('#lbl_celular').css('display', 'block');
        } else if (Telefono == "") {
            $('#Telefono').focus();
            $('#lbl_telefono').css('display', 'block');
        } else if (Empresa == "") {
            $('#Empresa').focus();
            $('#lbl_empresa').css('display', 'block');
        } else if (Correo == "") {
            $('#Correo').focus();
            $('#lbl_correo').css('display', 'block');
        } else if (Direccion == "") {
            $('#Direccion').focus();
            $('#lbl_direccion').css('display', 'block');
        } else {
            var url = "../app/controllers/proveedores/registro_de_proveedores.php";
            $.get(url, {
                Nombre: Nombre,
                Celular: Celular,
                Telefono: Telefono,
                Empresa: Empresa,
                Correo: Correo,
                Direccion: Direccion
            }, function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>