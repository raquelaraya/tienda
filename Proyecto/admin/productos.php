<!-- Content Wrapper. Contains page content-->
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
                    <th>Proveedor</th>
                    <th>Estado del producto</th>
                    <th>Imagen del producto</th>
                    <th>Acciones</th>
                    </tr>          
                  </thead>
                <tbody>
                  <?php
                     include 'conexionBD.php';
                     $query="SELECT IdProducto,NombreProducto,CantidadProducto,PrecioUnitario,proveedor.NombreProveedor,estadoproducto.NombreEstado,Imagen FROM producto INNER JOIN proveedor on producto.IdProveedor = proveedor.IdProveedor INNER JOIN estadoproducto on producto.IdEstadoProducto = estadoproducto.IdEstado";
                     $abirCon = OpenCon();
                     $res= mysqli_query($abirCon,$query);

                     while($row= mysqli_fetch_assoc($res)){
                  ?>
                      <tr>
                        <td><?php echo $row['IdProducto'] ?></td>
                        <td><?php echo $row['NombreProducto'] ?></td>
                        <td><?php echo $row['CantidadProducto'] ?></td>
                        <td><?php echo $row['PrecioUnitario'] ?></td>
                        <td><?php echo $row['NombreProveedor'] ?></td>
                        <td><?php echo $row['NombreEstado'] ?></td>
                        
                        <td><img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></td>
                        <td>
                                <a href="panelAdmin.php?modulo=editarProducto&id=<?php echo $row['IdProducto'] ?>"><i class="fas fa-edit"></i></a>
                                 <a href="#" class="text-danger"><i onclick="Eliminar(<?php echo $row['IdProducto'] ?>)" class="fas fa-trash"></i></a>
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
  <script>
    function Eliminar(id){

      swal({
        title: 'Atención',
        text: '¡Desea eliminar el producto!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: 'red',
        confirmButtonText: 'Sí',
        closeOnConfirm: false,
        closeOnCancel: true
    },

        function (isConfirm) {
            if (isConfirm) {
              
            window.location.href = "panelAdmin.php?modulo=eliminarProducto&idBorrar="+id;
            
            }
            
        }
      );

    }

    </script>