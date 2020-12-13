<?php

    include 'config.php';
    include 'micarrito.php';
      

    if(isset($_POST['btnAgregarR']))
    {  
        $Pnumero_de_ordenes = $_POST['numero_de_ordenes'];
        $Ptotal = $_POST['total'];
        $PNombre = $_POST['Nombre'];
        $PApellido = $_POST['Apellido'];
        $Ptarjeta = $_POST['tarjeta'];
        $PFecha = $_POST['Fecha'];
       
        $sql2 = "call InsertarDatos($numero_de_orden,$total,$Nombre,$Apellido,$tarjeta,$Fecha)";
        $abirCon->next_result();
        
        if($abirCon-> query($sql2))
        {
             echo "<script> swal({
        title: 'Atención',
        text: '¡Compra realizada con exito!',
        type: 'success',
        showCancelButton: false,

        confirmButtonColor: 'green',
        confirmButtonText: 'Ok',
        closeOnConfirm: true

      },

        function (isConfirm) {
            window.location.href = 'index2.php?modulo=verProductos';

        }
      ); </script>";
           
        } 
        else
        {
            echo $abirCon -> error; 
        }
    }

     CloseCon($abirCon);
    
  

?>
<?php
$numero_de_orden = rand(0,100000); // with MAX_RAND=32768
?>
<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Carrito</h1>
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
              <h3>Lista de productos</h3>
    <?php if(!empty($_SESSION['Carrito'])) { ?>
    <table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center" >Precio</th>
            <th width="20%" class="text-center" >Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0; ?>
        <?php foreach($_SESSION['Carrito'] as $indice=>$producto){?>
        <tr>
            <td width="40%"><?php echo $producto['Nombre']?></td>
            <td width="15%" class="text-center"><?php echo $producto['Cantidad']?></td>
            <td width="20%" class="text-center">₡<?php echo $producto['Precio']?></td>
            <td width="20%" class="text-center">₡<?php echo number_format($producto['Precio']*$producto['Cantidad'],2); ?></td>
            <td width="5%"> 
            
           <form action="" method="post">
                
            <input type="hidden" 
            name="id" 
            id="id" 
            value="<?php echo  openssl_encrypt($producto['ID'],COD,KEY);?>">

        <button 
                class="btn btn-danger" 
                type="submit"
                name="btnAnadir"
                value="Eliminar"
                >Eliminar</button>

            </form>
            
            
             </td>
        </tr>
        <?php $total=$total+($producto['Precio']*$producto['Cantidad']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td  align="right"><h3>₡<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
            <form  method="post">
              <div class="container-fluid" style="margin-top:30px">
        <div class = "card">
          <div class ="card-header">
            <h3 class="text-center">Formulario</h3>
          </div>
          <div class="card-body">
            <div class="row">

                <div class="col-3">
                    <label>Número de orden</label>
                    <input type="text" class="form-control" 
                    id="numero_de_orden" name="numero_de_orden"   value="<?php echo $numero_de_orden;?>" readonly="true" />
                </div>

                <div class="col-3">
                    <label>total a pagar</label>
                    <input type="text" class="form-control" 
                    id="total" name="total" value="<?php echo  $total; ?>" readonly="true" />
                </div>
            
                <div class="col-3">
                    <label>Nombre</label>
                    <input type="text" class="form-control" 
                    id="Nombre" name="Nombre"  />
                </div>  
                
                <div class="col-3">
                    <label>Apellido</label>
                    <input type="text" class="form-control" 
                    id="Apellido" name="Apellido"  />
                </div>  
                
                <div class="col-3">
                    <label>Numero de tarjeta</label>
                    <input type="text" class="form-control" 
                    id="tarjeta" name="tarjeta"  />
                </div>
                
                

                 <div class="col-3">
                    <label>Fecha de vencimineto</label>
                    <input type="DATE" class="form-control" 
                    id="Fecha" name="Fecha" />
                </div>

            </div>

             <br/>

            <div class="row">
                <div class="col-12">
                   <input type="submit" class="btn btn-success btn-block" 
                    id="btnAgregarR" name="btnAgregarR"
                value="AgregaCompra" />
                </div>
                <br></br>
         <script
              src="https://www.paypal.com/sdk/js?client-id=sb"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
         </script>

         <div id="paypal-button-container"></div>

         <script>
              paypal.Buttons().render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
        </script>
            </div>
            
         </div>
         </div>
            
         </form>

                

            </td>
        </tr>

        
    </tbody>
</table>
<?php }else{ ?>
<div class="alert alert-success">
    No hay productos en el carrito...
</div>
<?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

       
  <style>
    
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }
    
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
            display: inline-block;
        }

    }
    
</style>


      


  




















    




















    
