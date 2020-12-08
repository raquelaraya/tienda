<?php
    include 'conexionBD.php';
    $abirCon = OpenCon();
    

    if(isset($_REQUEST['btnEditar'])){
       
        $nombre = $_REQUEST['txtNombre'];
        $apellido = $_REQUEST['txtApellido'];
        $correo = $_REQUEST['txtEmail'];
        $clave = $_REQUEST['txtPassword'];
        $telefono = $_REQUEST['txtTelefono'];
        $direccion = $_REQUEST['txtDireccion'];
        $id2= $_REQUEST['txtID'];

        $query="call ActualizaPerfil('$nombre','$apellido','$correo','$clave','$telefono','$direccion', $id2)";
        $res3= mysqli_query($abirCon,$query);
        if($res3){
            
            echo "<script> swal({
                title: 'Atención',
                text: '¡Perfil Actualizado!',
                type: 'success',
                showCancelButton: false,
        
                confirmButtonColor: 'green',
                confirmButtonText: 'Ok',
                closeOnConfirm: true
            },

                function (isConfirm) {
                    
                    window.location.href = 'panelAdmin.php?modulo=dashboard';
      
                }
            ); </script>";
            
            //echo '<meta http-equiv="refresh" content="0; url=panelAdmin.php?modulo=usuarios&mensaje=Usuario '.$nombre.' editado exitosamente" />  ';
 
        }
        else{
?>
            <div class="alert alert-danger" role="alert">
                Error al agregar el usuario <?php echo mysqli_error($abirCon); ?>
            </div>

            
<?php
        }
    }

    $id= mysqli_real_escape_string($abirCon, $_SESSION['idUsuario']);
    $query1="call ConsultaMiPerfil($id)";
    $res= mysqli_query($abirCon,$query1);
    $row= mysqli_fetch_assoc($res);
   
          
        
        
?>
  <!-- Content Wrapper. Contains page content TABLA DE ADMINISTRACION DE USUARIOS-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mi Perfil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="" method="post" onsubmit="return ValidarCampos();">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              
              <div class="card-body">
                <form action="panelAdmin.php?modulo=editarUsuario&id=<?php echo $row['IdUsuario'] ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Cedula</label>
                            <input type="text" class="form-control" placeholder="Cedula" name="txtCedula" id="txtCedula" disabled="true" value="<?php echo $row['CedulaUsuario'] ?>"require=true>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" id="txtNombre" value="<?php echo $row['NombreUsuario'] ?>"require=true>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido</label>
                            <input type="text" class="form-control" placeholder="Apellido" name="txtApellido" id="txtApellido" value="<?php echo $row['ApellidoUsuario'] ?>"require=true>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Correo</label>
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail" id="txtEmail" value="<?php echo $row['correoUsuario'] ?>" require=true>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Teléfono</label>
                            <input type="tel" class="form-control" placeholder="Telefono" name="txtTelefono" id="txtTelefono" value="<?php echo $row['telefonoUsuario'] ?>" require=true>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                <label>Dirección</label>
                                <textarea class="form-control" placeholder="Direccion" name="txtDireccion" id="txtDireccion" require=true><?php echo $row['direccionUsuario'] ?></textarea>
                                <div class="input-group-append">
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $row['IdUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" placeholder="Contraseña" name="txtPassword" id="txtPassword" require=true>
                                <div class="input-group-append">
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Confirmar Contraseña </label>
                            <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="txtPassword2" id="txtPassword2" require=true>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" name="btnEditar" id="btnEditar">
                        <i class="fa fa-history" aria-hidden="true"></i>    
                        Actualizar mi Perfil</button>
                    </div>
                    
                    
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </form>
  </div>

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
