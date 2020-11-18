<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Technosystems | Inicio de Sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="input-group mb-3">
            <img src="dist/img/LogoFull.png" alt="AdminLTE Logo" 
                style="opacity: .8">
          </a>
      </div>

      <p class="login-box-msg">Inicie sesión</p>
      <?php

      if(isset ($_REQUEST ['login'])){ //si se presiona 
        session_start();
        $email= $_REQUEST['email']??''; //guarde los datos en una varible en caso de que no haya nada que retorne un vacio
        $clave= $_REQUEST['clave']??'';
        include 'conexionBD.php';
        $query="SELECT idUsuario, idRol, nombreUsuario, correoUsuario from usuario where correoUsuario='" .$email."' and passwordUsuario='".$clave. "' ";
        $abirCon = OpenCon();
        $res= mysqli_query($abirCon,$query);
        $row= mysqli_fetch_assoc($res);
        if($row){
          $_SESSION['idUsuario']= $row['idUsuario'];
          $_SESSION['idRol']= $row['idRol'];
          $_SESSION['nombreUsuario']= $row['nombreUsuario'];
          $_SESSION['correoUsuario']= $row['correoUsuario'];

          if($_SESSION['idRol']==1){ // Si es admin que le muestre el panel
            header("location: panelAdmin.php");
          }
          else{ //sino que ingrese como usuario
            header("location: index2.php");
          }
        }
        else{
      
      ?>
        <div class="alert alert-danger" role="alert">
            Usuario o clave incorrecta. Intente nuevamente.
          </div>    
        <?php

        }
        CloseCon($abirCon);
      }  
      ?>

      <form method="post">
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        </br>
        <a href="registroUsuario.php" class="text-center">Quiero registrarme</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
