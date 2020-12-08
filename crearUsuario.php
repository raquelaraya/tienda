  <?php
    
    
    if(isset($_REQUEST['btnRegistrar'])){
        include 'conexionBD.php';
        $abirCon = OpenCon();

        $cedula = $_REQUEST['txtCedula'];
        $nombre = $_REQUEST['txtNombre'];
        $apellido = $_REQUEST['txtApellido'];
        $correo = $_REQUEST['txtEmail'];
        $clave = $_REQUEST['txtPassword'];
        $telefono = $_REQUEST['txtTelefono'];
        $direccion = $_REQUEST['txtDireccion'];
        $rol = $_REQUEST['cboPefil'];

       
        $query="INSERT INTO usuario (CedulaUsuario, NombreUsuario, ApellidoUsuario, 
        correoUsuario, passwordUsuario, direccionUsuario, telefonoUsuario, idRol) 
        VALUES ('".$cedula."', '".$nombre."', '".$apellido."', '".$correo."', '".$clave."', '".$direccion."', '".$telefono."', '".$rol."')";
        $res= mysqli_query($abirCon,$query);
        if($res){

            echo "<script> swal({
                title: 'Atención',
                text: '¡Se agrego el usuario!',
                type: 'success',
                showCancelButton: false,
        
                confirmButtonColor: 'green',
                confirmButtonText: 'Ok',
                closeOnConfirm: true
            },

                function (isConfirm) {
                    window.location.href = 'panelAdmin.php?modulo=usuarios';
      
                }
            ); </script>";
            //echo '<meta http-equiv="refresh" content="0; url=panelAdmin.php?modulo=usuarios&mensaje=Usuario creado exitosamente" />  ';
        }
        else{
    ?>
        <div class="alert alert-danger" role="alert">
            Error al agregar el usuario <?php echo mysqli_error($abirCon); ?>
        </div>
        <?php
            }
        }
        ?>
   

  
  
  <!-- Content Wrapper. Contains page content TABLA DE ADMINISTRACION DE USUARIOS-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuarios:</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form action="panelAdmin.php?modulo=crearUsuario" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Cedula" name="txtCedula" id="txtCedula">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" id="txtNombre">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Apellido" name="txtApellido" id="txtApellido">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail" id="txtEmail">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" class="form-control" placeholder="Password" name="txtPassword" id="txtPassword">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="tel" class="form-control" placeholder="Telefono" name="txtTelefono" id="txtTelefono">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                <textarea class="form-control" placeholder="Direccion" name="txtDireccion" id="txtDireccion"></textarea>
                                <div class="input-group-append">
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                        </div>
                        <div class="col-4">
                            <select class="form-control" 
                            id="cboPefil" name="cboPefil" size=1>
                            <?php
                                include 'conexionBD.php';
                                $query="SELECT IdRol, NombreRol FROM rol";
                                $abirCon = OpenCon();
                                $res= mysqli_query($abirCon,$query);
                                echo "<option value='0'>Seleccione</option>";
                                while($row = mysqli_fetch_array($res))
                                {
                                    echo "<option value=" . $row["IdRol"] . ">" . $row["NombreRol"] . "</option>";
                                    
                                }
            
                            ?>

                            </select>
                            
                            
				        </div>	

                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" name="btnRegistrar" id="btnRegistrar">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>    
                        Registrar Usuario</button>
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
  </div>