<?php
    include 'conexionBD.php';
    $abirCon = OpenCon();
    

    if(isset($_REQUEST['btnEditar'])){
       
        $nombre = $_REQUEST['txtNombre'];
        $cedula = $_REQUEST['txtCedula'];
        $correo = $_REQUEST['txtEmail'];
        $telefono = $_REQUEST['txtTelefono'];
        $id2= $_REQUEST['txtID'];

       
        $query="UPDATE proveedor SET NombreProveedor='".$nombre."',
        CedulaProveedor='".$cedula."', CorreoProveedor='".$correo."',
        Telefono='".$telefono."' WHERE IdProveedor='".$id2."';
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
                    window.location.href = 'panelAdmin.php?modulo=proveedor';
      
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
    $query1="SELECT IdProveedor , CedulaProveedor, NombreProveedor, CorreoProveedor, Telefono from proveedor WHERE IdProveedor='".$id."'";
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
                <form action="panelAdmin.php?modulo=editarProveedor&id=<?php echo $row['IdProveedor'] ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Cedula Juridica" name="txtCedula" id="txtCedula" value="<?php echo $row['CedulaProveedor'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" id="txtNombre" value="<?php echo $row['NombreProveedor'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        
                 </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail" id="txtEmail" value="<?php echo $row['CorreoProveedor'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group col-md-4">
                            <input type="tel" class="form-control" placeholder="Telefono" name="txtTelefono" id="txtTelefono" value="<?php echo $row['Telefono'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $row['IdProveedor'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" name="btnEditar" id="btnEditar">
                        <i class="fa fa-history" aria-hidden="true"></i>    
                        Actualizar Proveedor</button>
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
