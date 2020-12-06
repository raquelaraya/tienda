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
              <table class="table table-hover">
          <tbody>
            <?php
       
              $query="SELECT IdProducto, NombreProducto, CantidadProducto, PrecioUnitario, Imagen FROM producto WHERE CantidadProducto>0 and IdEstadoProducto != 2";
              $abirCon = OpenCon();
              $res=mysqli_query($abirCon,$query);
              while($row=mysqli_fetch_assoc($res)){
              ?>
              
              <tr>
                        <td style="width: 300px;"><img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></td>
                        <td>
                          <h2 class="card-title"><strong><?php echo $row['NombreProducto'] ?></strong></h2>
                          <p class="card-text"><strong>Codigo: </strong><?php echo $row['IdProducto'] ?></p>
                          <p class="card-text"><strong>Precio: </strong><?php echo $row['PrecioUnitario'] ?></p>
                          <p class="card-text"><strong>Unidades Disponibles : </strong><?php echo $row['CantidadProducto'] ?></p>
                          <a href="index2.php?modulo=detalleProducto&id=<?php echo $row['IdProducto'] ?>" class="btn btn-primary" >Ver Detalles</a>
              </td>
                        
                        
                       

              


            <?php
              }
            ?>
          </tboby>
        </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>