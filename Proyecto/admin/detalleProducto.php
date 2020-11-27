<?php
    $id= mysqli_real_escape_string($abirCon,$_REQUEST['id']);
    $sqlProducto="call ConsultaProducto($id)";
    $detalle = $abirCon-> query($sqlProducto);
    $row=mysqli_fetch_array($detalle)
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <!-- Default box -->
       <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                 <img width="450" height="500" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/>
              </div>
              <div class="col-12 product-image-thumbs">
               
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $row['NombreProducto'] ?></h3>
              <p> Codigo: <?php echo $row['IdProducto'] ?></p>

              <hr>
             

              <h4 class="mt-3"><small>Unidades Disponibles: <?php echo $row['CantidadProducto'] ?></small></h4>
             

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    ₡ <?php echo $row['PrecioUnitario'] ?>
                </h2>
                
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Añadir al Carrito
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
      </div>
    </section>
  </div>
