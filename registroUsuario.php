<!DOCTYPE html>
<?php
    if(isset($_REQUEST['btnRegistarse'])){
        include 'conexionBD.php';
        $abirCon = OpenCon();

        $cedula = $_REQUEST['txtCedula'];
        $nombre = $_REQUEST['txtNombre'];
        $apellido = $_REQUEST['txtApellido'];
        $correo = $_REQUEST['txtEmail'];
        $clave = $_REQUEST['txtPassword2'];
       
        $query="INSERT INTO usuario (CedulaUsuario, NombreUsuario, ApellidoUsuario, 
        correoUsuario, passwordUsuario, idRol) 
        VALUES ('".$cedula."', '".$nombre."', '".$apellido."', '".$correo."', '".$clave."', '2')";
        $res= mysqli_query($abirCon,$query);
        if($res){
?>
          <div class="alert alert-success" role="alert">
          Usuario Registrado <a href="index.php"><b>Iniciar Sesion</b></a>
          </div> 
<?php          
           
        }
        else{
    ?>
        <div class="alert alert-danger" role="alert">
            Error al registar el usuario.
        </div>
        <?php
            }
        }
        ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Technosystems | Registrarse</title>
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
<body class="hold-transition register-page">
<div class="register-box">
 

  <div class="card">
  <div class="register-logo">
  <img src="dist/img/LogoFull.png" alt="AdminLTE Logo" 
                style="opacity: .8">
  </div>
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrarse</p>

      <form action="" method="post" onsubmit="return ValidarCampos();">
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Cedula" require="true" name="txtCedula" id="txtCedula">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre" require="true" name="txtNombre" id="txtNombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Apellido" require="true" name="txtApellido" id="txtApellido">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" require="true" name="txtEmail" id="txtEmail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" require="true" name="txtPassword" id="txtPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar password" require="true" name="txtPassword2" id="txtPassword2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block" id="btnRegistarse" name="btnRegistarse" value="Registrarse" >Register</button>
          </div>
          <!-- /.col -->
      <br></br>
      </form>
      <a href="index.php" class="text-center">Ya tengo una cuenta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>


  function ValidarCampos()
	{
		if( $("#txtCedula").val() == "" )
		{
			$("#txtCedula").css("border-color", "blue");
			return false;
		}

		if( $("#txtNombre").val() == "" )
		{
			$("#txtNombre").css("border-color", "blue");
			return false;
		}

    if( $("#txtApellido").val() == "" )
		{
			$("#txtApellido").css("border-color", "blue");
			return false;
		}

    if( $("#txtEmail").val() == "" )
		{
			$("#txtEmail").css("border-color", "blue");
			return false;
		}

    if( $("#txtPassword").val() !=  $("#txtPassword2").val() || $("#txtPassword").val()== "" || $("#txtPassword2").val()== "" )
		{
			$("#txtPassword").css("border-color", "blue");
      $("#txtPassword2").css("border-color", "blue");
			return false;
		}
    
		return true;		
	}
</script>
</body>
</html>
