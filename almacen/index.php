<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include '../app/controllers/almacen/listado_de_productos.php';
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
                        <li class="breadcrumb-item active">Productos registrados</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container">
            <div class="col-md-12">

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Productos registrados</h3>
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
                                        <center>Codigo</center>
                                    </th>
                                    <th>
                                        <center>Categoria</center>
                                    </th>
                                    <th>
                                        <center>Imagen</center>
                                    </th>
                                    <th>
                                        <center>Nombre</center>
                                    </th>
                                    <th>
                                        <center>Descripcion</center>
                                    </th>
                                    <th>
                                        <center>Stock</center>
                                    </th>
                                    <th>
                                        <center>Stock Minimo</center>
                                    </th>
                                    <th>
                                        <center>Stock Maximo</center>
                                    </th>
                                    <th>
                                        <center>Precio Compra</center>
                                    </th>
                                    <th>
                                        <center>Precio Venta</center>
                                    </th>
                                    <th>
                                        <center>Fecha Compra</center>
                                    </th>
                                    <th>
                                        <center>Usuario</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($productos_datos as $productos_dato) {
                                    $id_producto = $productos_dato['id_producto'];
                                    ?>
                                    <tr>
                                        <td><?php echo $contador = $contador + 1; ?></td>
                                        <td><?php echo $productos_dato['codigo']; ?></td>
                                        <td><?php echo $productos_dato['categoria']; ?></td>
                                        <td><img src="<?php echo $url . "/almacen/img_productos/" . $productos_dato['imagen']; ?>"
                                                alt="" width="80%"></td>
                                        <td><?php echo $productos_dato['nombre']; ?></td>
                                        <td><?php echo $productos_dato['descripcion']; ?></td>

                                        <?php
                                        $stock_actual = $productos_dato['stock'];
                                        $stock_maximo = $productos_dato['stock_maximo'];
                                        $stock_minimo = $productos_dato['stock_minimo'];

                                        if ($stock_actual > $stock_maximo) { ?>
                                            <td style="background-color:#e60d33"><?php echo $productos_dato['stock']; ?></td>
                                            <?php
                                        } else if ($stock_actual < $stock_minimo) { ?>
                                                <td style="background-color:#dbe60e"><?php echo $productos_dato['stock']; ?></td>
                                            <?php
                                        } else { ?>
                                                <td style="background-color:#5FAF07"><?php echo $productos_dato['stock']; ?></td>
                                            <?php
                                        }
                                        ?>
                                        <td><?php echo $productos_dato['stock_minimo']; ?></td>
                                        <td><?php echo $productos_dato['stock_maximo']; ?></td>
                                        <td><?php echo $productos_dato['Precio_compra']; ?></td>
                                        <td><?php echo $productos_dato['precio_venta']; ?></td>
                                        <td><?php echo $productos_dato['fecha_ingreso']; ?></td>
                                        <td><?php echo $productos_dato['email']; ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <a href="show.php?id=<?php echo $id_producto; ?>"
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
                                        <center>Codigo</center>
                                    </th>
                                    <th>
                                        <center>Categoria</center>
                                    </th>
                                    <th>
                                        <center>Imagen</center>
                                    </th>
                                    <th>
                                        <center>Nombre</center>
                                    </th>
                                    <th>
                                        <center>Descripcion</center>
                                    </th>
                                    <th>
                                        <center>Stock</center>
                                    </th>
                                    <th>
                                        <center>Stock Minimo</center>
                                    </th>
                                    <th>
                                        <center>Stock Maximo</center>
                                    </th>
                                    <th>
                                        <center>Precio Compra</center>
                                    </th>
                                    <th>
                                        <center>Precio Venta</center>
                                    </th>
                                    <th>
                                        <center>Fecha Compra</center>
                                    </th>
                                    <th>
                                        <center>Usuario</center>
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