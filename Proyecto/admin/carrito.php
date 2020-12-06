
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
              <div class="row px-5">
        <div class="col-md-7">
        <?php if(!empty($_SESSION['Carrito'])){?>
            <table class="table table-bordered table-hover">
            <thead>
                <tr>      
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</hr>
                <th>Acciones</th>
                </tr>          
            </thead>
            <tbody>
            <?php $total=0; ?>
            <?php foreach($_SESSION['Carrito'] as $indice=>$producto){ ?>
                <td><?php echo $producto['Nombre'] ?></td>
                <td><?php echo $producto['Cantidad'] ?></td>
                <td><?php echo $producto['Precio'] ?></td>
                <td><?php echo number_format($producto['Precio']*$producto['Cantidad'],2); ?></td>
                <td><button class="btn btn-danger" type button>Eliminar del carrito</button></td>
                <?php $total=$total+($producto['Precio']*$producto['Cantidad']); ?>
            <?php }?>
            </tbody>
            </table>
        <?php }else{?>
        <div class="alert alert-sucess">
            No hay productos en el carrito
        </div>
        <?php }?>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>Detalles del pago</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        
                        <h6>Pago de envio</h6>
                        <hr>
                        <h6>Total a pagar</h6>
                        
                    </div>
                    <div class="col-md-6">
                        <h6></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6> <?php $total ?></h6>
                    </div>
                       
                </div>
                <a class="btn btn-success btn-lg btn-block submitAndGoToCheckout" href=''>Finalizar Compra <span class="fa fa-check"></span></a>    
            </div>
           
        </div>
        
    </div>
    </section>