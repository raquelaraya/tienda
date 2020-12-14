<?php

    include 'config.php';
    include 'micarrito.php';
    

    if(isset($_POST['btnFinalizar']))
    {  
        $usuario=$_SESSION['idUsuario'];
        $queryVenta ="call InsertarVenta ($usuario)";
        $tot = $_REQUEST['totPagar'];
        $can =  $_REQUEST['totProduc'];
        
        $abirCon->next_result();
        if($abirCon-> query($queryVenta))
        {
          $queryCon ="call ConsultaVenta()";
          $res2= mysqli_query($abirCon,$queryCon);
          $linea= mysqli_fetch_assoc($res2);
          $idVenta = $linea['IdVenta'];
       

          $queryVenta ="call InsertaFactura($tot, $can, $idVenta)";
        
          $abirCon->next_result();
          if($abirCon-> query($queryVenta))
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
            unset($_SESSION['Carrito']);

          }
        } 
        else
        {
            echo $abirCon -> error; 
        }
    }

     CloseCon($abirCon);
    
  

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
        <?php $tProductos=0; ?>
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
        <?php $tProductos= $tProductos+$producto['Cantidad']?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td  align="right"><h3>₡<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
            <form  action="" method="post">
              <div class="container-fluid" style="margin-top:30px">
        <div class = "card">
          <div class ="card-header">
            <h3 class="text-center">Formulario de pago</h3>
          </div>
          <div class="card-body">
          <input type="hidden" name="totPagar" id="totPagar" value="<?php echo $total ?>">
          <input type="hidden" name="totProduc" id="totProduc" value="<?php echo $tProductos ?>">
            <div class="row">
                <div class="col-3">
                    <label>Nombre de Tajeta</label>
                    <input type="text" class="form-control" 
                    id="Nombre" name="Nombre"  />
                </div>  
                
                <div class="col-3">
                    <label>Número Tarjeta</label>
                    <input type="text" class="form-control" 
                    id="tarjeta" name="tarjeta"  maxlength="20" required/>
                </div>  
                
                <div class="col-3">
                    <label>Código de Seguridad</label>
                    <input type="password" class="form-control" 
                    id="codigo" name="codigo"   maxlength="3" require/>
                </div>
                
                

                 <div class="col-3">
                    <label>Fecha de vencimineto</label>
                    <input type="month" class="form-control" 
                    id="Fecha" name="Fecha" require/>
                </div>

            </div>

             <br/>

            <div class="row">
                <div class="col-12">
                   <input type="submit" class="btn btn-success" 
                    id="btnFinalizar" name="btnFinalizar"
                value="Finalizar Compra" />
                </div>
                <br></br>
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
    
    
    
</style>


      


  




















    




















    
