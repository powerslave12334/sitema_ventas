<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/cargar_producto.php');

foreach ($productos_datos as $productos_dato) {
    $codigo = $productos_dato['codigo'];
    $nombre = $productos_dato['nombre'];
    $categoria = $productos_dato['id_categoria'];
    $stock = $productos_dato['stock'];
    $stock_min = $productos_dato['stock_minimo'];
    $stock_max = $productos_dato['stock_maximo'];
    $precio_compra = $productos_dato['Precio_compra'];
    $precio_venta = $productos_dato['precio_venta'];
    $fecha_ingreso = $productos_dato['fecha_ingreso'];
    $usuario = $productos_dato['id_usuario'];
    $descripcion = $productos_dato['descripcion'];
    $image = $productos_dato['imagen'];
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido a Ventec</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detalles del PRODUCTO: <?php echo $nombre ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-danger collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Esta seguro que desea eliminar el registro</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <form action="../app/controllers/almacen/delete.php" method="POST">
                                    <input type="text" name="id_producto" value="<?php echo $id_producto_get; ?>" hidden>
                                   <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Codigo</label>
                                                        <input type="text" name="rol" class="form-control"
                                                            value="<?php echo $codigo; ?>"
                                                            placeholder="Inserte el Rol..." disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre del producto</label>
                                                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>"
                                                            placeholder="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">categoria</label>
                                                        <div style="display:flex">
                                                            <select name="id_categoria" id="" class="form-control"
                                                                disabled>
                                                                    <option>
                                                                        <?php echo $categoria; ?>
                                                                    </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Stock</label>
                                                        <input type="number" name="stock" class="form-control"
                                                            placeholder="" disabled value="<?php echo $stock; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Stock min</label>
                                                        <input type="number" name="stock_minimo" class="form-control" disabled value="<?php echo $stock_min; ?>"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Stock max</label>
                                                        <input type="number" name="stock_maximo" class="form-control" disabled value="<?php echo $stock_max; ?>"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Precio compra</label>
                                                        <input type="text" name="precio_compra" class="form-control" disabled value="<?php echo $precio_compra; ?>"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Precio venta</label>
                                                        <input type="text" name="precio_venta" class="form-control" disabled value="<?php echo $precio_venta; ?>"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Fecha Ingreso</label>
                                                        <input type="date" name="fecha_ingreso" class="form-control" disabled value="<?php echo $fecha_ingreso; ?>"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="text" name="rol" class="form-control"
                                                            value="<?php echo $email_sesion; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Descripcion</label>
                                                        <textarea name="descripcion" id="" cols="50" rows="5"
                                                            class="form-control" disabled><?php echo $descripcion; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <center>
                                                        <label for="">Imagen del producto</label>
                                                        <img src="<?php echo $url."/almacen/img_productos/".$image; ?>" alt="" width="200px">
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                       <button class="btn btn-danger"><i class="fa fa-trash"></i> Borrar producto</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
?>