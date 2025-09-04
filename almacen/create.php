<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/categorias/listado_de_categorias.php');
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
                        <li class="breadcrumb-item active">Registrar producto</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Llena los campos</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <form action="../app/controllers/almacen/create.php" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Codigo</label>
                                                        <?php
                                                        function ceros($numero)
                                                        {
                                                            $len = 0;
                                                            $cantidad_ceros = 5;
                                                            $aux = $numero;
                                                            $pos = strlen($numero);
                                                            $len = $cantidad_ceros - $pos;
                                                            for ($i = 0; $i < $len; $i++) {
                                                                $aux = "0" . $aux;
                                                            }
                                                            return $aux;
                                                        }
                                                        $contador_de_id_productos = 0;
                                                        foreach ($productos_datos as $productos_dato) {
                                                            $contador_de_id_productos = $contador_de_id_productos + 1;
                                                        }
                                                        ?>
                                                        <input type="text" name="rol" class="form-control"
                                                            value="<?php echo "p-" . ceros($contador_de_id_productos) ?>"
                                                            placeholder="Inserte el Rol..." disabled>
                                                        <input type="text" name="codigo"
                                                            value="<?php echo "p-" . ceros($contador_de_id_productos) ?>"
                                                            hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre del producto</label>
                                                        <input type="text" name="nombre" class="form-control"
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">categoria</label>
                                                        <div style="display:flex">
                                                            <select name="id_categoria" id="" class="form-control" required>
                                                                <?php
                                                                foreach ($categorias_datos as $categorias_dato) { ?>
                                                                    <option
                                                                        value="<?php echo $categorias_dato['id_categoria']; ?>">
                                                                        <?php echo $categorias_dato['nombre_categoria']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>
                                                            <a href="<?php echo $url ?>/categorias"
                                                                class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Stock</label>
                                                        <input type="number" name="stock" class="form-control"
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Stock min</label>
                                                        <input type="number" name="stock_minimo" class="form-control"
                                                            placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Stock max</label>
                                                        <input type="number" name="stock_maximo" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Precio compra</label>
                                                        <input type="text" name="precio_compra" class="form-control"
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Precio venta</label>
                                                        <input type="text" name="precio_venta" class="form-control"
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Fecha Ingreso</label>
                                                        <input type="date" name="fecha_ingreso" class="form-control"
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="text" name="rol" class="form-control"
                                                            value="<?php echo $email_sesion; ?>" disabled>
                                                        <input name="usuario" type="text"
                                                            value="<?php echo $id_usuario_session; ?>" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Descripcion</label>
                                                        <textarea name="descripcion" id="" cols="50" rows="5"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Imagen del producto</label>
                                                        <input id="file" type="file" name="image" class="form-control">
                                                        <output id="list"></output>
                                                        <script>
                                                            function archivo(evt) {
                                                                var files = evt.target.files; // FileList object
                                                                // Obtenemos la imagen del campo "file".
                                                                for (var i = 0, f; f = files[i]; i++) {
                                                                    //Solo admitimos imágenes.
                                                                    if (!f.type.match('image.*')) {
                                                                        continue;
                                                                    }
                                                                    var reader = new FileReader();
                                                                    reader.onload = (function (theFile) {
                                                                        return function (e) {
                                                                            // Insertamos la imagen
                                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                        };
                                                                    })(f);
                                                                    reader.readAsDataURL(f);
                                                                }
                                                            }
                                                            document.getElementById('file').addEventListener('change', archivo, false);
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button class="btn btn-secondary">Cancelar</button>
                                        <button class="btn btn-primary">Guardar Producto</button>
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