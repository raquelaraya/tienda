<?php
    include 'conexionBD.php';
    $abirCon = OpenCon();
    
    if(isset($_REQUEST['btnEditar'])){

        $IdProducto = $_REQUEST['txtId'];
        $Nombre = $_REQUEST['txtNombre'];
        $Cantidad = $_REQUEST['txtCantidad'];
        $Precio =  $_REQUEST['txtPrecio'];
        $IDProv = $_REQUEST['cboProveedor'];
        $IdEstadoProd = $_REQUEST['cboEstado'];
        $Descripcion = $_REQUEST['txtDescripcion'];

        $query4="UPDATE producto SET NombreProducto='".$Nombre."', DesProducto = '".$Descripcion."',
        CantidadProducto='".$Cantidad."',PrecioUnitario='".$Precio."', IdProveedor='".$IDProv."',
        IdEstadoProducto='".$IdEstadoProd."' WHERE IdProducto='".$IdProducto."'";
        $res4= mysqli_query($abirCon,$query4);
        if($res4){

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
                    window.location.href = 'panelAdmin.php?modulo=productos';
      
                }
            ); </script>";
        }
        else{
    ?>
        <div class="alert alert-danger" role="alert">
            Error al agregar el producto <?php echo mysqli_error($abirCon); ?>
        </div>
        <?php
            }
        }
        $id= mysqli_real_escape_string($abirCon,$_REQUEST['id']);
        $query1="SELECT IdProducto , NombreProducto, DesProducto, CantidadProducto, PrecioUnitario, IdProveedor, IdEstadoProducto, Imagen from producto WHERE IdProducto='".$id."'";
        $res= mysqli_query($abirCon,$query1);
        $row= mysqli_fetch_assoc($res);
   
        ?>

        
   

  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Producto</h1>
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
              <form action="panelAdmin.php?modulo=editarProducto&id=<?php echo $row['IdProducto'] ?>"" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="form-group col-md-4">
                        <label>ID Producto</label>
                        <input type="text" class="form-control" placeholder="ID del producto" name="txtId" id="txtId" value="<?php echo $row['IdProducto'] ?>" readonly>
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nombre Producto</label>
                        <input type="text" class="form-control" placeholder="Nombre del producto" name="txtNombre" id="txtNombre" value="<?php echo $row['NombreProducto'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Cantidad Disponible</label>
                        <input type="number" class="form-control" placeholder="Cantidad del producto" name="txtCantidad" id="txtCantidad" value="<?php echo $row['CantidadProducto'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Precio Unitario</label>
                        <input type="number" class="form-control" placeholder="Precio Unitario" name="txtPrecio" id="txtPrecio" 
                            value="<?php echo $row['PrecioUnitario'] ?>">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                    <div class="col-4">
                        <label>Proveedor</label>
                        <select class="form-control" 
                            id="cboProveedor" name="cboProveedor" size=1>
                            <?php
                                $query2="SELECT IdProveedor, NombreProveedor FROM proveedor";
                                $res2= mysqli_query($abirCon,$query2);
                                while($row2 = mysqli_fetch_array($res2))
                                {
                                    if($row['IdProveedor']==$row2['IdProveedor']){
                                        echo "<option selected='selected' value=" . $row2["IdProveedor"] . ">" . $row2["NombreProveedor"] . "</option>";
                                    }
                                    else{
                                        echo "<option value=" . $row2["IdProveedor"] . ">" . $row2["NombreProveedor"] . "</option>";
                                    }
                                    
                                }
            
                            ?>

                        </select>
                            
                    </div>	
                    
                    <div class="col-4">
                    <label>Estado Producto </label>
                        <select class="form-control" 
                            id="cboEstado" name="cboEstado" size=1>
                            <?php
                                $query3="SELECT IdEstado, NombreEstado FROM estadoproducto";
                                $res3= mysqli_query($abirCon,$query3);
                                while($row3 = mysqli_fetch_array($res3))
                                {
                                    if($row['IdEstadoProducto']==$row3['IdEstado']){
                                        echo "<option selected='selected' value=" . $row3["IdEstado"] . ">" . $row3["NombreEstado"] . "</option>";
                                    }
                                    else{
                                        echo "<option value=" . $row3["IdEstado"] . ">" . $row3["NombreEstado"] . "</option>";
                                    }
                                    
                                }
            
                            ?>

                        </select>
                            
                            
				    </div>	
                    
                    

                </div>
                <div class="row">
               

                    <div class="form-group col-md-4">
                        <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/>
                    </div>

                    
                    <div class="form-group col-md-6">
                                <textarea class="form-control" name="txtDescripcion" id="txtDescripcion"> <?php echo $row['DesProducto'] ?></textarea>
                                <div class="input-group-append">
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                    </div>
                </div>

                </div>
                <div class="row">
                        <button type="submit" class="btn btn-primary" name="btnEditar" id="btnEditar">
                        <i class="fa fa-history" aria-hidden="true"></i>    
                        Editar Producto</button>
                    </div>

              </form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
