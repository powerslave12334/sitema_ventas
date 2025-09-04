<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/show_usuario.php');
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
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">usuario seleccionado</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <form action="../app/controllers/usuarios/create.php" method="post">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input value="<?php echo $nombres; ?>" type="text" name="nombres"
                                            class="form-control" disabled>
                                        <label for="">Email</label>
                                        <input value="<?php echo $email; ?>" type="email" name="email"
                                            class="form-control" disabled>
                                        <label for="">Rol de usuario</label>
                                        <input value="<?php echo $rol; ?>" type="email" name="email"
                                            class="form-control" disabled>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a class="btn btn-secondary" href="index.php">Volver</a>
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
include('../layout/mesajes.php');
include('../layout/parte2.php');
?>