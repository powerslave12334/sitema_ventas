<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <?php

                            $contador_de_ventas = 0;
                            foreach ($ventas_datos as $ventas_dato) {
                                $contador_de_ventas = $contador_de_ventas + 1;
                            }

                            ?>
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i>Venta Nro
                                <input type="text" value="<?php echo $contador_de_ventas + 1 ?>">
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <b>Carrito</b>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-buscar_producto">
                                <i class="fa fa-search"></i>
                                Buscar producto
                            </button>
                            <!-- modal para visualizar datos de los proveedor -->
                            <div class="modal fade" id="modal-buscar_producto">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1d36b6;color: white">
                                            <h4 class="modal-title">Busqueda del producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example1"
                                                    class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Selecionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Código</center>
                                                            </th>
                                                            <th>
                                                                <center>Categoría</center>
                                                            </th>
                                                            <th>
                                                                <center>Imagen</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>
                                                            <th>
                                                                <center>Descripción</center>
                                                            </th>
                                                            <th>
                                                                <center>Stock</center>
                                                            </th>
                                                            <th>
                                                                <center>Precio compra</center>
                                                            </th>
                                                            <th>
                                                                <center>Precio venta</center>
                                                            </th>
                                                            <th>
                                                                <center>Fecha compra</center>
                                                            </th>
                                                            <th>
                                                                <center>Usuario</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($productos_datos as $productos_dato) {
                                                            $id_producto = $productos_dato['id_producto']; ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1; ?>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-info"
                                                                        id="btn_selecionar<?php echo $id_producto; ?>">
                                                                        Selecionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_selecionar<?php echo $id_producto; ?>').click(function () {

                                                                            var id_producto = "<?php echo $productos_dato['id_producto']; ?>";
                                                                            $('#id_producto').val(id_producto);

                                                                            var producto = "<?php echo $productos_dato['nombre']; ?>";
                                                                            $('#producto').val(producto);

                                                                            var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                            $('#descripcion').val(descripcion);

                                                                            var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                            $('#precio_venta').val(precio_venta);

                                                                            $('#cantidad').focus();

                                                                            //$('#modal-buscar_producto').modal('toggle');

                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $productos_dato['codigo']; ?></td>
                                                                <td><?php echo $productos_dato['categoria']; ?>
                                                                </td>
                                                                <td>
                                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $productos_dato['imagen']; ?>"
                                                                        width="50px" alt="">
                                                                </td>
                                                                <td><?php echo $productos_dato['nombre']; ?></td>
                                                                <td><?php echo $productos_dato['descripcion']; ?>
                                                                </td>
                                                                <td><?php echo $productos_dato['stock']; ?></td>
                                                                <td><?php echo $productos_dato['precio_compra']; ?>
                                                                </td>
                                                                <td><?php echo $productos_dato['precio_venta']; ?>
                                                                </td>
                                                                <td><?php echo $productos_dato['fecha_ingreso']; ?>
                                                                </td>
                                                                <td><?php echo $productos_dato['email']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Producto</label>
                                                            <input type="text" name="" id="id_producto">
                                                            <input type="text" name="" id="producto"
                                                                class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Detalle</label>
                                                        <input type="text" name="" id="descripcion" class="form-control"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">cantidad</label>
                                                        <input type="text" name="" id="cantidad" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Precio Unitario</label>
                                                        <input type="text" name="" id="precio_venta"
                                                            class="form-control" disabled>
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary"
                                                    id="btn_registrar_carrito">Registrar</button>
                                                <div id="respuesta_carrito"></div>
                                                <script>
                                                    $('#btn_registrar_carrito').click(function () {
                                                        var nro_venta = '<?php echo $contador_de_ventas + 1; ?>'
                                                        var id_producto = $('#id_producto').val();
                                                        var cantidad = $('#cantidad').val();

                                                        if (id_producto == "") {
                                                            alert("debe de llenar los campos");
                                                        } else if (cantidad == "") {
                                                            alert("debe de llenar la cantidad del producto");
                                                        } else {
                                                            var url = "../app/controllers/ventas/registrar_carrito.php";
                                                            $.get(url, {
                                                                nro_venta: nro_venta,
                                                                id_producto: id_producto,
                                                                cantidad: cantidad
                                                            }, function (datos) {
                                                                $('#respuesta_carrito').html(datos);
                                                            });
                                                        }
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table -table-bordered table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Producto</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Precio SubTotal</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_de_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_venta_total = 0;
                                        $precio_total = 0;

                                        $nro_venta = $contador_de_ventas + 1;
                                        $sql_carrito = "SELECT *,pro.nombre as nombre_producto,
                                        pro.descripcion as descripcion,
                                        pro.precio_venta as precio_venta,
                                        pro.stock as stock FROM 
                                        tb_carrito AS carr INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto 
                                        WHERE nro_venta='$nro_venta'";

                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();
                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($carrito_datos as $carrito_dato) {
                                            $id_carrito = $carrito_dato['id_carrito'];
                                            $contador_de_carrito = $contador_de_carrito + 1;
                                            $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                            $precio_venta_total = $precio_venta_total + floatval($carrito_dato['precio_venta']);
                                            ?>

                                            <tr>
                                                <td>
                                                    <center><?php echo $contador_de_carrito; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['nombre_producto']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['descripcion']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['cantidad']; ?></center>
                                                    <input type="text" id="stock_de_inventario<?php echo $id_carrito; ?>"
                                                        value="<?php echo $carrito_dato['stock']; ?>" hidden>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['precio_venta']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php

                                                        $cantidad = floatval($carrito_dato['cantidad']);
                                                        $precio_venta = floatval($carrito_dato['precio_venta']);
                                                        echo $subtotal = $cantidad * $precio_venta;
                                                        $precio_total = $precio_total + $subtotal;
                                                        ?>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <form action="../app/controllers/ventas/borrar_carrito.php"
                                                            method="post">
                                                            <input type="text" name="id_carrito"
                                                                value="<?php echo $id_carrito; ?>" hidden>
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash"></i> Borrar</button>
                                                        </form>
                                                    </center>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th>
                                                <center>
                                                    <?php echo $cantidad_total; ?>
                                                </center>
                                            </th>
                                            <th>
                                                <center><?php echo $precio_venta_total; ?></center>
                                            </th>
                                            <th>
                                                <center><?php echo $precio_total; ?></center>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.modal -->
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i>Datos del cliente
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <b>Cliente</b>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-buscar_cliente">
                                <i class="fa fa-search"></i>
                                Buscar Cliente
                            </button>
                            <!-- modal para visualizar datos de los proveedor -->
                            <div class="modal fade" id="modal-buscar_cliente">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1d36b6;color: white">
                                            <h4 class="modal-title">Busqueda del Cliente</h4>
                                            <br>
                                            <div style="width: 10px;">

                                            </div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-agregar_cliente">
                                                <i class="fa fa-user-plus"></i>
                                                Agregar Cliente
                                            </button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example2"
                                                    class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Selecionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>
                                                            <th>
                                                                <center>NIT/CI</center>
                                                            </th>
                                                            <th>
                                                                <center>Celular</center>
                                                            </th>
                                                            <th>
                                                                <center>Correo</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador_de_clientes = 0;
                                                        foreach ($clientes_datos as $clientes_dato) {
                                                            $id_cliente = $clientes_dato['id_cliente'];
                                                            $contador_de_clientes = $contador_de_clientes + 1;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $contador_de_clientes; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center><button class="btn btn-primary btn-sm"
                                                                            id="btn_pasar_cliente<?php echo $id_cliente; ?>">Seleccionar</button>
                                                                        <script>
                                                                            $('#btn_pasar_cliente<?php echo $id_cliente; ?>').click(function () {
                                                                                var id_cliente = '<?php echo $clientes_dato['id_cliente']; ?>';
                                                                                $('#id_cliente').val(id_cliente);
                                                                                var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente']; ?>';
                                                                                $('#nombre_cliente').val(nombre_cliente);
                                                                                var nit_ci_cliente = '<?php echo $clientes_dato['nit_ci_cliente']; ?>';
                                                                                $('#nit_ci_cliente').val(nit_ci_cliente);
                                                                                var celular_cliente = '<?php echo $clientes_dato['numero_celular']; ?>';
                                                                                $('#celular_cliente').val(celular_cliente);
                                                                                var email_cliente = '<?php echo $clientes_dato['email_cliente']; ?>';
                                                                                $('#correo_cliente').val(email_cliente);

                                                                                $('#modal-buscar_cliente').modal('toggle');
                                                                            })
                                                                        </script>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $clientes_dato['nombre_cliente']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $clientes_dato['nit_ci_cliente']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $clientes_dato['numero_celular']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $clientes_dato['email_cliente']; ?>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <br><br>

                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" id="id_cliente" value="" hidden>
                                    <div class="form-group">
                                        <label for="">Nombre del Cliente</label>
                                        <input type="text" name="" id="nombre_cliente" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIT/CI</label>
                                        <input type="text" name="" id="nit_ci_cliente" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular del Cliente</label>
                                        <input type="text" name="" id="celular_cliente" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo del Cliente</label>
                                        <input type="text" name="" id="correo_cliente" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i>Datos del cliente
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Monto a cancelar</label>
                                <input type="text" class="form-control" id="total_a_cancelar"
                                    value="<?php echo $precio_total; ?>" disabled>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Total Pagado</label>
                                        <input type="text" class="form-control" id="total_pagado" value="">
                                        <script>
                                            $('#total_pagado').keyup(function () {
                                                var total_a_cancelar = $('#total_a_cancelar').val();
                                                var total_pagado = $('#total_pagado').val();
                                                var cambio = parseFloat(total_pagado) - parseFloat(total_a_cancelar);
                                                $('#cambio').val(cambio);
                                            })
                                        </script>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Cambio</label>
                                        <input type="text" class="form-control" value="" id="cambio" disabled>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar
                                            Venta</button>
                                        <div id="respuesta_registro_venta"></div>
                                        <script>
                                            $('#btn_guardar_venta').click(function () {
                                                var nro_venta = '<?php echo $contador_de_ventas + 1 ?>';
                                                var id_cliente = $('#id_cliente').val();
                                                var total_a_cancelar = $('#total_a_cancelar').val();

                                                if (id_cliente == "") {
                                                    alert('Debe llenar los datos del cliente');
                                                } else {
                                                    //guardar_venta();
                                                }

                                                var i = 1;
                                                var n = '<?php echo $contador_de_carrito; ?>';
                                                alert(n);

                                                function actualizar_stock() {
                                                    var stock = ''
                                                    for (var i = 0; 0 > 3; i++) {
                                                        var stock_de_inventario = $('#stock_de_inventario<?php echo $id_carrito; ?>')
                                                    }
                                                }


                                                function guardar_venta() {
                                                    var url = "../app/controllers/ventas/registro_de_ventas.php";
                                                    $.get(url, {
                                                        nro_venta: nro_venta,
                                                        id_cliente: id_cliente,
                                                        total_a_cancelar: total_a_cancelar
                                                    }, function (datos) {
                                                        $('#respuesta_registro_venta').html(datos);
                                                    });
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('../layout/mensajes.php'); ?>
    <?php include('../layout/parte2.php'); ?>



    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                    "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                    "infoPostFix": "",
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

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });


        $(function () {
            $("#example2").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                    "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                    "infoPostFix": "",
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

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <div class="modal fade" id="modal-agregar_cliente">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1d36b6;color: white">
                    <h4 class="modal-title">Agregar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../app/controllers/clientes/guardar_clientes.php">
                        <div class="form-group">
                            <label for="">Nombre cliente</label>
                            <input type="text" name="nombre_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">NIT/CI del cliente</label>
                            <input type="text" name="nit_ci_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Celular del cliente</label>
                            <input type="text" name="celular_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Correo del cliente</label>
                            <input type="text" name="email_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>