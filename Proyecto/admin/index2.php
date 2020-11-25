 <!DOCTYPE html>
<html>
<?php
  include 'conexionBD.php';
  $abirCon = OpenCon();
  session_start();
  if(isset($_REQUEST['sesion'])&& $_REQUEST['sesion']=="cerrar"){
		session_destroy();
		header("location: index.php");
  }
  
  if(isset($_SESSION['idUsuario'])==false){
    header("location: index.php");
  }
  $modulos=$_REQUEST['modulo']??'';
?>


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <title>Technosystems | Tienda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
 
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link href="css/EstilosSitio.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


  
</head>

<body>
<form action="" >


  <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <a href="#" class="brand-link">
      <img src="dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TechnoSystems</span>
    </a>
</div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Bienvenid@ <?php echo $_SESSION['nombreUsuario'] ?></a>
        </div>
      </div>
      <div class="list-group list-group-flush">
        
        <?php include'menu.php' ?>

      </div>
    </div>

   

      <nav class="mt">
      </nav>


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
              <li class="breadcrumb-item active">Inicio</li>
            </ol>
          </div>
          <table class="table table-hover">
          <tbody>
            <?php
              $query="SELECT IdProducto, NombreProducto, CantidadProducto, PrecioUnitario, Imagen FROM producto WHERE CantidadProducto>0 and IdEstadoProducto != 2";
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
                          <a href="#" class="btn btn-primary" >Ver Detalles</a>
              </td>
                        
                        
                       

              


            <?php
              }
            ?>
          </tboby>
        </table>
        </div>
      </div>
     
   
   
</div>



  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/FuncionesSitio.js"></script>
  <script>
   
    
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

  
  
 

  </script>
</form>
</body>
</html>