<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include '../app/controllers/compras/listado_de_compras.php';
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
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido a Ventec</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compras registradas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container">
            <div class="col-md-12">

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Compras registradas</h3>
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
                                        <center>compra</center>
                                    </th>
                                    <th>
                                        <center>producto</center>
                                    </th>
                                    <th>
                                        <center>nro de compra</center>
                                    </th>
                                    <th>
                                        <center>fecha de compra</center>
                                    </th>
                                    <th>
                                        <center>proveedor</center>
                                    </th>
                                    <th>
                                        <center>comprobante</center>
                                    </th>
                                    <th>
                                        <center>usuario</center>
                                    </th>
                                    <th>
                                        <center>precio de compra</center>
                                    </th>
                                    <th>
                                        <center>cantidad</center>
                                    </th>
                                    <th>
                                        <center>Fecha Creacion</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($compras_datos as $compras_dato) {
                                    $id_compras = $compras_dato['id_compra'];
                                    $id_producto = $compras_dato['nombre_producto'];
                                    $nro_compra = $compras_dato['nro_compra'];
                                    $fecha_compra = $compras_dato['fecha_compra'];
                                    $id_proveedor = $compras_dato['id_proveedor'];
                                    $comprobante = $compras_dato['comprobante'];
                                    $id_usuario = $compras_dato['id_usuario'];
                                    $precio_compra = $compras_dato['precio_compra'];
                                    $cantidad = $compras_dato['cantidad'];
                                    $fyh_creacion = $compras_dato['fyh_creacion'];
                                    ?>
                                    <tr>
                                        <td><?php echo $contador = $contador + 1; ?></td>
                                        <td><?php echo $id_compras ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-producto<?php echo $id_compras; ?>">
                                                <?php echo $id_producto ?>
                                            </button>
                                            <div class="modal fade" id="modal-producto<?php echo $id_compras; ?>">
                                                <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">datos de la compra</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Codigo</label>
                                                                        <input id="" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['codigo']; ?>"
                                                                            disabled>
                                                                        <label for="">Nombre</label>
                                                                        <input id="" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['nombre']; ?>"
                                                                            disabled>
                                                                        <label for="">Descripcion</label>
                                                                        <input id="" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['descripcion']; ?>"
                                                                            disabled>
                                                                        <label for="">Stock</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['stock']; ?>"
                                                                            disabled>
                                                                        <label for="">Stock Minimo</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['stock_minimo']; ?>"
                                                                            disabled>
                                                                        <label for="">Stock Maximo</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['stock_maximo']; ?>"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Precio Compra</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['precio_compra_producto']; ?>"
                                                                            disabled>
                                                                        <label for="">Precio Venta</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['precio_venta_producto']; ?>"
                                                                            disabled>
                                                                        <label for="">Fecha Ingreso</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['fecha_ingreso']; ?>"
                                                                            disabled>
                                                                        <label for="">Usuario</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['nombre_usuarios_producto']; ?>"
                                                                            disabled>
                                                                        <label for="">Categoria</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['nombre_categoria']; ?>"
                                                                            disabled>
                                                                        <label for="">Fecha de creacion</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['fyh_creacion']; ?>"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <center>
                                                                            <label for="">Imagen del producto</label>
                                                                            <img src="<?php echo $url . "/almacen/img_productos/" . $compras_dato['imagen']; ?>"
                                                                                alt="" width="200px">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </td>
                                        <td><?php echo $nro_compra ?></td>
                                        <td><?php echo $fecha_compra ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-proveedor<?php echo $id_compras; ?>">
                                                <?php echo $compras_dato['nombre_proveedor']; ?>
                                            </button>
                                            <div class="modal fade" id="modal-proveedor<?php echo $id_compras; ?>">
                                                <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">datos de la compra</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Nombre</label>
                                                                        <input id="" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['nombre_proveedor']; ?>"
                                                                            disabled>
                                                                        <label for="">Celular</label>
                                                                        <br>
                                                                        <a href="https://wa.me/<?php echo $compras_dato['celular_proveedor']; ?>"
                                                                            class="btn btn-success">
                                                                            <i class="fa fa-phone"></i>
                                                                            <?php echo $compras_dato['celular_proveedor']; ?>
                                                                        </a>
                                                                        <br>
                                                                        <label for="">Telefono</label>
                                                                        <input id="" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['telefono_proveedor']; ?>"
                                                                            disabled>
                                                                        <label for="">Empresa</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['empresa']; ?>"
                                                                            disabled>
                                                                        <label for="">Email</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['email_proveedor']; ?>"
                                                                            disabled>
                                                                        <label for="">Direccion</label>
                                                                        <input id="Nombre" type="text" class="form-control"
                                                                            value="<?php echo $compras_dato['direccion']; ?>"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </td>
                                        <td><?php echo $comprobante ?></td>
                                        <td><?php echo $compras_dato['nombre_usuarios_producto'] ?></td>
                                        <td><?php echo $precio_compra ?></td>
                                        <td><?php echo $cantidad ?></td>
                                        <td><?php echo $fyh_creacion ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <a href="show.php?id=<?php echo $id_compras; ?>"
                                                        class="btn btn-primary"><i class="fa fa-eye-alt"></i>Ver</a>
                                                    <br>
                                                    <a href="update.php?id=<?php echo $id_producto; ?>"
                                                        class="btn btn-success"><i class="fa fa-pencil-alt"></i>Editar</a>
                                                    <br>
                                                    <a href="delete.php?id=<?php echo $id_producto; ?>"
                                                        class="btn btn-danger"><i class="fa fa-pencil-alt"></i>Eliminar</a>
                                                </div>
                                            </center>
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
                                        <center>compra</center>
                                    </th>
                                    <th>
                                        <center>producto</center>
                                    </th>
                                    <th>
                                        <center>nro de compra</center>
                                    </th>
                                    <th>
                                        <center>fecha de compra</center>
                                    </th>
                                    <th>
                                        <center>proveedor</center>
                                    </th>
                                    <th>
                                        <center>comprobante</center>
                                    </th>
                                    <th>
                                        <center>usuario</center>
                                    </th>
                                    <th>
                                        <center>precio de compra</center>
                                    </th>
                                    <th>
                                        <center>cantidad</center>
                                    </th>
                                    <th>
                                        <center>Fecha Creacion</center>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPosFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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