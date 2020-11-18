<!-- Content Wrapper. Contains page content TABLA DE ADMINISTRACION DE USUARIOS-->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
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
              <a class="btn btn-primary" href="panelAdmin.php?modulo=agregarProductos" role="button">Agregar nuevo producto</a>
                <br></br>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>ID Proveedor</th>
                    <th>ID estado del producto</th>
                    <th>ID Categoria</th>
                    <th>Imagen del producto</th>
                    <th>Acciones</th>
                    </tr>          
                  </thead>
                <tbody>
                  <?php
                     include 'conexionBD.php';
                     $query="SELECT * FROM producto";
                     $abirCon = OpenCon();
                     $res= mysqli_query($abirCon,$query);

                     while($row= mysqli_fetch_assoc($res)){
                  ?>
                      <tr>
                        <td><?php echo $row['IdProducto'] ?></td>
                        <td><?php echo $row['NombreProducto'] ?></td>
                        <td><?php echo $row['CantidadProducto'] ?></td>
                        <td><?php echo $row['PrecioUnitario'] ?></td>
                        <td><?php echo $row['IdProveedor'] ?></td>
                        <td><?php echo $row['IdEstadoProducto'] ?></td>
                        <td><?php echo $row['IdCategoriaProducto'] ?></td>
                        <td><img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></td>
                        <td>
                                <a href="#"><i class="fas fa-edit"></i></a>
                                 <a href="#" class="text-danger"><i class="fas fa-trash"></i></a>
                            </td>
                      </tr>
                  <?php
                    }
                ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
