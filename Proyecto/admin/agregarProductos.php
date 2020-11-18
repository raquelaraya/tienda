<?php
    if(isset($_REQUEST['btnRegistrar'])){
        include 'conexionBD.php';
        $abirCon = OpenCon();

        $ID= $_REQUEST['txtProducto'];
        $Nombre= $_REQUEST['txtNombre'];
        $Cantidad= $_REQUEST['txtCantidad'];
        $Precio= $_REQUEST['txtPrecio'];
        $IDProv= $_REQUEST['txtIDProveedor'];
        $IDEstado= $_REQUEST['txtIDEstado'];
        $IDCat= $_REQUEST['txtIDCatP'];
        $Imagen= addslashes(file_get_contents($FILES['IMG']['tmp_name']));

        $query= "INSERT INTO producto (IdProducto,NombreProducto,CantidadProducto,PrecioUnitario,IdProveedor,IdEstadoProducto,
        IdCategoriaProducto,Imagen) VALUES('".$ID."','".$Nombre."','".$Cantidad."'.,'".$Precio."','".$IDProv."',
        '".$IDEstado."','".$IDCat."','".$Imagen."')";

        $res= mysqli_query($abirCon,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panelAdmin.php?modulo=productos&mensaje=Producto agregado exitosamente" />  ';
        }else{
            ?>
        <div class="alert alert-danger" role="alert">
            Error al agregar el producto <?php echo mysqli_error($abirCon); ?>
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
                        <input type="number" class="form-control" placeholder="ID del producto" name="txtProducto" id="txtProducto">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

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

                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="ID del proveedor" name="txtIDProveedor" id="txtIDProveedor">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" placeholder="ID Estado del producto" name="txtIDEstado" id="txtIDEstado">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" placeholder="ID Categoria del producto" name="txtIDCatP" id="txtIDCatP">
                            <div class="input-group-append">
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="file" class="form-control" REQUIRED placeholder="Imagen" name="IMG" id="IMG">
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