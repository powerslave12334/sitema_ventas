<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de ventas - Login</title>

    <!-- 
        Archivo: login.php (vista)
        Descripción: Página de inicio de sesión del Sistema de Ventas.
        Autor: Alan Guzmán
        Fecha: 2025-09-09
    -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">

    <!-- icheck bootstrap (estilos para checkbox y radio) -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Estilos principales de AdminLTE -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Librería SweetAlert2 para alertas personalizadas -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- Logo del sistema -->
        <center>
            <img src="https://img.freepik.com/vector-gratis/gerentes-startups-que-presentan-analizan-tabla-crecimiento-ventas-grupo-trabajadores-monton-dinero-efectivo-cohetes-diagramas-barras-flecha-monton-dinero_74855-14166.jpg?w=996&t=st=1673983349~exp=1673983949~hmac=b50c9a1d93c8d39cec56f10df254278c5ab4acba8fb0c9a52e31eede2ebf03bc"
                alt="Logo Sistema de Ventas" width="300px">
        </center>
        <br>

        <!-- Caja principal del login -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../public/templeates/AdminLTE-3.2.0/index2.html" class="h1"><b>Sistema de </b>VENTAS</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Ingrese sus datos</p>

                <!-- Formulario de inicio de sesión -->
                <form action="../app/controllers/login/ingreso.php" method="post">
                    <!-- Campo Email -->
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Campo Password -->
                    <div class="input-group mb-3">
                        <input type="password" name="password_user" class="form-control" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Botón de ingreso -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../public/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/templeates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>