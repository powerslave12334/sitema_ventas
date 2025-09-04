<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_de_usaurios.php');
include('app/controllers/roles/listado_de_roles.php');
include('app/controllers/categorias/listado_de_categorias.php');
include('app/controllers/almacen/listado_de_productos.php');
include('app/controllers/proveedores/listado_de_proveedores.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bienvenido a Ventec - <?php echo $rol_session; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_de_usuarios = 0;
                foreach ($usuarios_datos as $usuarios_dato) {
                  $contador_de_usuarios = $contador_de_usuarios + 1;
                }
                ?>
                <h3><?php echo $contador_de_usuarios; ?></h3>

                <p>cantidad de usuarios</p>
              </div>
              <a href="">
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
              </a>
              <a href="<?php echo $url; ?>/usuarios" class="small-box-footer">
                Mas detalles<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_de_roles = 0;
                foreach ($roles_datos as $roles_dato) {
                  $contador_de_roles = $contador_de_roles + 1;
                }
                ?>
                <h3><?php echo $contador_de_roles; ?></h3>

                <p>cantidad de roles</p>
              </div>
              <a href="<?php echo $url; ?>/roles/create.php">
                <div class="icon">
                  <i class="fas fa-address-card"></i>
                </div>
              </a>
              <a href="<?php echo $url; ?>/roles" class="small-box-footer">
                Mas detalles<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_de_categorias = 0;
                foreach ($categorias_datos as $categorias_dato) {
                  $contador_de_categorias = $contador_de_categorias + 1;
                }
                ?>
                <h3><?php echo $contador_de_categorias; ?></h3>

                <p>cantidad de categorias</p>
              </div>
              <a href="<?php echo $url; ?>/categorias/">
                <div class="icon">
                  <i class="fas fa-tags"></i>
                </div>
              </a>
              <a href="<?php echo $url; ?>/categorias" class="small-box-footer">
                Mas detalles<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_de_productos = 0;
                foreach ($productos_datos as $productos_dato) {
                  $contador_de_productos = $contador_de_productos + 1;
                }
                ?>
                <h3><?php echo $contador_de_productos; ?></h3>

                <p>cantidad de productos</p>
              </div>
              <a href="<?php echo $url; ?>/almacen/create.php">
                <div class="icon">
                  <i class="fas fa-warehouse"></i>
                </div>
              </a>
              <a href="<?php echo $url; ?>/almacen" class="small-box-footer">
                Mas detalles<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_de_proveedores = 0;
                foreach ($proveedores_datos as $proveedores_dato) {
                  $contador_de_proveedores = $contador_de_proveedores + 1;
                }
                ?>
                <h3><?php echo $contador_de_proveedores; ?></h3>

                <p>cantidad de proveedores</p>
              </div>
              <a href="<?php echo $url; ?>/proveedores">
                <div class="icon">
                  <i class="fa fa-car"></i>
                </div>
              </a>
              <a href="<?php echo $url; ?>/proveedores" class="small-box-footer">
                Mas detalles<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

            <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_de_proveedores = 0;
                foreach ($proveedores_datos as $proveedores_dato) {
                  $contador_de_proveedores = $contador_de_proveedores + 1;
                }
                ?>
                <h3><?php echo $contador_de_proveedores; ?></h3>

                <p>cantidad de proveedores</p>
              </div>
              <a href="<?php echo $url; ?>/proveedores">
                <div class="icon">
                  <i class="fa fa-car"></i>
                </div>
              </a>
              <a href="<?php echo $url; ?>/proveedores" class="small-box-footer">
                Mas detalles<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php
include('layout/parte2.php');
?>