<?php
    
    
    if(isset($_REQUEST['btnRegistrar'])){
        include 'conexionBD.php';
        $abirCon = OpenCon();

        $cedula = $_REQUEST['txtCedula'];
        $nombre = $_REQUEST['txtNombre'];
        $correo = $_REQUEST['txtEmail'];
        $telefono = $_REQUEST['txtTelefono'];

       
        $query="INSERT INTO proveedor (CedulaProveedor, NombreProveedor,
        CorreoProveedor, Telefono) 
        VALUES ('".$cedula."', '".$nombre."', '".$correo."',  '".$telefono."')";
        $res= mysqli_query($abirCon,$query);
        if($res){

            echo "<script> swal({
                title: 'Atención',
                text: '¡Se agrego el proveedor!',
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
            
        }
        else{
    ?>
        <div class="alert alert-danger" role="alert">
            Error al agregar el proveedor <?php echo mysqli_error($abirCon); ?>
        </div>
        <?php
            }
        }
        ?>
   

  
  
  <!-- Content Wrapper. Contains page content TABLA DE ADMINISTRACION DE PROVEEDORES-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Proveedor:</h1>
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
                <form action="panelAdmin.php?modulo=crearProveedor" method="post">
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
                            <input type="tel" class="form-control" placeholder="Telefono" name="txtTelefono" id="txtTelefono">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" name="btnRegistrar" id="btnRegistrar">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>    
                        Registrar Proveedor</button>
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