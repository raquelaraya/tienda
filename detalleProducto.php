<?php
    include 'config.php';
    include 'micarrito.php';

    
    $id= mysqli_real_escape_string($abirCon,$_REQUEST['id']);
    $sqlProducto="call ConsultaProducto($id)";
    $detalle = $abirCon-> query($sqlProducto);
    $row=mysqli_fetch_array($detalle);
<<<<<<< Updated upstream
  
    if(isset($_POST['btnAnadir'])){
     
      echo "<script> swal({
        title: 'Atención',
        text: '¡Se agrego el producto al carrito!',
        type: 'success',
        showCancelButton: false,

        confirmButtonColor: 'green',
        confirmButtonText: 'Ok',
        closeOnConfirm: false

      },

        function (isConfirm) {
            window.location.href = 'index2.php?modulo=verProductos';
 
        }
      ); </script>";
     
    
    }

     
   
    
=======
 
  
>>>>>>> Stashed changes
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
             

              <h4 class="mt-3"><small>Unidades Disponibles:</small></h4>
              <div class="col-2">
                  <input type="number" class="form-control" 
                  id="txtComprar" name="txtComprar" value="<?php echo $row['CantidadProducto'] ?>" readonly/>
              </div>
             

              <div class="bg-navy py-2 px-3 mt-4">
                <h2 class="mb-0">
                    ₡ <?php echo $row['PrecioUnitario'] ?>
                </h2>
                
              </div>
              </br>
              

            <form action="" method="post">
              <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['IdProducto'],COD,KEY)  ?>">
              <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['NombreProducto'],COD,KEY)?>">
              <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['PrecioUnitario'],COD,KEY) ?>">
              <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">

              <div class="mt-4">
                  <button type="submit" class="btn btn-primary" name="btnAnadir" id="btnAnadir" value="Agregar">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Añadir al Carrito
                  </button>


              </div>
            </form>

            <div class="row mt-4">
              <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
                  
                </div>
              </nav>
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <?php
                  echo $row['DesProducto'] 
                ?>  
               </div>
               
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

<script>
  function ValidarCampos(){

    if($("#txtCanComprar").val() <= 0){
      swal({
                title: 'Atención',
                text: '¡La cantidad por comprar es incorrecta!',
                type: 'error',
                showCancelButton: false,
        
                confirmButtonColor: 'red',
                confirmButtonText: 'Aceptar',
                closeOnConfirm: true
            },

                function (isConfirm) {
                   
      
                }
            )
      return false;
    }
    if($("#txtCanComprar").val() > $("#txtComprar").val()){
      swal({
                title: 'Atención',
                text: '¡No hay suficientes unidades!',
                type: 'error',
                showCancelButton: false,
                confirmButtonColor: 'red',
                confirmButtonText: 'Aceptar',
                closeOnConfirm: true
            },

                function (isConfirm) {
                   
      
                }
            )
      return false;
    }
    return true;
  }
</script>