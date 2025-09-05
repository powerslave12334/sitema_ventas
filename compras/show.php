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
                        <li class="breadcrumb-item active">Compra <?php echo $nro_compra; ?></li>
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
                            <div class="card card-info collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Informacion de la compra</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" style="display: block;">
                                    <h5>Datos del producto</h5>
                                   
                                    <div class="row mt-4">
                                        <div class="col-md-8">
                                            <div class="row">

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

                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Nombre">Nombre del proveedor</label>
                                                <input id="P_Nombre" type="text" class="form-control" value="<?php echo $P_Nombre ?>" disabled>

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
                                </div> 
                            </div> 
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
                                                <label for="">Numero de la compra</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $id_compra_get; ?>" disabled>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de la compra</label>
                                                <input type="text" class="form-control" id="fecha_compra" value="<?php echo $fecha_compra ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de la compra</label>
                                                <input type="text" class="form-control" id="comprobante"  value="<?php echo $comprobante ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio Compra</label>
                                                <input type="text" class="form-control" value="<?php echo $precio_compra ?>" disabled
                                                    id="precio_compra">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" class="form-control" id="cantidad_compra" value="<?php echo $cantidad_compra ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $usuario ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
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