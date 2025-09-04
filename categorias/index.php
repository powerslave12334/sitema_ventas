<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_de_categorias.php');
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
                            <i class="fa fa-plus"></i> Agregar nueva categoria
                        </button>
                    </h1>



                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de categorias</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container">
            <div class="col-md-12">

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">categorias registrados</h3>
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
                                        <center>Nombre de la categoria</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($categorias_datos as $categorias_dato) {
                                    $id_categoria = $categorias_dato['id_categoria'];
                                    $nombre_categoria = $categorias_dato['nombre_categoria'];
                                    ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $contador = $contador + 1 ?></center>
                                        </td>
                                        <td> <?php echo $categorias_dato['nombre_categoria']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-update<?php echo $id_categoria; ?>">
                                                <i class="fa fa-pencil-alt"></i> Actualizar
                                            </button>
                                            <!-- modal para actualizar categorias -->
                                            <div class="modal fade" id="modal-update<?php echo $id_categoria; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Actualizacion de la categoria</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="categoria">Nombre de la
                                                                            categoria</label>
                                                                        <input id="categoria<?php echo $id_categoria; ?>"
                                                                            value="<?php echo $nombre_categoria; ?>"
                                                                            type="text" class="form-control">
                                                                        <small style="color: red; display: none;"
                                                                            id="lbl_update<?php echo $id_categoria; ?>">*
                                                                            Este campo es
                                                                            requerido</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="button"
                                                                id="btn_update<?php echo $id_categoria; ?>"
                                                                class="btn btn-success">Actualizar categoria</button>

                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                <script>
                                                    $('#btn_update<?php echo $id_categoria; ?>').click(function () {

                                                        var nombre_categoria = $('#categoria<?php echo $id_categoria; ?>').val();
                                                        var id_categoria = '<?php echo $id_categoria; ?>'

                                                        if (nombre_categoria == "") {
                                                            $('#categoria<?php echo $id_categoria; ?>').focus();
                                                            $('#lbl_update<?php echo $id_categoria; ?>').css('display','block');
                                                        } else {
                                                            var url = "../app/controllers/categorias/update_de_categorias.php";
                                                            $.get(url, { nombre_categoria: nombre_categoria, id_categoria: id_categoria }, function (datos) {
                                                                $('#respuesta_update<?php echo $id_categoria; ?>').html(datos);
                                                            });
                                                        }

                                                    });
                                                </script>
                                                <div id="respuesta_update<?php echo $id_categoria; ?>"></div>
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
                                        <center>Nombre de la categoria</center>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPosFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Creacion de una nueva categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="categoria">Nombre de la categoria</label>
                                <input id="categoria" type="text" class="form-control">
                                <small style="color: red; display: none;" id="lbl_create">* Este campo es
                                    requerido</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btn-create" class="btn btn-primary">Guardar categoria</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script>
    $('#btn-create').click(function () {
        // alert("guardar");
        var nombre_categoria = $('#categoria').val();

        if (nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display', 'block');
        } else {
            var url = "../app/controllers/categorias/registro_de_categorias.php";
            $.get(url, { nombre_categoria: nombre_categoria }, function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>
<div id="respuesta"></div>