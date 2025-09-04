<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/update_usuarios.php');
include('../app/controllers/roles/listado_de_roles.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bienvenido a Ventec</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success collapsed-card">
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
                                <form action="../app/controllers/usuarios/update.php" method="post">
                                    <input hidden name="id_usuario" value="<?php echo $id_usuario_get; ?>" type="text">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input value="<?php echo $nombres; ?>" type="text" name="nombres"
                                            class="form-control" placeholder="Nombre" required>
                                        <label for="">Email</label>
                                        <input value="<?php echo $email; ?>" type="email" name="email"
                                            class="form-control" placeholder="Correo" required>

                                        <label for="">Rol del usuario</label>
                                        <select name="rol" id="" class="form-control">
                                            <?php
                                            foreach ($roles_datos as $roles_dato) {
                                                $rol_tabla = $roles_dato['rol'];
                                                $id_rol = $roles_dato['id_rol']; ?>
                                                <option value="<?php echo $id_rol; ?>" <?php
                                                   if ($rol_tabla == $rol) { ?> selected="selected" <?php }
                                                   ?>> <?php echo $rol_tabla; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                        <label for="">Contraseña</label>
                                        <input type="text" name="password_user" class="form-control"
                                            placeholder="Contraseña">
                                        <label for="">Verificar la contraseña</label>
                                        <input type="text" name="password_repeat" class="form-control"
                                            placeholder="Contraseña">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button class="btn btn-secondary">Cancelar</button>
                                        <button class="btn btn-success">Actualizar</button>
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
include('../layout/mensajes.php');
include('../layout/parte2.php');
?>