<?php
    
    
    if(isset($_REQUEST['btnAgregar'])){
        include 'conexionBD.php';
        $abrirCon = OpenCon();

        $Nombre = $_REQUEST['txtNombre'];
        $Cantidad = $_REQUEST['txtCantidad'];
        $Precio =  $_REQUEST['txtPrecio'];
        $IDProv = $_REQUEST['cboProveedor'];
        $IdEstadoProd = $_REQUEST['cboEstado'];
        $Img =  addslashes(file_get_contents($_FILES['IMG']['tmp_name']));
        $Descripcion = $_REQUEST['txtDescripcion'];

        $query="INSERT INTO producto (NombreProducto,DesProducto,CantidadProducto,PrecioUnitario,IdProveedor,IdEstadoProducto,Imagen) 
        VALUES ('".$Nombre."','".$Descripcion."','".$Cantidad."','".$Precio."','". $IDProv."','". $IdEstadoProd."','".$Img."')";
        $res= mysqli_query($abrirCon,$query);
        if($res){

            echo "<script> swal({
                title: 'Atención',
                text: '¡Se agrego el producto!',
                type: 'success',
                showCancelButton: false,
        
                confirmButtonColor: 'green',
                confirmButtonText: 'Ok',
                closeOnConfirm: true
            },

                function (isConfirm) {
                    window.location.href = 'panelAdmin.php?modulo=productos';
      
                }
            ); </script>";
            
        }
        else{
    ?>
        <div class="alert alert-danger" role="alert">
            Error al agregar el producto <?php echo mysqli_error($abrirCon); ?>
        </div>
        <?php
            }
        }
        ?>
   

  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Productos</h1>
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
              <form action="panelAdmin.php?modulo=agregarProductos" method="post" enctype="multipart/form-data">
                <div class="row">
                
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Nombre del producto" name="txtNombre" id="txtNombre">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" placeholder="Cantidad del producto" name="txtCantidad" id="txtCantidad">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" placeholder="Precio Unitario" name="txtPrecio" id="txtPrecio">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                    <div class="col-4">
                        <select class="form-control" 
                            id="cboProveedor" name="cboProveedor" size=1>
                            <?php
                                include 'conexionBD.php';
                                $query1="SELECT IdProveedor, NombreProveedor FROM proveedor";
                                $abrirCon = OpenCon();
                                $res1= mysqli_query($abrirCon,$query1);
                                echo "<option value='0'>Seleccione Proveedor</option>";
                                while($row1 = mysqli_fetch_array($res1))
                                {
                                    echo "<option value=" . $row1["IdProveedor"] . ">" . $row1["NombreProveedor"] . "</option>";
                                    
                                }
            
                            ?>

                        </select>
                            
				    </div>	
                    
                    

                </div>
                <div class="row">
                <div class="col-4">
                        <select class="form-control" 
                            id="cboEstado" name="cboEstado" size=1>
                            <?php
                                
                                $query2="SELECT IdEstado, NombreEstado FROM estadoproducto";
                                $res2= mysqli_query($abrirCon,$query2);
                                echo "<option value='0'>Seleccione Estado en Bodega</option>";
                                while($row2 = mysqli_fetch_array($res2))
                                {
                                    echo "<option value=" . $row2["IdEstado"] . ">" . $row2["NombreEstado"] . "</option>";
                                    
                                }
            
                            ?>

                        </select>
                            
                            
				    </div>	

                    <div class="form-group col-md-4">
                        <input type="file" class="form-control" placeholder="Imagen" name="IMG" id="IMG">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <div class="form-group col-md-6">
                                <textarea class="form-control" placeholder="Descripción del producto" name="txtDescripcion" id="txtDescripcion"></textarea>
                                <div class="input-group-append">
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="row">
                        <button type="submit" class="btn btn-primary" name="btnAgregar" id="btnAgregar">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>    
                        Agregar Producto</button>
                    </div>

              </form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
