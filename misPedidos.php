<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mis Pedidos</h1>
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
            
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th>№ Factura</th>
                    <th>Total Compra</th>
                    <th>Cantidad de Productos Comprados</th>
                    <th>Fecha de compra</th>
                    </tr>          
                  </thead>
                <tbody>
                  <?php
                    $usuario=$_SESSION['idUsuario'];
                    $query ="call misPedidos($usuario)";
                    $res= mysqli_query($abirCon,$query);
                    while($row= mysqli_fetch_assoc($res)){
                  ?>
                      <tr>
                        <td><?php echo $row['IdDetalle'] ?></td>
                        <td>₡<?php echo number_format ($row['Total'],2) ?></td>
                        <td><?php echo $row['CantidadProductos'] ?></td>
                        <td><?php echo $row['FechaCompra'] ?></td>
                        
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
  