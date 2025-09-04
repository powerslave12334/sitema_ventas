<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/update_roles.php');
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
                        <li class="breadcrumb-item active">Editar Rol</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-danger collapsed-card">
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
                                <form action="../app/controllers/roles/delete_rol.php" method="post">
                                    <div class="form-group">
                                        <input hidden name="id_rol" value="<?php echo $id_rol_get; ?>" type="text">
                                        <label for="">Nuevo Rol</label>
                                        <input type="text" name="rol" class="form-control"
                                            placeholder="Inserte el Rol..." value="<?php echo $rol; ?>" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button class="btn btn-secondary">Cancelar</button>
                                        <button class="btn btn-danger">Borrar</button>
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