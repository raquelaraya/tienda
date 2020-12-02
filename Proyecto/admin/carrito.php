              <?php
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                echo '<script>window.location="carrito.php";</script>';
            }

        }

    }

}
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
              <div style="clear:both"></div>

    <br />
    <h3>Detalle de la Orden</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Nombre</th>
                <th width="10%">Cantidad</th>
                <th width="20%">Precio</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_nombre"]; ?></td>
                        <td><?php echo $values["item_precio"]; ?></td>
                        <td>$ <?php echo $values["item_cantidad"]; ?></td>
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <td><a href="carrito.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<script src="js/jquery.min2.js"></script>
<script src="js/bootstrap.min2.js"></script>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  