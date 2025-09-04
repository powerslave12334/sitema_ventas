<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
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
            <li class="breadcrumb-item active">Crear Usuarios</li>
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
                <h3 class="card-title">Llena los campos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                <form action="../app/controllers/usuarios/create.php" method="post">
                  <div class="form-group">
                    <label for="">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="Nombre" required>
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                    <label for="">Rol de usuario</label>
                    <select name="rol" id="" class="form-control">
                      <?php
                      foreach ($roles_datos as $roles_dato) { ?>
                        <option value="<?php echo $roles_dato['id_rol']; ?>"><?php echo $roles_dato['rol']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <label for="">Contraseña</label>
                    <input type="text" name="password_user" class="form-control" placeholder="Contraseña" required>
                    <label for="">Verificar la contraseña</label>
                    <input type="text" name="password_repeat" class="form-control" placeholder="Contraseña" required>
                  </div>
                  <hr>
                  <div class="form-group">
                    <button class="btn btn-secondary">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
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