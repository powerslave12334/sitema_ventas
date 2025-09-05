<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include '../app/controllers/almacen/listado_de_productos.php';
include('../app/controllers/proveedores/listado_de_proveedores.php');
include '../app/controllers/compras/cargar_compra.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido a Ventec</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Actualizacion de la compra</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Llena los campos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <h5>Datos del producto</h5>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-buscar-producto">
                                        <i class="fa fa-search"></i> Buscar producto
                                    </button>

                                    <!-- Modal de búsqueda -->
                                    <div class="modal fade" id="modal-buscar-producto">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Búsqueda del producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                        ID
                                                                    </th>
                                                                    <th>
                                                                        seleccionar
                                                                    </th>
                                                                    <th>
                                                                        Código
                                                                    </th>
                                                                    <th>
                                                                        Categoría
                                                                    </th>
                                                                    <th>
                                                                        Imagen
                                                                    </th>
                                                                    <th>
                                                                        Nombre
                                                                    </th>
                                                                    <th>
                                                                        Descripción
                                                                    </th>
                                                                    <th>
                                                                        Stock
                                                                    </th>
                                                                    <th>
                                                                        Stock Mínimo
                                                                    </th>
                                                                    <th>
                                                                        Stock Máximo
                                                                    </th>
                                                                    <th>
                                                                        Precio Compra
                                                                    </th>
                                                                    <th>
                                                                        Precio Venta
                                                                    </th>
                                                                    <th>
                                                                        Fecha Ingreso
                                                                    </th>
                                                                    <th>
                                                                        Usuario
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
                                                                        <td>
                                                                            <button
                                                                                id="btn_seleccionar<?php echo $id_producto; ?>"
                                                                                type="button" class="btn btn-primary">
                                                                                seleccionar
                                                                            </button>
                                                                            <script>
                                                                                $('#btn_seleccionar<?php echo $id_producto; ?>').click(function () {

                                                                                    var id_producto = "<?php echo $productos_dato['id_producto']; ?>";
                                                                                    $('#id_producto').val(id_producto);

                                                                                    var codigo = "<?php echo $productos_dato['codigo']; ?>";
                                                                                    $('#codigo').val(codigo);

                                                                                    var categoria = "<?php echo $productos_dato['categoria']; ?>";
                                                                                    $('#categoria').val(categoria);

                                                                                    var nombre = "<?php echo $productos_dato['nombre']; ?>";
                                                                                    $('#nombre').val(nombre);

                                                                                    var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                                    $('#descripcion').val(descripcion);

                                                                                    var stock = "<?php echo $productos_dato['stock']; ?>";
                                                                                    $('#stock').val(stock);
                                                                                    $('#Stock_actual').val(stock);

                                                                                    var stock_minimo = "<?php echo $productos_dato['stock_minimo']; ?>";
                                                                                    $('#stock_minimo').val(stock_minimo);

                                                                                    var stock_maximo = "<?php echo $productos_dato['stock_maximo']; ?>";
                                                                                    $('#stock_maximo').val(stock_maximo);

                                                                                    var Precio_compra = "<?php echo $productos_dato['Precio_compra']; ?>";
                                                                                    $('#precio_compra').val(Precio_compra);

                                                                                    var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                                    $('#precio_venta').val(precio_venta);

                                                                                    var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso']; ?>";
                                                                                    $('#fecha_ingreso').val(fecha_ingreso);

                                                                                    var email = "<?php echo $productos_dato['email']; ?>";
                                                                                    $('#usuario').val(email);

                                                                                    var ruta_img = "<?php echo $url . '/almacen/img_productos/' . $productos_dato['imagen']; ?>";
                                                                                    $('#img_producto').attr("src", ruta_img);

                                                                                    $('#modal-buscar-producto').modal('toggle');

                                                                                });
                                                                            </script>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['codigo']; ?></td>
                                                                        <td><?php echo $productos_dato['categoria']; ?></td>
                                                                        <td><img src="<?php echo $url . "/almacen/img_productos/" . $productos_dato['imagen']; ?>"
                                                                                width="80%"></td>
                                                                        <td><?php echo $productos_dato['nombre']; ?></td>
                                                                        <td><?php echo $productos_dato['descripcion']; ?>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['stock']; ?></td>
                                                                        <td><?php echo $productos_dato['stock_minimo']; ?>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['stock_maximo']; ?>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['Precio_compra']; ?>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['precio_venta']; ?>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['fecha_ingreso']; ?>
                                                                        </td>
                                                                        <td><?php echo $productos_dato['email']; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>
                                                                        ID
                                                                    </th>
                                                                    <th>
                                                                        seleccionar
                                                                    </th>
                                                                    <th>
                                                                        Código
                                                                    </th>
                                                                    <th>
                                                                        Categoría
                                                                    </th>
                                                                    <th>
                                                                        Imagen
                                                                    </th>
                                                                    <th>
                                                                        Nombre
                                                                    </th>
                                                                    <th>
                                                                        Descripción
                                                                    </th>
                                                                    <th>
                                                                        Stock
                                                                    </th>
                                                                    <th>
                                                                        Stock Mínimo
                                                                    </th>
                                                                    <th>
                                                                        Stock Máximo
                                                                    </th>
                                                                    <th>
                                                                        Precio Compra
                                                                    </th>
                                                                    <th>
                                                                        Precio Venta
                                                                    </th>
                                                                    <th>
                                                                        Fecha Ingreso
                                                                    </th>
                                                                    <th>
                                                                        Usuario
                                                                    </th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin modal -->

                                    <div class="row mt-4">
                                        <div class="col-md-8">
                                            <div class="row">

                                                <input type="text" id="id_producto" class="form-control" value="<?php echo $id_producto?>" >

                                                <div class="col-md-4 form-group">
                                                    <label for="">Código</label>
                                                    <input type="text" id="codigo" class="form-control" value="<?php echo $codigo?>" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Nombre del producto</label>
                                                    <input type="text" id="nombre" class="form-control" value="<?php echo $nombre?>" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Categoría</label>
                                                    <input type="text" id="categoria" class="form-control" value="<?php echo $nombre_categoria?>" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Stock</label>
                                                    <input type="number" id="stock" class="form-control" value="<?php echo $stock ?>" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Stock Min</label>
                                                    <input type="number" id="stock_minimo" class="form-control" value="<?php echo $stock_minimo ?>"
                                                        disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Stock Max</label>
                                                    <input type="number" id="stock_maximo" class="form-control" value="<?php echo $stock_maximo ?>"
                                                        disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Precio compra</label>
                                                    <input type="text" id="precio_compra" class="form-control" value="<?php echo $precio_compra_producto ?>" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Precio venta</label>
                                                    <input type="text" id="precio_venta" class="form-control" value="<?php echo $precio_venta ?>" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">Fecha ingreso</label>
                                                    <input type="date" id="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso ?>" disabled>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="">Usuario</label>
                                                    <input type="text" id="usuario" class="form-control" value="<?php echo $usuario ?>" disabled>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="">Descripción</label>
                                                    <textarea class="form-control" id="descripcion" rows="4"
                                                        disabled><?php echo $descripcion?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Imagen del producto</label>
                                            <div class="form-group text-center">
                                                <img src="<?php echo $url . "/almacen/img_productos/" . $img_producto; ?>"
                                                    id="img_producto" alt="" width="200px">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>Datos del proveedor</h5>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-buscar-proveedor">
                                        <i class="fa fa-search"></i> Buscar proveedor
                                    </button>

                                    <!-- Modal de búsqueda -->
                                    <div class="modal fade" id="modal-buscar-proveedor">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Búsqueda del proveedor</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                        ID
                                                                    </th>
                                                                    <th>
                                                                        seleccionar
                                                                    </th>
                                                                    <th>
                                                                        Nombre Proveedor
                                                                    </th>
                                                                    <th>
                                                                        celular Proveedor
                                                                    </th>
                                                                    <th>
                                                                        telefono Proveedor
                                                                    </th>
                                                                    <th>
                                                                        empresa Proveedor
                                                                    </th>
                                                                    <th>
                                                                        correo Proveedor
                                                                    </th>
                                                                    <th>
                                                                        direccion Proveedor
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
                                                                            <?php echo $contador = $contador + 1 ?>

                                                                        </td>
                                                                        <td>
                                                                            <button
                                                                                id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>"
                                                                                type="button" class="btn btn-primary">
                                                                                seleccionar
                                                                            </button>
                                                                            <script>
                                                                                $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click(function () {
                                                                                    var id_proveedor = "<?php echo $proveedores_dato['id_proveedor']; ?>";
                                                                                    $('#id_proveedor').val(id_proveedor);

                                                                                    var P_Nombre = "<?php echo $proveedores_dato['nombre_proveedor']; ?>";
                                                                                    $('#P_Nombre').val(P_Nombre);

                                                                                    var P_Celular = "<?php echo $proveedores_dato['celular']; ?>";
                                                                                    $('#P_Celular').val(P_Celular);

                                                                                    var P_Telefono = "<?php echo $proveedores_dato['telefono']; ?>";
                                                                                    $('#P_Telefono').val(P_Telefono);

                                                                                    var P_Empresa = "<?php echo $proveedores_dato['empresa']; ?>";
                                                                                    $('#P_Empresa').val(P_Empresa);

                                                                                    var P_Correo = "<?php echo $proveedores_dato['email']; ?>";
                                                                                    $('#P_Correo').val(P_Correo);

                                                                                    var P_Direccion = "<?php echo $proveedores_dato['direccion']; ?>";
                                                                                    $('#P_Direccion').val(P_Direccion);

                                                                                    $('#modal-buscar-proveedor').modal('toggle');

                                                                                });
                                                                            </script>
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
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>
                                                                        ID
                                                                    </th>
                                                                    <th>
                                                                        seleccionar
                                                                    </th>
                                                                    <th>
                                                                        Nombre Proveedor
                                                                    </th>
                                                                    <th>
                                                                        celular Proveedor
                                                                    </th>
                                                                    <th>
                                                                        telefono Proveedor
                                                                    </th>
                                                                    <th>
                                                                        empresa Proveedor
                                                                    </th>
                                                                    <th>
                                                                        correo Proveedor
                                                                    </th>
                                                                    <th>
                                                                        direccion Proveedor
                                                                    </th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Nombre">Nombre del proveedor</label>
                                                <input type="text" id="id_proveedor" value="<?php echo $id_proveedor_tabla ?>" >
                                                <input id="P_Nombre" type="text" class="form-control" value="<?php echo $P_Nombre_tabla ?>" disabled>

                                                <label for="Celular">Celular del proveedor</label>
                                                <input id="P_Celular" type="text" class="form-control" value="<?php echo $P_Celular ?>" disabled>

                                                <label for="Telefono">Telefono del proveedor</label>
                                                <input id="P_Telefono" type="text" class="form-control" value="<?php echo $P_Telefono ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Empresa">Empresa del proveedor</label>
                                                <input id="P_Empresa" type="text" class="form-control" value="<?php echo $P_Empresa ?>" disabled>


                                                <label for="Correo">Correo del proveedor</label>
                                                <input id="P_Correo" type="email" class="form-control" value="<?php echo $P_Correo ?>" disabled>


                                                <label for="Direccion">Direccion del proveedor</label>
                                                <input id="P_Direccion" type="text" class="form-control" value="<?php echo $P_Direccion ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin modal -->
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos de la compra</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php
                                                $contador_compras = 1;
                                                foreach ($compras_datos as $compras_dato) {
                                                    $contador_compras = $contador_compras + 1;
                                                }
                                                ?>
                                                <label for="">Numero de la compra</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $id_compra_get; ?>" disabled>
                                                <input id="numero_compra" type="text"
                                                    value="<?php echo $id_compra_get; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de la compra</label>
                                                <input type="date" class="form-control"  value="<?php echo $fecha_compra ?>" id="fecha_compra">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de la compra</label>
                                                <input type="text" class="form-control" value="<?php echo $comprobante ?>" id="comprobante">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio Compra</label>
                                                <input type="text" class="form-control" value="<?php echo $precio_compra ?>"
                                                    id="precio_compra_controlador">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock Actual</label>
                                                <input id="Stock_actual" type="text" class="form-control" value="<?php echo $stock = $cantidad_compra - $stock; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock total</label>
                                                <input id="Stock_total" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" class="form-control" id="cantidad_compra" value="<?php echo $cantidad_compra ?>">
                                            </div>
                                            <script>
                                                $('#cantidad_compra').keyup(function () {
                                                    var stock_actual = $('#Stock_actual').val();
                                                    var stock_compra = $('#cantidad_compra').val();
                                                    var stock_total = parseInt(stock_actual) + parseInt(stock_compra);
                                                    $('#Stock_total').val(stock_total);

                                                })
                                            </script>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $email_sesion ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-block"
                                                    id="btn_actualizar_compra">Actualizar compra</button>
                                            </div>

                                        </div>
                                        <script>
                                            $('#btn_actualizar_compra').click(function () {
                                                var id_compra = '<?php echo $id_compra;?>'

                                                var id_producto = $('#id_producto').val();
                                                var numero_compra = $('#numero_compra').val();
                                                var fecha_compra = $('#fecha_compra').val();
                                                var id_proveedor = $('#id_proveedor').val();
                                                var comprobante = $('#comprobante').val();
                                                var usuario = '<?php echo $id_usuario_session ?>';
                                                var precio_compra = $('#precio_compra_controlador').val();
                                                var cantidad_compra = $('#cantidad_compra').val();

                                                var stock_total = $('#Stock_total').val();

                                                if (id_producto == "") {
                                                    $('#id_producto').focus();
                                                    alert('estan vacios producto');
                                                } else if (fecha_compra == "") {
                                                    $('#fecha_compra').focus();
                                                    alert('estan vacios fecha');
                                                } else if (comprobante == "") {
                                                    $('#comprobante').focus();
                                                    alert('estan vacios comprobante');
                                                } else if (precio_compra == "") {
                                                    $('#precio_compra_controlador').focus();
                                                    alert('estan vacios precio');
                                                } else if (cantidad_compra == "") {
                                                    $('#cantidad_compra').focus();
                                                    alert('estan vacios cantidad compra');
                                                } else {
                                                    var url = "../app/controllers/compras/update.php";
                                                    $.get(url, {
                                                        id_compra: id_compra,
                                                        id_producto: id_producto,
                                                        numero_compra: numero_compra,
                                                        fecha_compra: fecha_compra,
                                                        id_proveedor: id_proveedor,
                                                        comprobante: comprobante,
                                                        usuario: usuario,
                                                        precio_compra: precio_compra,
                                                        cantidad_compra: cantidad_compra,
                                                        stock_total: stock_total
                                                    }, function (datos) {
                                                        $('#respuesta_update').html(datos);
                                                    });
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div id="respuesta_update"></div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function () {
        $("#example2").DataTable({
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>