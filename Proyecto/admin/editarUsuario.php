<?php
    include 'conexionBD.php';
    $abirCon = OpenCon();
    

    if(isset($_REQUEST['btnEditar'])){
       
        //$cedula = $_REQUEST['txtCedula'];
        $nombre = $_REQUEST['txtNombre'];
        $apellido = $_REQUEST['txtApellido'];
        $correo = $_REQUEST['txtEmail'];
        $clave = $_REQUEST['txtPassword'];
        $telefono = $_REQUEST['txtTelefono'];
        $direccion = $_REQUEST['txtDireccion'];
        $rol = $_REQUEST['cboPefil'];
        $id2= $_REQUEST['txtID'];

       
        $query="UPDATE usuario SET NombreUsuario='".$nombre."',
        ApellidoUsuario='".$apellido."',correoUsuario='".$correo."', passwordUsuario='".$clave."', direccionUsuario='".$direccion."',
        telefonoUsuario='".$telefono."', idRol='".$rol."' WHERE IdUsuario='".$id2."';
        ";
        $res3= mysqli_query($abirCon,$query);
        if($res3){
            
            echo "<script> swal({
                title: 'Atención',
                text: '¡Se modifico correctamente!',
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

    $id= mysqli_real_escape_string($abirCon,$_REQUEST['id']);
    $query1="SELECT IdUsuario, CedulaUsuario, NombreUsuario, ApellidoUsuario, correoUsuario, passwordUsuario, direccionUsuario, telefonoUsuario,idRol from usuario WHERE IdUsuario='".$id."'";
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
            <h1>Editar Usuario:</h1>
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
                <form action="panelAdmin.php?modulo=editarUsuario&id=<?php echo $row['IdUsuario'] ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Cedula" name="txtCedula" id="txtCedula" disabled="true" value="<?php echo $row['CedulaUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" id="txtNombre" value="<?php echo $row['NombreUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Apellido" name="txtApellido" id="txtApellido" value="<?php echo $row['ApellidoUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail" id="txtEmail" value="<?php echo $row['correoUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" class="form-control" placeholder="Password" name="txtPassword" id="txtPassword" value="<?php echo $row['passwordUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="tel" class="form-control" placeholder="Telefono" name="txtTelefono" id="txtTelefono" value="<?php echo $row['telefonoUsuario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                <textarea class="form-control" placeholder="Direccion" name="txtDireccion" id="txtDireccion" ><?php echo $row['direccionUsuario'] ?></textarea>
                                <div class="input-group-append">
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                        </div>
                        <div class="col-4">
                            <select class="form-control" 
                            id="cboPefil" name="cboPefil" size=1>
                            <?php
                                $query2="SELECT IdRol, NombreRol FROM rol";
                                $res2= mysqli_query($abirCon,$query2);
                                while($row2 = mysqli_fetch_array($res2))
                                {
                                    if($row['idRol']==$row2['IdRol']){
                                        echo "<option selected='selected' value=" . $row2["IdRol"] . ">" . $row2["NombreRol"] . "</option>";
                                    }
                                    else{
                                    echo "<option value=" . $row2["IdRol"] . ">" . $row2["NombreRol"] . "</option>";
                                    }
                                    
                                }
            
                            ?>

                            </select>
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
                        <button type="submit" class="btn btn-primary" name="btnEditar" id="btnEditar">
                        <i class="fa fa-history" aria-hidden="true"></i>    
                        Actualizar Usuario</button>
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

  <script>
      function notiUsuarioAgregado(){
          console.log("AAAAAA");
        swal(
            'Good job!',
            'You clicked the button!',
            'success'
        );
      }

  </script>
